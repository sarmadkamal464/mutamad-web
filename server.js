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
             unseenMessages: [],
          
        };
        console.log(`${username} is registered`);
    });

    socket.on('private message', ({
        to,
        message,
        messageId,
        date,
    }) => {
        const receiverSocket = connectedUsers[to];
        if (receiverSocket) {
            receiverSocket.socket.emit('private message', {
                from: socket.username,
                message,
                messageId, 
                date,
            });
           
            receiverSocket.unseenMessages.push({messageId, from: socket.username});
    
            const unseenMessagesCount =  receiverSocket.unseenMessages.reduce((acc, curr) => {
                const { from, messageId } = curr;
                
                // if the 'from' property already exists in the accumulator, increase its count by 1
                if (acc.hasOwnProperty(from)) {
                  acc[from].count++;
                } 
                // if the 'from' property does not exist, initialize it with count 1
                else {
                  acc[from] = {
                    count: 1,
                    notificationFrom: from
                  };
                }
              
                return acc;
              }, {});
              
              console.log(unseenMessagesCount);
            receiverSocket.socket.emit('unseen messages count', {
                count: unseenMessagesCount
            });
            console.log(`message count ${unseenMessagesCount} to ${to}`);
            console.log(`message sent from ${socket.username} to ${to}`);
        } 
        else {
            console.log(`Unable to send message to ${to}, user not connected`);
        }
    });
   
    
  // Emit 'message seen' event to sender
socket.on('seen', ({to,messageId}) => {
    if (connectedUsers[socket.username]) {
     
        console.log(messageId, to, connectedUsers[socket.username].unseenMessages);
        connectedUsers[to]?.socket.emit('message seen', { messageId});
        connectedUsers[socket.username].unseenMessages = connectedUsers[socket.username].unseenMessages.filter((id) => id !== messageId);
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
        delete connectedUsers[socket.username];
    });
});
