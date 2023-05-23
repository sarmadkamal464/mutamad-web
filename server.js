const app = require('express')();
const server = require('http').Server(app);
const io = require('socket.io')(server, {
  cors: {
    origin: "*"
  }
});

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
 

  socket.on('private message', ({ to, message, messageId, date, read }) => {
    const receiverSocket = connectedUsers[to];
    if (receiverSocket) {
      receiverSocket.socket.emit('private message', {
        from: socket.username,
        message,
        messageId,
        date,
        read
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
        count: unseenMessagesCount
      });
      console.log(`message count ${unseenMessagesCount} to ${to}`);
      console.log(`message sent from ${socket.username} to ${to}`);
    } else {
      console.log(`Unable to send message to ${to}, user not connected`);
    }
  });
  // Emit 'message seen' event to sender
socket.on('seen', ({to,messageId,id,read}) => {
    if (connectedUsers[socket.username]) {
     
        console.log(messageId, to,read, connectedUsers[socket.username].unseenMessages);
        connectedUsers[to]?.socket.emit('message seen', { messageId,id,read});
        connectedUsers[socket.username].unseenMessages = connectedUsers[socket.username].unseenMessages.filter((id) => id.messageId !== messageId);
        console.log(messageId, to,read, connectedUsers[socket.username].unseenMessages);
        const unseenMessagesCount = connectedUsers[socket.username].unseenMessages.length;
        connectedUsers[socket.username].socket.emit('unseen messages count', {
            count: unseenMessagesCount,
        });
        console.log(`message seen from ${socket.username}, unseen messages count: ${unseenMessagesCount}`);
    } else {
        console.log(`Unable to mark message as seen, user not connected`);
    }
});


  socket.on('disconnect', () => {
    console.log(`${socket.username} disconnected`);
   
  });
});
