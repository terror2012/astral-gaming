<!DOCTYPE html>
<!--
  Name: Youplay - Game Template based on Bootstrap
  Version: 3.1.1
  Author: nK
  Website: https://nkdev.info
  Support: https://nk.ticksy.com
  Purchase: http://themeforest.net/item/youplay-game-template-based-on-bootstrap/11306207?ref=_nK
  License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
  Copyright 2016.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>youplay</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Icon -->
  <link rel="icon" type="image/png" href="images/icon.png">
  <!-- Google Fonts -->

  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />

  <!-- FontAwesome -->
  <link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css" />
  <!-- Youplay -->

  <link rel="stylesheet" type="text/css" href="youplay/css/youplay.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" type="text/css" href="assets/css/custom.css" />
  <!-- RTL (uncomment this to enable RTL support) -->
  <!-- <link rel="stylesheet" type="text/css" href="youplay/css/youplay-rtl.css" /> -->

</head>


<body>

  <!-- Preloader -->
  <div class="page-preloader preloader-wrapp">
    <img src="images/logo.png" alt="">
    <div class="preloader"></div>
  </div>
  <!-- /Preloader -->

  <!-- Navbar -->
    @include('layouts/navbar')


  <!-- Main Content -->
  <section class="content-wrap full youplay-login">

    <!-- Banner -->
    <div class="youplay-banner banner-top">
      <div class="image" style="background-image: url('assets/images/banner-bg.jpg')"></div>

      <div class="info">
        <div>
          <div class="container align-center">
            <div class="youplay-form">
              <h1>Login</h1>

              <div class="btn-group social-list dib">
                <a class="btn btn-default" title="Share on Facebook" href="#!"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-default" href="#!" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-default" href="#!" title="Share on Google Plus"><i class="fa fa-google-plus"></i></a>
              </div>

              <form role="form" method="POST" action="{{ url('/login') }}">
                  {{ csrf_field() }}
                <div class="youplay-input">
                  <input id="email" type="text" name="email" placeholder="Email">
                    @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="youplay-input">
                  <input id="password" type="password" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default db">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Banner -->

  </section>
  <!-- /Main Content -->

  <!-- Search Block -->
  <div class="search-block">
    <a href="#!" class="search-toggle glyphicon glyphicon-remove"></a>
    <form action="search.html">
      <div class="youplay-input">
        <input type="text" name="search" placeholder="Search...">
      </div>
    </form>
  </div>
  <!-- /Search Block -->

  <!-- jQuery -->
  <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Hexagon Progress -->
  <script type="text/javascript" src="bower_components/HexagonProgress/jquery.hexagonprogress.min.js"></script>


  <!-- Bootstrap -->
  <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Smooth Scroll -->
  <script type="text/javascript" src="bower_components/smoothscroll-for-websites/SmoothScroll.js"></script>
  <!-- Youplay -->
  <script type="text/javascript" src="youplay/js/youplay.min.js"></script>

  <!-- init youplay -->
  <script>
    if(typeof youplay !== 'undefined') {
        youplay.init({
            // enable parallax
            parallax:         true,
    
            // set small navbar on load
            navbarSmall:      false,
    
            // enable fade effect between pages
            fadeBetweenPages: true,
    
            // twitter and instagram php paths
            php: {
                twitter: './php/twitter/tweet.php',
                instagram: './php/instagram/instagram.php'
            }
        });
    }
  </script>


</body>

</html>
