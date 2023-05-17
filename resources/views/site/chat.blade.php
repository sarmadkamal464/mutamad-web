@extends('site.layout')
@section('title', 'Mutamad')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <style>
        #chatbody {
            visibility: hidden;
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
    </style>
@endsection

@section('content')

    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout">
        <!-- Two input fields for sender and receiver user IDs -->
        <input type="text" id="sender" placeholder="Enter sender ID">



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
                                    <form class="wt-formtheme wt-formsearch">
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="text" name="Location" class="form-control"
                                                    placeholder="Search Here">
                                                <a href="javascrip:void(0);" class="wt-searchgbtn"><i
                                                        class="lnr lnr-magnifier"></i></a>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <div class="wt-verticalscrollbar wt-dashboardscrollbar">
                                        <div class="wt-ad wt-dotnotification wt-active">
                                            <input type="text" value="1" style="display: none;">
                                            <div class="recieveNotification"></div>
                                            <figure><img src="{{ asset('images/messages/img-01.jpg') }}"
                                                    alt="image description"></figure>
                                            <div class="wt-adcontent">
                                                <h3>me</h3>
                                            </div>
                                            <span>Consectetur adipisicing elit sed do...</span>
                                        </div>
                                        <div class="wt-ad wt-dotnotification wt-active">
                                            <input type="text" value="2" style="display: none;">
                                            <div class="recieveNotification"></div>
                                            <figure><img src="{{ asset('images/messages/img-10.jpg') }}"
                                                    alt="image description"></figure>
                                            <div class="wt-adcontent">
                                                <h3>Reta Milnes</h3>
                                            </div>
                                            <span>Consectetur adipisicing elit sed do...</span>
                                        </div>
                                        <div class="wt-ad wt-dotnotification wt-active">
                                            <input type="text" value="3" style="display: none;">
                                            <div class="recieveNotification"></div>
                                            <figure><img src="{{ asset('images/messages/img-01.jpg') }}"
                                                    alt="image description"></figure>
                                            <div class="wt-adcontent">
                                                <h3>Reta Milnes</h3>
                                            </div>
                                            <span>Consectetur adipisicing elit sed do...</span>
                                        </div>
                                        <div class="wt-ad wt-dotnotification wt-active">
                                            <input type="text" value="4" style="display: none;">
                                            <div class="recieveNotification"></div>
                                            <figure><img src="{{ asset('images/messages/img-01.jpg') }}"
                                                    alt="image description"></figure>
                                            <div class="wt-adcontent">
                                                <h3>Reta Milnes</h3>
                                            </div>
                                            <span>Consectetur adipisicing elit sed do...</span>
                                        </div>
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

        function addMessage(messageText, isSelf, messageId, date) {
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
            let to;


            const messageContainerEl = document.querySelector('.wt-messages .mCSB_container');
            messageContainerEl.append(messageEl);
            // Scroll to the bottom of chat container
            messageContainerEl.scrollTop = messageContainerEl.scrollHeight;
        }
        const divs = document.querySelectorAll('.wt-ad');

        divs.forEach(div => {
            div.addEventListener('click', () => {
                document.getElementById("chatbody").style.visibility = "visible";

                const messageContainerEl = document.querySelector('.wt-messages .mCSB_container');
                messageContainerEl.innerHTML = "";
                const input = div.querySelector('input');
                to = input.value;
                connect();

            });
        });



        function connect() {

            let from = document.getElementById("sender").value;
            if (from && to) {
                // Connect to server using socket.io
                socket = io("http://localhost:3000", {
                    transports: ["websocket"],
                });

                // Register sender ID with server

                socket.emit("register", from);
                // Function to create connection with server on button click
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
                            // Create a new div for the notification
                            const newDiv = document.createElement('div');
                            newDiv.className = 'wt-ad wt-dotnotification wt-active';
                            newDiv.innerHTML = `
                        <input type="text" value="${notificationFrom}" style="display: none;">
                        <div class="recieveNotification">${countValue > 0 ? `+${countValue}` : ''}</div>
                        <figure><img src="{{ asset('images/messages/img-01.jpg') }}" alt="image description"></figure>
                        <div class="wt-adcontent">
                            <h3>Reta Milnes</h3>
                        </div>
                        <span>Consectetur adipisicing elit sed do...</span>`;
                            // Append the new div to the parent container
                            // Get the parent container
                            const parentContainer = document.querySelector(
                                '.wt-verticalscrollbar.wt-dashboardscrollbar');
                            // Prepend the new div to the parent container
                            parentContainer.prepend(newDiv);
                        }
                    }

                });
                // Listen for 'message seen' event from server
                socket.on("message seen", ({
                    messageId
                }) => {
                    console.log("ms" + messageId);
                    const messageEl = document.getElementById(messageId);
                    if (messageEl) {
                        messageEl.textContent = "Seen";
                    }
                });

                // Listen for 'private message' event from server
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
                            addMessage(message.message, message.sender_id == from, message.message_id, createdAt
                                .toLocaleString(
                                    'default', {
                                        dateStyle: 'medium',
                                        timeStyle: 'short'
                                    }
                                ));
                            socket.emit('seen', {
                                to,
                                messageId: message.message_id
                            });
                        });
                    })
                    .catch(error => console.error(error));

                socket.on("private message", ({
                    from,
                    message,
                    messageId,
                    date,
                }) => {


                    if (to === from) {
                        // Display received message in chat container
                        const dates = new Date(date);
                        addMessage(message, false, messageId, dates.toLocaleString(
                            'default', {
                                dateStyle: 'medium',
                                timeStyle: 'short'
                            }));
                        socket.emit('seen', {
                            to,
                            messageId
                        });


                    } else {
                        socket.emit('unseen', messageId);
                    }
                });
            } else {

                console.log("Both fields are required");
            }
        }
        // Function to send chat messages to server
        function sendMessage() {
            let from = document.getElementById("sender").value;
            const messageEl = document.querySelector(".wt-replaybox textarea");

            if (messageEl && messageEl.value.trim() !== '') {
                const messageId = Date.now();
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
                    });

                    // Display sent message in chat container
                    addMessage(message, true, messageId, date.toLocaleString('default', {
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
            var entity = $(this).data('entity');
            $('.wt-replaybox textarea').val($('.wt-replaybox textarea').val() + entity);
        });
    </script>


@endsection
