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


        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        a {
            color: #03658c;
            text-decoration: none;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
            background: #dee1e3;
        }

        /** ====================
         * Lista de Comentarios
         =======================*/
        .comments-container {
            margin: 60px auto 15px;
            width: 768px;
        }

        .comments-container h1 {
            font-size: 36px;
            color: #283035;
            font-weight: 400;
        }

        .comments-container h1 a {
            font-size: 18px;
            font-weight: 700;
        }

        .comments-list {
            margin-top: 30px;
            position: relative;
        }

        /**
         * Lineas / Detalles
         -----------------------*/
        .comments-list:before {
            content: '';
            width: 2px;
            height: 100%;
            background: #c7cacb;
            position: absolute;
            left: 32px;
            top: 0;
        }

        .comments-list:after {
            content: '';
            position: absolute;
            background: #c7cacb;
            bottom: 0;
            left: 27px;
            width: 7px;
            height: 7px;
            border: 3px solid #dee1e3;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .reply-list:before, .reply-list:after {display: none;}
        .reply-list li:before {
            content: '';
            width: 60px;
            height: 2px;
            background: #c7cacb;
            position: absolute;
            top: 25px;
            left: -55px;
        }


        .comments-list li {
            margin-bottom: 15px;
            display: block;
            position: relative;
        }

        .comments-list li:after {
            content: '';
            display: block;
            clear: both;
            height: 0;
            width: 0;
        }

        .reply-list {
            padding-left: 88px;
            clear: both;
            margin-top: 15px;
        }
        /**
         * Avatar
         ---------------------------*/
        .comments-list .comment-avatar {
            width: 65px;
            height: 65px;
            position: relative;
            z-index: 99;
            float: left;
            border: 3px solid #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .comments-list .comment-avatar img {
            width: 100%;
            height: 100%;
        }

        .reply-list .comment-avatar {
            width: 50px;
            height: 50px;
        }

        .comment-main-level:after {
            content: '';
            width: 0;
            height: 0;
            display: block;
            clear: both;
        }
        /**
         * Caja del Comentario
         ---------------------------*/
        .comments-list .comment-box {
            width: 680px;
            float: right;
            position: relative;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
            -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
            box-shadow: 0 1px 1px rgba(0,0,0,0.15);
        }

        .comments-list .comment-box:before, .comments-list .comment-box:after {
            content: '';
            height: 0;
            width: 0;
            position: absolute;
            display: block;
            border-width: 10px 12px 10px 0;
            border-style: solid;
            border-color: transparent #FCFCFC;
            top: 8px;
            left: -11px;
        }

        .comments-list .comment-box:before {
            border-width: 11px 13px 11px 0;
            border-color: transparent rgba(0,0,0,0.05);
            left: -12px;
        }

        .reply-list .comment-box {
            width: 610px;
        }
        .comment-box .comment-head {
            background: #FCFCFC;
            padding: 10px 12px;
            border-bottom: 1px solid #E5E5E5;
            overflow: hidden;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
        }

        .comment-box .comment-head i {
            float: right;
            margin-left: 14px;
            position: relative;
            top: 2px;
            color: #A6A6A6;
            cursor: pointer;
            -webkit-transition: color 0.3s ease;
            -o-transition: color 0.3s ease;
            transition: color 0.3s ease;
        }

        .comment-box .comment-head i:hover {
            color: #03658c;
        }

        .comment-box .comment-name {
            color: #283035;
            font-size: 14px;
            font-weight: 700;
            float: left;
            margin-right: 10px;
        }

        .comment-box .comment-name a {
            color: #283035;
        }

        .comment-box .comment-head span {
            float: left;
            color: #999;
            font-size: 13px;
            position: relative;
            top: 1px;
        }

        .comment-box .comment-content {
            background: #FFF;
            padding: 12px;
            font-size: 15px;
            color: #595959;
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
        }

        .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
        .comment-box .comment-name.by-author:after {
            content: 'autor';
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        /** =====================
         * Responsive
         ========================*/
        @media only screen and (max-width: 766px) {
            .comments-container {
                width: 480px;
            }

            .comments-list .comment-box {
                width: 390px;
            }

            .reply-list .comment-box {
                width: 320px;
            }
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
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#gonderi" aria-controls="gonderi"
                                                                          role="tab"
                                                                          data-toggle="tab">Şirket Gönderileri</a></li>

                                <li role="presentation"  ><a href="#yorum" aria-controls="yorum"
                                                                          role="tab"
                                                                          data-toggle="tab">Şirket Yorumu</a></li>

                            </ul>




                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active in show" id="gonderi">

                                    <div class="panel panel-default">

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

                                <div role="tabpanel" class="tab-pane fade in active" id="yorum">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="status-upload nopaddingbtm">

                                                <form action=" {{url('comComment')}} " class="form-group" enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="rate">
                                                        <input type="radio" id="star5" name="point" value="5" />
                                                        <label for="star5" title="text">5 Yıldız</label>
                                                        <input type="radio" id="star4" name="point" value="4" />
                                                        <label for="star4" title="text">4 Yıldız</label>
                                                        <input type="radio" id="star3" name="point" value="3" />
                                                        <label for="star3" title="text">3 Yıldız</label>
                                                        <input type="radio" id="star2" name="point" value="2" />
                                                        <label for="star2" title="text">2 Yıldız</label>
                                                        <input type="radio" id="star1" name="point" value="1" />
                                                        <label for="star1" title="text">1 Yıldız</label>
                                                    </div>
                                                    <input type="hidden" value="{!! $company->id !!}" name="companyId">
                                                    <textarea class="form-control" name="comment" id="yorum"
                                                          placeholder="Şirket Hakkında Ne Düşünüyorsun?" style="height: 80px;"></textarea>

                                                    <button type="submit" class="btn btn-success pull-right"> Paylaş</button>
                                                </form>
                                            </div>
                                            <!-- Status Upload  -->

                                            <div class="container">
                                                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
                                                <div class="row">
                                                    <!-- Contenedor Principal -->
                                                    <div class="comments-container">
                                                       Yorumlar

                                                        <ul id="comments-list" class="comments-list">
                                                            @foreach($comComment as $comComment)
                                                            <li>
                                                                <div class="comment-main-level">
                                                                    <!-- Avatar -->
                                                                    <div class="comment-avatar"><img src="uploads/images/profile_images/{{$comComment->image_url}}" alt=""></div>
                                                                    <!-- Contenedor del Comentario -->
                                                                    <div class="comment-box">
                                                                        <div class="comment-head">
                                                                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{$comComment->name}}</a></h6>
                                                                            <span> - {{ \Carbon\Carbon::parse($comComment->created_at)->format('d.m.Y')}}</span>
                                                                            <i class="fa fa-reply"></i>
                                                                            <i class="fa fa-heart"></i>
                                                                        </div>
                                                                        <div class="comment-content">
                                                                            {{$comComment->comment}}                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Respuestas de los comentarios -->

                                                            </li>

                                                            @endforeach
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                            @if($company->image_url==null)
                                <img src="uploads/images/profile_images/default.jpg"
                                     alt="AdminBSB - Profile Image"/>
                            @else
                                <img src="uploads/images/company_images/{!! $company->image_url !!} "
                                     alt="AdminBSB - Profile Image"/>
                            @endif
                        </div>
                        <div class="content-area">
                            <h3>{!! $company->company_name !!} </h3>
                            <p>{!! $company->sector!!}</p>

                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Takipci</span>
                                <span>{{$follower}}</span>
                            </li>
                            <li>
                                <span>Gönderi</span>
                                <span> {{$posting}} </span>
                            </li>


                            <li>

                                <a href="{{URL::to('follow',$company->id)}}">
                                    <span>Takip Et</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('unfollow',$company->id)}}">
                                    <span>Takibi Bırak</span>

                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('join',$company->id)}}">
                                    <span>Katıl</span>
                                </a>


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
                                    <i class="material-icons">location_on</i>
                                    Adres
                                </div>
                                <div class="content">
                                    {!! $company->adress !!}
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">edit</i>
                                    Sektor
                                </div>
                                <div class="content">
                                    <span class="label bg-red">UI Design</span>

                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">notes</i>
                                    {!! $company->description !!}
                                </div>
                                <div class="content">

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
