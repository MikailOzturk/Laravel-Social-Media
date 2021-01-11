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

          <div class="col-xs-12 col-sm-12">
              <div class="card">
                  <div class="body">

                      <h3>Aranan Kelime "{{Request::input('query')}}"</h3>
                      <hr>

                      <div>
                          <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#Şirketler" aria-controls="home" role="tab" data-toggle="tab">Şirketler</a></li>
                              <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Kişiler</a></li>

                          </ul>
                          <div class="tab-content">
                              <div role="tabpanel" class="tab-pane fade in active show" id="Şirketler">


                      @foreach($company as $company)
                          @include('layouts/front/search/companyBlock')
                      @endforeach

                              </div>

                          <div role="tabpanel" class="tab-pane fade in" id="profile_settings">

                              @foreach($users as $user)
                                  @include('layouts/front/search/userBlock')
                              @endforeach
                              </div>

                          </div>
                      </div>
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

