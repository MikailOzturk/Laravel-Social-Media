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

    <style>
        .image-area img {
            width: 104px;
            height: 104px;
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

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active in show" id="home">



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
                                                                <span>{{$postLike[$i]}}</span>

                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if($likeControl[$i]=="false")
                                                        <li>

                                                            <a href="{{URL::to('postLike',$post->id)}}">
                                                                <i class="material-icons">thumb_up</i>
                                                                <span>{{$postLike[$i]}}</span>

                                                            </a>
                                                        </li>
                                                    @endif

                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">comment</i>
                                                            <span>{{$postComment[$i]}} Comments</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Share</span>
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
        </div>
    </div>


@endsection



<!-- Jquery Core Js -->
<script src="assets/front/profile/plugins/jquery/jquery.min.js"></script>

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

