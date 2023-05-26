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
        .wt-offersmessages ul li .wt-messages:before {

            background: none;
        }


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


        @media (max-width: 1059px) {
            .wt-btnsendmsg {
                margin: 0;
                float: left;
                width: 100%;
                margin-top: 0;
                border-radius: 0 0 4px 4px;
            }
        }

        @media (max-width: 991px) {
            .wt-btnsendmsg {
                color: #fff;
                width: 70px;
                height: 29px;
                line-height: 29px;
                text-align: center;
                margin: 4px;
                border-radius: 4px;
                display: inline-block;
                vertical-align: middle;
                float: right;
            }
        }

        @media (max-width: 370px) {
            .wt-btnsendmsg {
                margin: 0;
                float: left;
                width: 100%;
                margin-top: 0;
                border-radius: 0 0 4px 4px;
            }
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
                            <div class="wt-userlogedin" id="wt-userlogedin">

                                <div>
                                    <h1 id="typeId" class="wt-viewprofile"></h1>
                                </div>
                            </div>

                            {{-- <a href="{{ url('/freelancer/' . $freelancer->username) }}" class="wt-viewprofile">View
                                Profile</a> --}}
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    // Initialize Socket.IO client

    <script>
        let SenderImage = `{{ $user->profile_image }}`
        // Define a variable to store the currently active newDiv
        let activeDiv;

        let socket;
        let url = window.location.href;
        let to = url.substr(url.lastIndexOf('/') + 1);

        let from = `{{ $user->id }}`

        if (to == "all") {
            console.log(to);
           
            const boxreply = document.querySelector(".wt-replaybox");
            boxreply.style.display = 'none';
        }


        function populateChatNotifications() {
            fetch(`/main/api/v1/get-chats/${from}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {


                    // Loop through the data array and create a div for each item
                    data.data.forEach(item => {
                        // Extract the necessary information from the item
                        const {
                            id,
                            sender,
                            message,
                            sender_id,
                            read,
                            created_at,
                            sender_image
                        } = item;

                        // Check if the notification div already exists
                        const existingNotification = document.querySelector(
                            `input[value="${sender_id}"] + .recieveNotification`);

                        if (!existingNotification) {
                            // Create a new div for the notification
                            const newDiv = document.createElement('div');
                            newDiv.className = 'wt-ad wt-dotnotification wt-active';
                            newDiv.innerHTML = `
          <input type="text" value="${sender_id}" style="display: none;">
          <div class="recieveNotification"></div>
          <figure>
            <img src="${sender_image ? `<?php echo asset('${sender_image}'); ?>` : `<?php echo asset('images/user-avatar.png'); ?>`}" alt="image description">
          </figure>
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
                                console.log(`hdfhidhfi`.activeDiv)
                                // Reset the background color of the previously active div
                                if (activeDiv) {
                                    activeDiv.style.backgroundColor = '#fff';
                                }

                                // Set the background color of the clicked div
                                newDiv.style.backgroundColor = '#82829708';

                                const messageContainerEl = document.querySelector(
                                    '.wt-messages .mCSB_container');
                                messageContainerEl.innerHTML = '';

                                const input = newDiv.querySelector('input');
                                to = input.value;
                                connect();
                                OpenChat(sender);
                                const messageEl = document.querySelector(".wt-replaybox");
                                messageEl.style.display = 'block';
                                // Update the activeDiv variable
                                activeDiv = newDiv;
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
            console.log(`fkdkf` +
                read);
            // const messageEl = document.getElementById(messageId);
            if (messageEl) {

                messageEl.textContent = "Seen";

            }

            // Make API request to mark the message as read
            if (read === 0) {
                console.log("jkj" + id + from + to)
                axios.post(`/main/api/v1/read-message/${from}/${to}/${id}`, null, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        })
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
            <img src="${SenderImage ? `<?php echo asset('https://mutamad.com/main/public/storage/user-profile-pictures/${SenderImage}'); ?>` : `<?php echo asset('images/user-avatar.png'); ?>`}" alt="image description">
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
                    fetch(`/main/api/v1/get-user-chat/${from}/${to}`, {
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
                                    axios.post(`/main/api/v1/read-message/${from}/${to}/${message.id}`, null, {
                                            headers: {
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json'
                                            }
                                        })
                                        .then(response => {
                                            console.log(response.data);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });


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
                    id: message.id,
                    read
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
                    fetch("/main/api/v1/store-chat", {
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
        connect();
        $('.lnr').click(function() {
            let entity = $(this).data('entity');
            $('.wt-replaybox textarea').val($('.wt-replaybox textarea').val() + entity);
        });
        // Get the element to click on
        const OpenChat = (username) => {
            // Check if the media query matches
            if (window.matchMedia('(max-width: 991px)').matches) {
                // Toggle the CSS properties
                let style = document.querySelector('.wt-offersmessages ul li:first-child').style;
                style.display = style.display === 'none' ? '' : 'none';
                document.querySelector('.wt-offersmessages ul li:nth-child(2)').style.display = style.display ===
                    'none' ? 'block' : 'none';
                document.querySelector('.wt-dashboardboxtitle').style.display = 'none';
                document.querySelector('.wt-titlemessages').style.display = style.display ===
                    'none' ? 'block' : 'none';
                // Change the username in the message div
                let usernameElement = document.getElementById('wt-userlogedin');
                usernameElement.innerHTML = `
                                    <figure class="wt-userimg">
                                    <img src="{{ asset('images/user-img.jpg') }}" alt="image description">
                                </figure>
                                <div class="wt-username" >
                                    <h3><i class="fa fa-check-circle"></i> ${username}</h3>
                                    <span>Private</span>
                                </div>`

            }
        };
        const back = () => {
            // Reset the CSS properties to their original values
            let firstChildStyle = document.querySelector('.wt-offersmessages ul li:first-child').style;
            firstChildStyle.display = '';

            let secondChildStyle = document.querySelector('.wt-offersmessages ul li:nth-child(2)').style;
            secondChildStyle.display = '';

            let dashboardBoxTitleStyle = document.querySelector('.wt-dashboardboxtitle').style;
            dashboardBoxTitleStyle.display = '';

            let titleMessagesStyle = document.querySelector('.wt-titlemessages').style;
            titleMessagesStyle.display = '';
        }
        // Get the element to click on
        let arrowLeftElement = document.querySelector('.ti-arrow-left');

        // Add click event listener
        arrowLeftElement.addEventListener('click', back);

        const checkScreenSize = () => {
            if (window.innerWidth >= 991) {
                back()
            }
        };

        // Initial check on page load
        checkScreenSize();

        // Add resize event listener to dynamically check screen size
        window.addEventListener('resize', checkScreenSize);
    </script>


@endsection
