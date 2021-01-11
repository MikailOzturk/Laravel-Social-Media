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

        img.sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            width: 200px;
        }
    </style>

</head>

<body class="theme-red">
<!-- Page Loader -->

@section('icerik')


    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">

                            @if($user->image_url==null)
                                <img src="uploads/images/profile_images/default.jpg"
                                     alt="AdminBSB - Profile Image"/>
                            @else
                                <img src="uploads/images/profile_images/{!! $user->image_url !!}"
                                     alt="AdminBSB - Profile Image"/>
                            @endif
                        </div>
                        <div class="content-area">
                            <h3>{!! $user->name !!} {!! $user->surname !!}</h3>
                            <p>{!! $user->unvan !!}</p>
                            <p>Administrator</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>

                            <li>
                                <span>Takip</span>
                                <span>{{$following}} </span>
                            </li>
                            <li>
                                <span>Gönderi</span>
                                <span>{{$posting}}</span>
                            </li>


                        </ul>
                        <!--  <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>  -->
                    </div>
                </div>

                <div class="card card-about-me">
                    <div class="header">
                        <h2>Hakkında</h2>
                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">library_books</i>
                                    Eğitim
                                </div>
                                <div class="content">
                                    {!! $user->education !!}
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">location_on</i>
                                    Yaşadığı Yer
                                </div>
                                <div class="content">
                                    Malibu, California
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">edit</i>
                                    Skills
                                </div>
                                <div class="content">
                                    <span class="label bg-red">UI Design</span>
                                    <span class="label bg-teal">JavaScript</span>
                                    <span class="label bg-blue">PHP</span>
                                    <span class="label bg-amber">Node.js</span>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">notes</i>
                                    Description
                                </div>
                                <div class="content">
                                    {!! $user->status !!}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                                          role="tab"
                                                                          data-toggle="tab">Profil</a></li>
                                <li role="presentation"><a href="#profile_settings" aria-controls="settings"
                                                           role="tab"
                                                           data-toggle="tab">Profil Ayarları</a></li>

                                <li role="presentation"><a href="#create_busines" aria-controls="settings"
                                                           role="tab" data-toggle="tab">Şirket Hesabı Aç</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active in show" id="home">

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="status-upload nopaddingbtm">

                                                <form action="{{url('posts')}}" class="form-group"
                                                      enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input type="file" name="image" id="image"/>

                                                    <input type="title" class="form-control" id="title"
                                                           name="title" placeholder="title" required><br>
                                                    <textarea class="form-control" name="content" id="new-Post"
                                                              placeholder="Ne Düşünüyorsun?"
                                                              style="height: 80px;"></textarea>
                                                    <br>
                                                    <ul class="nav nav-pills pull-left ">
                                                        <li><a title="" data-toggle="tooltip" data-placement="bottom"
                                                               data-original-title="Audio"><i
                                                                        class="glyphicon glyphicon-bullhorn"></i></a>
                                                        </li>
                                                        <li><a title="" data-toggle="tooltip" data-placement="bottom"
                                                               data-original-title="Video"><i
                                                                        class=" glyphicon glyphicon-facetime-video"></i></a>
                                                        </li>
                                                        <li><a title="" data-toggle="tooltip" data-placement="bottom"
                                                               data-original-title="Picture"><i
                                                                        class="glyphicon glyphicon-picture"></i></a>
                                                        </li>
                                                    </ul>
                                                    <button type="submit" class="btn btn-success pull-right"> Paylaş
                                                    </button>
                                                </form>
                                            </div>
                                            <!-- Status Upload  -->
                                        </div>
                                    </div>

                                    @php($i=0)
                                    @foreach($posts as $post)
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="uploads/images/profile_images/{{$post->userImage}}"/>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">{{$post->name}} {{$post->surname}}</a>
                                                        </h4>
                                                        Paylaşılma tarihi
                                                        - {{ \Carbon\Carbon::parse($post->postDate)->format('d.m.Y')}}
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>{{$post->content}}</p>
                                                    </div>
                                                    <div class="post-content" style="padding: 20px;">
                                                        <img src="uploads/images/post_images/{{$post->image_url}}"
                                                             class="img-responsive"
                                                             style="height: 350px; width: 100%;"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <ul>
                                                    @if($likeControl[$i]=="true")
                                                        <li>

                                                            <a href="{{URL::to('postUnlike',$post->id)}}">
                                                                <i class="material-icons"
                                                                   style="color: #00a2e3">thumb_up</i>


                                                            </a>
                                                            <span>{{$postLike[$i]}}@include('layouts/front/liker')</span>
                                                        </li>
                                                    @endif
                                                    @if($likeControl[$i]=="false")
                                                        <li>

                                                            <a href="{{URL::to('postLike',$post->id)}}">
                                                                <i class="material-icons">thumb_up</i>
                                                            </a>
                                                            <span style="width: 60px;">{{$postLike[$i]}}@include('layouts/front/liker')</span>
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
                                                            <input type="hidden" value="{{$post->id}}" name="postId">
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
                                                                            <h5 class="time">5 minutes ago</h5>
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
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal" action="{{url('profileSettings')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Ad
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="name" placeholder="Adınızı girin"
                                                           value="{!! $user->name !!}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Soyad
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="surname" placeholder="Soyadınızı girin"
                                                           value="{!! $user->surname !!}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 control-label">Email Adres</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="Email" name="Email"
                                                           placeholder="Email" value="{!! $user->email !!}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthday" class="col-sm-2 ">Doğum Günü
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="birthday" placeholder="Doğum gününüzü giriniz"
                                                           value="{!! $user->birthday !!}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Education" class="col-sm-2 control-label">Eğitim Durumu
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="education" placeholder="eğitim durumunuzu giriniz"
                                                           value="{!! $user->education !!}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-sm-2 control-label">Tel No
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="phone" placeholder="Telefon no giriniz"
                                                           value="{!! $user->phone !!}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Website" class="col-sm-2 control-label">Web Site
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="website" placeholder="Web adresinizi giriniz"
                                                           value="{!! $user->website_adress !!}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="InputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="InputSkills"
                                                           name="InputSkills" placeholder="Skills">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-sm-2 control-label">Profil Resmi
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="file" name="image" id="image"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="checkbox" id="terms_condition_check"
                                                       class="chk-col-red filled-in"/>
                                                <label for="terms_condition_check">I agree to the <a href="#">terms
                                                        and
                                                        conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div role="tabpanel" class="tab-pane fade in" id="create_busines">
                                    <form class="form-horizontal" action=" {{url('company')}} " method="post"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Şirket İsmi
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="company_name" placeholder="Şirketin Adını Giriniz"
                                                           value=" " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Sectör
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="sector" placeholder="Şirketin Çalışma Alanı"
                                                           value=" " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 control-label">Since</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="number" class="form-control" id="since" name="since"
                                                           placeholder="Ne zamandır" value=" " required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="InputSkills" class="col-sm-2 control-label">Açıklama</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="description"
                                                           name="description" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Education" class="col-sm-2 control-label">Adres</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="adress" id="adress" placeholder="adres"
                                                           value=" " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-sm-2 control-label">Resim
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="file" name="image" id="image"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Website" class="col-sm-2 control-label">Status
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                           name="website" placeholder="Web adresinizi giriniz"
                                                           value=" " required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
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

