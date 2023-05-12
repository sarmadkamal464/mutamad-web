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
            isTyping: false,
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
           
    
            // Emit 'message seen' event to sender
            if (connectedUsers[socket.username]) {
                connectedUsers[socket.username].socket.emit('message seen', { messageId});
                console.log(`message seen from ${socket.username} `);
            }else{
                   // Add the messageId to the receiver's unseenMessages array
            receiverSocket.unseenMessages.push(messageId);
            }
       // Calculate number of unseen messages for receiver
      const unseenMessagesCount = Object.values(connectedUsers[to].seenMessages).filter((seen) => !seen).length;

      // Emit 'unseen messages count' event to receiver
      receiverSocket.socket.emit('unseen messages count', {
        count: unseenMessagesCount,
      });
      console.log(`sent unseen messages count (${unseenMessagesCount}) to ${to}`);
    
            console.log(`message sent from ${socket.username} to ${to}`);
        } 
        else {
            console.log(`Unable to send message to ${to}, user not connected`);
        }
    });
    
    socket.on('typing', ({
        to,isTyping
    }) => {
        const receiverSocket = connectedUsers[to];
        if (receiverSocket) {
            receiverSocket.socket.emit('typing' ,({
                to,isTyping
            }));
        }
    });

    socket.on('disconnect', () => {
        console.log(`${socket.username} disconnected`);
        delete connectedUsers[socket.username];
    });
});
