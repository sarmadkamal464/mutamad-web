const app = require('express')();
const server = require('http').Server(app);
const io = require('socket.io')(server, {
  cors: {
    origin: "*"
  }
});
const os = require('os');

// Get the network interfaces
const networkInterfaces = os.networkInterfaces();

// Find the network interface with the IPv4 address
const interfaceNames = Object.keys(networkInterfaces);
let serverUrl = '';

for (const name of interfaceNames) {
  const iface = networkInterfaces[name];

  for (const alias of iface) {
    if (alias.family === 'IPv4' && !alias.internal) {
      serverUrl = `http://${alias.address}:3000`;
      break;
    }
  }

  if (serverUrl) {
    break;
  }
}

console.log(`Server running at ${serverUrl}`);

server.listen(3000, () => {
  console.log('Server listening on port 3000');
});

const connectedUsers = {};

io.on('connection', (socket) => {
  console.log('a user connected');

  socket.on('register', (username) => {
    socket.username = username;
    connectedUsers[username] = {
      socket: socket,
      seenMessages: {},
      unseenMessages: []
    };
    console.log(`${username} is registered`);
  });
 

  socket.on('private message', ({ senderImage,to, message, messageId, date, read ,id}) => {
    const receiverSocket = connectedUsers[to];
    if (receiverSocket) {
      receiverSocket.socket.emit('private message', {
        receiverImage:senderImage,
        from: socket.username,
        message,
        messageId,
        date,
        read,
        id
      });

      if (read === 0) {
        receiverSocket.unseenMessages.push({ messageId, from: socket.username });
      } else if (read === 1) {
    
        const index = receiverSocket.unseenMessages.findIndex(
          (msg) => msg.messageId === messageId && msg.from === socket.username
        );
        if (index !== -1) {
          receiverSocket.unseenMessages.splice(index, 1);
        }
      }

      const unseenMessagesCount = receiverSocket.unseenMessages.reduce(
        (acc, curr) => {
          const { from, messageId } = curr;

          if (acc.hasOwnProperty(from)) {
            acc[from].count++;
          } else {
            acc[from] = {
              count: 1,
              notificationFrom: from
            };
          }

          return acc;
        },
        {}
      );


      console.log(unseenMessagesCount);
      receiverSocket.socket.emit('unseen messages count', {
        fro:socket.username ,
        count: 1
      });
      console.log(`message count ${unseenMessagesCount} to ${to}`);
      console.log(`message sent from ${socket.username} to ${to}`);
    } else {
      console.log(`Unable to send message to ${to}, user not connected`);
    }
  });
  // Emit 'message seen' event to sender
socket.on('seen', ({to,messageId,read,id}) => {
    if (connectedUsers[socket.username]) {
     
       
        connectedUsers[to]?.socket.emit('message seen', { messageId,read,id});
       
    } else {
        console.log(`Unable to mark message as seen, user not connected`);
    }
});


  socket.on('disconnect', () => {
    console.log(`${socket.username} disconnected`);
   
  });
});
