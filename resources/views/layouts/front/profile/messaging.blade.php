@extends('layouts/front/fmaster')

        <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profile | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/front/profile/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/front/profile/plugins/node-waves/waves.css" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="assets/front/profile/plugins/animate-css/animate.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="assets/front/profile/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/front/profile/css/themes/all-themes.css" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://192.168.43.38:3000/socket.io/socket.io.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <style>
        .image-area img {
            width: 104px;
            height: 104px;
        }

        .container {
            max-width: 1170px;
            margin: auto;
        }

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }

        .top_spac {
            margin: 20px 0 0;
        }

        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
            padding:
        }

        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 550px;
            overflow-y: scroll;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>


</head>

<body class="theme-red">
<!-- Page Loader -->

@section('icerik')



    <input type="hidden" id="myId" value="{{$myId}}"/>
    <input type="hidden" id="receiverId" value="{{$receiverId}}"/>
    <input type="hidden" id="conversationId" value="{{$conversationId}}"/>
    <input type="hidden" id="username" value="{{$username}}"/>
    <input type="hidden" id="image" value="{{$image}}"/>

    <div class="container-fluid">
        <div class="row clearfix">

            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="body">


                        <div class="container">
                            <h3 class=" text-center">Messaging</h3>
                            <div class="messaging">
                                <div class="inbox_msg">
                                    <div class="inbox_people">
                                        <div class="headind_srch">
                                            <div class="recent_heading">
                                                <h4>Recent</h4>
                                            </div>
                                            <div class="srch_bar">
                                                <div class="stylish-input-group">
                                                    <input type="text" class="search-bar" placeholder="Search">
                                                    <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span></div>
                                            </div>
                                        </div>
                                        <div class="inbox_chat">
                                            <div class="chat_list active_chat">
                                                @php
                                                    $i=0
                                                @endphp

                                                @foreach($lastMessages as $last)
                                                    <div class="chat_list">

                                                        <div class="chat_people">
                                                            <div class="chat_img"><img style="border-radius: 100%"
                                                                                       src="uploads/images/profile_images/{{$userArray[$i]->image_url}}"
                                                                                       alt="sunil"></div>
                                                            <div class="chat_ib">
                                                                <h5>{{$userArray[$i]->name}} <span
                                                                            class="chat_date">{{$last[0]->created_at}}</span>
                                                                </h5>

                                                                <input type="submit" value="{{$last[0]->message}}"
                                                                       style="background: transparent">
                                                                <p></p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    @php
                                                        $i++
                                                    @endphp
                                                @endforeach


                                            </div>


                                        </div>
                                    </div>


                                    <div id="mesgs" class="mesgs">
                                        <div id="msg_history" class="msg_history">


                                            @foreach($messages as $msg)
                                                @if($msg->senderId==$myId)
                                                    <div class="outgoing_msg">
                                                        <div class="sent_msg"> <p>{{$msg->message}}</p> <span
                                                                    class="time_date">{{$msg->created_at}} </span></div>
                                                        <br></div>


                                                @else

                                                    <div class="incoming_msg">
                                                        <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                                                        <div class="received_msg">
                                                            <div class="received_withd_msg">{{$reciver->name}} {{$reciver->surname}}<p>{{$msg->message}}</p>
                                                                <span
                                                                        class="time_date">{{$msg->created_at}} </span>
                                                            </div>
                                                        </div>
                                                    </div><br/>

                                                @endif

                                            @endforeach

                                        </div>
                                        <form id="send-message">
                                            <div class="type_msg">
                                                <div class="input_msg_write">
                                                    <input type="text" class="write_msg" placeholder="Type a message"
                                                           id="message"/>
                                                    <button class="msg_send_btn" type="submit">Gönder<i
                                                                class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <ul id="mesages"></ul>
    <script>

        jQuery(function ($) {

            var myId = $('#myId').val().trim();
            var receiverId = $('#receiverId').val().trim();
            var conversationId = $('#conversationId').val().trim();
            var username = $('#username').val().trim();
            var image = $('#image').val().trim();

            const socket = io.connect('http://192.168.43.38:3000')

            socket.emit("connect user", {"userId": myId, "status": "Frontend"});

            socket.on('PRIVATE MESSAGE', function (data) {

                var to_user_id = Math.floor(Math.random() * 1000000000)

                if (data.senderId != myId) {

                    var modal_content = '<div class="incoming_msg"> <div class="incoming_msg_img"></div> ' +
                        '<div class="received_msg"><div class="received_withd_msg"><p id="user_dialog_' + to_user_id + '"></p> ' +
                        ' <span class="time_date"> 11:01 AM    |    Yesterday</span></div> </div>  </div><br/>';
                    $('#msg_history').append(modal_content);
                    $("#user_dialog_" + to_user_id).append(data.message);
                }


            })

            var $messageForm = $('#send-message');
            var $messageBox = $('#message');

            $messageForm.submit(function (e) {
                console.log($messageBox.val())
                e.preventDefault();
                socket.emit('PRIVATE MESSAGE', {
                    'name': username,
                    "userImage": image,
                    "message": $messageBox.val(),
                    "senderId": myId,
                    "conversationId": conversationId,
                    "receiverId": receiverId,
                    "date": "12.05"
                })
                var to_user_id = Math.floor(Math.random() * 1000000000)
                var modal_content = ' <div class="outgoing_msg"><div class="sent_msg"><p id="user_dialog_' + to_user_id + '">' +
                    '</p>  <span class="time_date"> 11:01 AM  |  Today</span></div> <br> </div>';
                $('#msg_history').append(modal_content);
                $("#user_dialog_" + to_user_id).append($messageBox.val());

                var message = $messageBox.val();
                $.ajax({
                    type: "POST",
                    url: '/ajaxRequest',
                    data: {
                        senderId: myId,
                        receiverId: receiverId,
                        conversationId: conversationId,
                        message: message,
                    }
                }).done(function (msg) {

                });
                $messageBox.val('');
            })
        });

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });


    </script>


@endsection



<!-- Jquery Core Js -->
<script src="assets/front/profile/plugins/jquery/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<!-- Bootstrap Core Js -->
<script src="assets/front/profile/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="assets/front/profile/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="assets/front/profile/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="assets/front/profile/plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="assets/front/profile/js/admin.js"></script>
<script src="assets/front/profile/js/pages/examples/profile.js"></script>

<!-- Demo Js -->
<script src="assets/front/profile/js/demo.js"></script>
</body>

</html>

