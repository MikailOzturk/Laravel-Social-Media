@extends('layouts/front/fmaster')

        <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

    <style>
        .image-area img {
            width: 104px;
            height: 104px;
        }

        .panel-shadow {
            box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
        }

        .panel-white {
            border: 1px solid #dddddd;
        }

        .panel-white .panel-heading {
            color: #333;
            background-color: #fff;
            border-color: #ddd;
        }

        .panel-white .panel-footer {
            background-color: #fff;
            border-color: #ddd;
        }

        .post .post-heading {
            height: 95px;
            padding: 20px 15px;
        }

        .post .post-heading .avatar {
            width: 60px;
            height: 60px;
            display: block;
            margin-right: 15px;
        }

        .post .post-heading .meta .title {
            margin-bottom: 0;
        }

        .post .post-heading .meta .title a {
            color: black;
        }

        .post .post-heading .meta .title a:hover {
            color: #aaaaaa;
        }

        .post .post-heading .meta .time {
            margin-top: 8px;
            color: #999;
        }

        .post .post-image .image {
            width: 100%;
            height: auto;
        }

        .post .post-description {
            padding: 15px;
        }

        .post .post-description p {
            font-size: 14px;
        }

        .post .post-description .stats {
            margin-top: 20px;
        }

        .post .post-description .stats .stat-item {
            display: inline-block;
            margin-right: 15px;
        }

        .post .post-description .stats .stat-item .icon {
            margin-right: 8px;
        }

        .post .post-footer {
            border-top: 1px solid #ddd;
            padding: 15px;
        }

        .post .post-footer .input-group-addon a {
            color: #454545;
        }

        .post .post-footer .comments-list {
            padding: 0;
            margin-top: 20px;
            list-style-type: none;
        }

        .post .post-footer .comments-list .comment {
            display: block;
            width: 100%;
            margin: 20px 0;
        }

        .post .post-footer .comments-list .comment .avatar {
            width: 35px;
            height: 35px;
        }

        .post .post-footer .comments-list .comment .comment-heading {
            display: block;
            width: 100%;
        }

        .post .post-footer .comments-list .comment .comment-heading .user {
            font-size: 14px;
            font-weight: bold;
            display: inline;
            margin-top: 0;
            margin-right: 10px;
        }

        .post .post-footer .comments-list .comment .comment-heading .time {
            font-size: 12px;
            color: #aaa;
            margin-top: 0;
            display: inline;
        }

        .post .post-footer .comments-list .comment .comment-body {
            margin-left: 50px;
        }

        .post .post-footer .comments-list .comment > .comments-list {
            margin-left: 50px;
        }
    </style>

</head>

<body class="theme-red">
<!-- Page Loader -->

@section('icerik')


    <div class="container-fluid">
        <div class="row clearfix">

            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="status-upload nopaddingbtm">
                                        <form action="{{url('posts')}}" class="form-group" enctype="multipart/form-data"
                                              method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="file" name="image" id="image"/>
                                            <input type="title" class="form-control" id="title"
                                                   name="title" placeholder="title" required><br>
                                            <textarea class="form-control" name="content" id="new-Post"
                                                      placeholder="Ne Düşünüyorsun?" style="height: 80px;"></textarea>
                                            <br>
                                            <ul class="nav nav-pills pull-left ">
                                                <li><a title="" data-toggle="tooltip" data-placement="bottom"
                                                       data-original-title="Audio"><i
                                                                class="glyphicon glyphicon-bullhorn"></i></a></li>
                                                <li><a title="" data-toggle="tooltip" data-placement="bottom"
                                                       data-original-title="Video"><i
                                                                class=" glyphicon glyphicon-facetime-video"></i></a>
                                                </li>
                                                <li><a title="" data-toggle="tooltip" data-placement="bottom"
                                                       data-original-title="Picture"><i
                                                                class="glyphicon glyphicon-picture"></i></a></li>
                                            </ul>
                                            <button type="submit" class="btn btn-success pull-right"> Paylaş</button>
                                        </form>
                                    </div>
                                    <!-- Status Upload  -->
                                </div>
                            </div>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active in show" id="home">
                                    @php($i=0)
                                    @foreach($posts as $post)
                                        <div class="panel panel-default panel-post">

                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="http://127.0.0.1:8000/otherprofile">
                                                            <img src="uploads/images/profile_images/{{$post->userImage}}"/>
                                                        </a>
                                                    </div>

                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <form action="{{url('otherprofile')}}">
                                                                <input name="profileId" type="hidden"
                                                                       value="{{$post->userId}}"/>
                                                                <input type="submit"
                                                                       value="{{$post->username}} {{$post->usersurname}}"
                                                                       style="background: transparent">
                                                            </form>

                                                        </h4>
                                                        Paylaşılma tarihi
                                                        - {{ \Carbon\Carbon::parse($post->postDate)->format('d.m.Y')}}
                                                    </div>

                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <form action="{{url('showCompany')}}">
                                                                <input name="comId" type="hidden"
                                                                       value="{{$post->companyId}}"/>
                                                                <input style="float: right; margin:10px; background: transparent" type="submit"
                                                                       value="{{$post->companyName}} "
                                                                       >
                                                            </form>


                                                        </h4>

                                                    </div>

                                                    <div class="media-left">

                                                        <img style=" width: 70px; height: 70px;"
                                                             src="uploads/images/company_images/{{$post->companyImage}}"/>

                                                    </div>
                                                </div>


                                            </div>




                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>{{$post->content}}</p>
                                                    </div>
                                                    <div class="post-content" style="padding: 20px;">
                                                        <img src="uploads/images/post_images/{{$post->postImage}}"
                                                             class="img-responsive"
                                                             style="height: 350px; width: 100%;"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                @foreach($likers as $liker)
                                                    @if($post->postId==$liker->postId)
                                                    {{$liker->name}}  {{$liker->surname}} <br>
                                                    @endif
                                                @endforeach
                                                <ul>

                                                    @if($likeControl[$i]=="true")
                                                        <li>

                                                            <a href="{{URL::to('postUnlike',$post->postId)}}">
                                                                <i class="material-icons"
                                                                   style="color: #00a2e3">thumb_up</i>

                                                            </a>
                                                            <span>{{$postLike[$i]}} @include('layouts/front/liker')</span>

                                                        </li>
                                                    @endif
                                                    @if($likeControl[$i]=="false")

                                                        <li>

                                                            <a href="{{URL::to('postLike',$post->postId)}}">
                                                                <i class="material-icons">thumb_up</i>

                                                            </a>
                                                            <span>{{$postLike[$i]}} @include('layouts/front/liker')</span>
                                                        </li>
                                                    @endif
                                                    <li><span></span></li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">chat_bubble_outline</i>


                                                        </a><span>{{$postComment[$i]}} @include('layouts/front/comment')</span>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Paylaş</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <form action=" {{url('comment')}}" method="get">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Type a comment" name="content"/>
                                                            <input type="hidden" value="{{$post->postId}}" name="postId">
                                                            <input class="form-control btn btn-primary" type="submit"
                                                                   value="Paylaş"/>
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>
                                            <div class="container">
                                                <div class="col-sm-12">
                                                    <div class="panel panel-white post ">


                                                        <div class="post-footer ">

                                                            <span id="dots">...</span><span id="i">
                                                            <ul class="comments-list">

                                                                @foreach($comments as $comment)
                                                                    @if($post->postId==$comment->postId)


                                                                        <li class="comment">
                                                                    <a class="pull-left" href="#">
                                                                        <img class="avatar"
                                                                             src="uploads/images/profile_images/{{$comment->image_url}}"
                                                                        >
                                                                    </a>
                                                                    <div class="comment-body">
                                                                        <div class="comment-heading">
                                                                            <h4 class="user">{{$comment->name}} {{$comment->surname}}</h4>
                                                                            <h5 class="time">{{$comment->created_at}}</h5>
                                                                        </div>
                                                                        <p>{{$comment->content}}</p>
                                                                    </div>

                                                                </li>

                                                                    @endif
                                                                @endforeach




                                                            </ul>
                                                                 </span>
                                                            <button onclick="myFunction()" id="myBtn">Read more</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php($i=$i+1)
                                    @endforeach


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">

                            @if($user->image_url==null)
                                <img src="uploads/images/profile_images/default.jpg"
                                     alt="AdminBSB - Profile Image"/>
                            @else
                                <a href="http://127.0.0.1:8000/profil"> <img
                                            src="uploads/images/profile_images/{!! $user->image_url !!}"
                                            alt="AdminBSB - Profile Image"/> </a>
                            @endif
                        </div>
                        <div class="content-area">
                            <h3>Merhaba</h3>

                            <h3>{!! $user->name !!} {!! $user->surname !!}</h3>
                            <p>{!! $user->unvan !!}</p>
                            <p>Administrator</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>

                            <li>
                                <span>Takip</span>
                                <span>{{$following}}</span>
                            </li>
                            <li>
                                <span>Gönderi</span>
                                <span>{{$posting}}</span>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection

<script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("i");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>

<!-- Jquery Core Js -->
<script src="assets/front/profile/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->


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
