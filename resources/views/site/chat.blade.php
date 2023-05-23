@extends('site.layout')
@section('title', 'Mutamad')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <style>
        /* .wt-chatarea {
                            visibility: hidden;
                        } */



        .recieveNotification {
            top: 50%;
            right: 20px;
            width: 6px;
            height: 6px;

            font-weight: bold;
            color: #f91942;
            margin: -3px 0 0;
            position: absolute;
            border-radius: 6px;
            background: white;

        }


        .wt-main {
            padding: 121px 120px 20px 310px;
        }

        .wt-iconbox {

            height: auto;

        }

        .messages {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
        }

        .message {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            width: fit-content;
            max-width: 70%;
        }

        .input-box {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f2f2f2;
        }

        .input-box input {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            outline: none;
        }

        .input-box button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #008CBA;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Scrollbar */
        .messages::-webkit-scrollbar {
            width: 6px;
        }

        .messages::-webkit-scrollbar-track {
            background-color: #f2f2f2;
        }

        .messages::-webkit-scrollbar-thumb {
            background-color: #aaa;
        }

        .messages::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .wt-memessage .wt-description p {

            background: #95d9c3;
        }
    </style>
@endsection

@section('content')

    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout">



        <!--Register Form Start-->
        <section class="wt-haslayout wt-dbsectionspace">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <div class="wt-dashboardbox wt-messages-holder">
                        <div class="wt-dashboardboxtitle">
                            <h2>Messages</h2>
                        </div>
                        <div class="wt-dashboardboxtitle wt-titlemessages">
                            <a href="javascript:void(0);" class="wt-back"><i class="ti-arrow-left"></i></a>
                            <div class="wt-userlogedin">
                                <figure class="wt-userimg">
                                    <img src="{{ asset('images/user-img.jpg') }}" alt="image description">
                                </figure>
                                <div class="wt-username">
                                    <h3><i class="fa fa-check-circle"></i> Louanne Mattioli</h3>
                                    <span>Amento Tech</span>
                                </div>
                                <div>
                                    <h1 id="typeId" class="wt-viewprofile"></h1>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="wt-viewprofile">View Profile</a>
                        </div>
                        <div class="wt-dashboardboxcontent wt-dashboardholder wt-offersmessages">
                            <ul>
                                <li>

                                    <div class="wt-verticalscrollbar wt-dashboardscrollbar">

                                    </div>

                                </li>
                                <li id="chatbody">
                                    <div class="wt-chatarea">
                                        <div class="wt-messages wt-verticalscrollbar wt-dashboardscrollbar">

                                        </div>


                                    </div>
                                    <div class="wt-replaybox">


                                        <div class="form-group">
                                            <textarea class="form-control" name="reply" placeholder="Type message here"></textarea>
                                        </div>

                                        <div class="wt-iconbox">
                                            <i class="lnr lnr-thumbs-up" data-entity="&#128077;"></i>
                                            <i class="lnr lnr-thumbs-down" data-entity="&#x1F44E;"></i>
                                            <i class="lnr lnr-smile" data-entity="&#128512;"></i>



                                            <i class="lnr lnr-sad" data-entity="&#128579;"></i>
                                            <i class="lnr lnr-neutral" data-entity="&#128528;"></i>



                                            <button class="wt-btnsendmsg" onclick="sendMessage()">Send</button>



                                        </div>
                                    </div>
                        </div>


                        </li>
                        </ul>
                    </div>
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                <div class="wt-dashboardbox wt-messagebox">
                    <span class="wt-featuredtag"><img src="{{ asset('images/featured.png') }}" alt="img description"
                            data-tipso="Plus Member" class="template-content tipso_style"></span>
                    <div class="wt-dashboardboxcontent">
                        <div class="wt-userprofile">
                            <figure>
                                <img src="{{ asset('images/profile/img-02.jpg') }}" alt="img description">
                                <div class="wt-userdropdown wt-online">
                                </div>
                            </figure>
                            <div class="wt-title">
                                <h3><i class="fa fa-check-circle"></i> Valentine Mehring</h3>
                                <span>5.0/5 <a class="javascript:void(0);">(860 Feedback)</a> <br>Member since May 30,
                                    2013 <br><a href="javascript:void(0);">@valentine20658</a></span>
                            </div>
                        </div>
                        <div class="wt-applyfilters">
                            <span>Adpsicing elit sed do eiusmod tempor<br> incididunt ut labore et dolore.</span>
                            <a href="javascript:void(0);" class="wt-btn">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!--Register Form End-->
    </main>
    <!--Main End-->
@endsection
@section('script')


    // Include Socket.IO client library
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
        integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous">
    </script>

    // Initialize Socket.IO client

    <script>
        let socket;
        let url = window.location.href;
        let to = url.substr(url.lastIndexOf('/') + 1);

        let from = `{{ $user->id }}`
        console.log(from)


        function populateChatNotifications() {
            fetch(`/api/v1/get-chats/${from}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    // Loop through the data array and create a div for each item
                    data.data.forEach(item => {
                        // Extract the necessary information from the item
                        const {
                            id,
                            sender,
                            message,
                            sender_id,
                            read,
                            date: created_at
                        } = item;

                        // Check if the notification div already exists
                        const existingNotification = document.querySelector(
                            `input[value="${sender_id}"] + .recieveNotification`
                        );

                        if (!existingNotification) {
                            // Create a new div for the notification
                            const newDiv = document.createElement('div');
                            newDiv.className = 'wt-ad wt-dotnotification wt-active';
                            newDiv.innerHTML = `
            <input type="text" value="${sender_id}" style="display: none;">
            <div class="recieveNotification"></div>
            <figure><img src="{{ asset('images/messages/img-01.jpg') }}" alt="image description"></figure>
            <div class="wt-adcontent">
              <h3>${sender}</h3>
            </div>
            <span>${message}</span>
          `;

                            // Append the new div to the parent container
                            const parentContainer = document.querySelector(
                                '.wt-verticalscrollbar.wt-dashboardscrollbar');
                            parentContainer.prepend(newDiv);

                            // Add click event listener to the new div
                            newDiv.addEventListener('click', () => {
                                const messageContainerEl = document.querySelector(
                                    '.wt-messages .mCSB_container');
                                messageContainerEl.innerHTML = "";
                                const input = newDiv.querySelector('input');
                                to = input.value;
                                connect();
                            });
                        }
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Connect to server using socket.io
        socket = io("http://localhost:3000", {
            transports: ["websocket"],
        });

        // Register sender ID with server

        socket.emit("register", from);

        socket.on('unseen messages count', ({
            count,

        }) => {
            if (count === 0) {
                const notification = document.querySelector(
                    `input[value="${to}"] + .recieveNotification`);
                notification.textContent = ` `;
            }

            console.log(count)
            // Loop through the count object
            for (const notificationFrom in count) {
                const countValue = count[notificationFrom].count;
                // Find the notification div for the corresponding input value
                const notification = document.querySelector(
                    `input[value="${notificationFrom}"] + .recieveNotification`);
                console.log(notification)
                if (notification) {
                    // Update its text content to show the count value
                    if (countValue === 0) {
                        notification.textContent = ` `;
                    } else if (countValue > 0) {
                        notification.textContent = `+${countValue}`;
                    }
                } else {
                    populateChatNotifications();
                }
            }

        });
        // Listen for 'message seen' event from server
        socket.on("message seen", ({
            messageId,
            id,
            read,
        }) => {


            console.log("ms" + messageId);
            const messageEl = document.querySelector(`.wt-memessage #${messageId}`);
            console.log(read);
            // const messageEl = document.getElementById(messageId);
            if (messageEl && read == 1) {

                messageEl.textContent = "Seen";

            }
            if (read == 0) {
                console.log(from, to, id)
                // Make API request to mark the message as read
                fetch(`/api/v1/read-message/${from}/${to}/${id}`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error(error));

            }
        });
        populateChatNotifications();


        // Initialize scrollbar plugin
        $(".wt-messages").mCustomScrollbar();


        function addMessage(read, messageText, isSelf, messageId, date) {
            const messageEl = document.createElement("div");
            isSelf
                ?
                messageEl.classList.add("wt-memessage", "wt-readmessage") :
                messageEl.classList.add("wt-offerermessage");
            messageEl.innerHTML = `
    <figure>
      <img src="{{ asset('images/messages/img-12.jpg') }}" alt="image description">
    </figure>
    <div class="wt-description">
      <p>${messageText}</p>
      <time datetime="${date}">${date}</time>

      <div class="clearfix"></div>
      <span id=${messageId}></span>
    </div>

  `;
            const messageContainerEl = document.querySelector('.wt-messages .mCSB_container');
            messageContainerEl.append(messageEl);




            // Update scrollbar after adding the new message
            $(".wt-messages").mCustomScrollbar("update");


            // Scroll to the bottom of chat container
            $(".wt-messages").mCustomScrollbar("scrollTo", "bottom");







        }



        function connect() {
            if (from && to) {
                // Check if the chat is already open
                const isChatOpen = document.querySelector('.wt-messages .mCSB_container');
                if (isChatOpen) {
                    // Chat is not open, fetch chat messages from the server
                    fetch(`/api/v1/get-user-chat/${from}/${to}`, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            const messages = data.messages;
                            let messageHTML = "";
                            messages.forEach(message => {
                                const createdAt = new Date(message.created_at);
                                addMessage(
                                    message.read,
                                    message.message,
                                    message.sender_id == from,
                                    message.message_id,
                                    createdAt.toLocaleString('default', {
                                        dateStyle: 'medium',
                                        timeStyle: 'short'
                                    })
                                );
                                console.log("ms" + message.message_id);
                                console.log(message);

                                socket.emit('seen', {
                                    to,
                                    messageId: message.message_id,
                                    read: 1
                                });
                                const messageEl = document.querySelector(
                                    `.wt-memessage #${message.message_id}`);
                                // const messageEl = document.getElementById(messageId);
                                console.log(message.read);
                                console.log(messageEl);
                                if (messageEl && message.read == 1) {
                                    console.log(message.read);
                                    messageEl.textContent = "Seen";
                                }
                                if (message.read == 0) {
                                    console.log(from, to, message.id);
                                    // Make API request to mark the message as read
                                    fetch(`/api/v1/read-message/${from}/${to}/${message.id}`, {
                                            method: 'POST',
                                            headers: {
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json'
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(data => console.log(data))
                                        .catch(error => console.error(error));
                                }
                            });
                        })
                        .catch(error => console.error(error));
                }


            } else {
                console.log("Both fields are required");
            }
        }
        socket.on("private message", ({
            from,
            message,
            messageId,
            date,
            read
        }) => {
            if (to === from) {
                console.log("seen");
                // Display received message in chat container
                const dates = new Date(date);
                addMessage(
                    read,
                    message,
                    false,
                    messageId,
                    dates.toLocaleString('default', {
                        dateStyle: 'medium',
                        timeStyle: 'short'
                    })
                );
                socket.emit('seen', {
                    to,
                    messageId,
                    read: 1
                });
            } else {
                // socket.emit('unseen', messageId);
            }
        });
        // Function to send chat messages to server
        function sendMessage() {



            const messageEl = document.querySelector(".wt-replaybox textarea");

            if (messageEl && messageEl.value.trim() !== '') {
                const messageId = `_${Date.now()}`;
                const date = new Date();
                const message = messageEl.value;


                if (to) {
                    fetch("/api/v1/store-chat", {
                            method: 'POST',
                            body: JSON.stringify({
                                sender_id: from,
                                receiver_id: to,
                                message: message,
                                message_id: messageId,
                                read: 0
                            }),
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }

                        })
                        .then(response => response.json())
                        .then(data => console.log(data))
                        .catch(error => console.error(error));

                    //Send message to receiver through server
                    socket.emit("private message", {

                        to,
                        message,
                        messageId,
                        date,
                        read: 0
                    });

                    // Display sent message in chat container
                    addMessage(read = 0, message, true, messageId, date.toLocaleString('default', {
                        dateStyle: 'medium',
                        timeStyle: 'short'
                    }));

                    // Clear message input field
                    messageEl.value = "";
                } else {
                    console.log("Receiver ID is required");
                }
            }
        }

        $('.lnr').click(function() {
            let entity = $(this).data('entity');
            $('.wt-replaybox textarea').val($('.wt-replaybox textarea').val() + entity);
        });
    </script>


@endsection
