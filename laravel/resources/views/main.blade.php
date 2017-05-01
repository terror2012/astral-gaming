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

  <!-- Owl Carousel -->
  <link rel="stylesheet" type="text/css" href="bower_components/owl.carousel/dist/assets/owl.carousel.min.css" />
  <!-- Youplay -->

  <link rel="stylesheet" type="text/css" href="youplay/css/youplay.min.css" />

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

<!--NavBar -->
  @include('layouts/navbar')


  <!-- Main Content -->
  <section class="content-wrap">

    <!-- Banner -->
    <section class="youplay-banner banner-top youplay-banner-parallax">
      <div class="image" style="background-image: url('{{url($general->main_slider_name)}}')">
      </div>

      <div class="info">
        <div>
          <div class="container">
            <h1>{{$general->main_product_name}}</h1>
            <em>"{{$general->main_slider_caption}}"</em>
            <br>
            <br>
            <br>
            <a class="btn btn-lg" href="{{url($general->main_slider_path)}}">Purchase</a>
          </div>
        </div>
      </div>
    </section>
    <!-- /Banner -->

    <!-- Images With Text -->
    <div class="youplay-carousel" data-autoplay="5000">
      @if(!empty($products))
        @foreach($products as $p)

          <a class="angled-img" href="{{url('/products/' . $p->id)}}">
            <div class="img">
              <img src="{{url($p->product_image)}}" alt="">
            </div>
            <div class="over-info">
              <div>
                <div>
                  <h4>{{$p->product_name}}</h4>
                  <div class="rating">
                    <?php

                    $rating = $p->rating;
                    $full = floor($rating);
                    $part = $rating - $full;
                    $nulled = '0';

                    if($part != '0')
                    {
                      $nulled = 5 - $full - 1;
                    }
                    else
                    {
                      $nulled = 5 - $full;
                    }

                    ?>
                    @if($full != '0')
                        @for($i='0'; $i < $full; $i++)
                          <i class="fa fa-star"></i>
                        @endfor
                      @endif
                    @if($part != '0')
                        <i class="fa fa-star-half-o"></i>
                      @endif
                      @if($nulled != '0')
                        @for($i='0'; $i < $nulled; $i++)
                          <i class="fa fa-star-o"></i>
                        @endfor
                      @endif
                  </div>
                </div>
              </div>
            </div>
          </a>
        @endforeach
        @endif
    </div>
    <!-- /Images With Text -->


  @if(!empty($popular))
    <!-- Popular -->
    <h2 class="container h1">Popular</h2>
    <div class="youplay-carousel">

        @foreach($popular as $ps)
          <a class="angled-img" href="{{url('/products/' . $ps->id)}}">
            <div class="img">
              <img src="{{url($ps->product_image)}}" alt="">
            </div>
            <div class="over-info">
              <div>
                <div>
                  <h4>{{$ps->product_name}}</h4>
                  <div class="rating">

                    <?php

                    $ratin = $ps->rating;
                    $fully = floor($ratin);
                    $party = $ratin - $fully;
                    $nul = '0';

                    if($party != '0')
                    {
                      $nul = 5 - $fully - 1;
                    }
                    else
                    {
                      $nul = 5 - $fully;
                    }

                    ?>
                    @if($fully != '0')
                      @for($i='0'; $i < $fully; $i++)
                        <i class="fa fa-star"></i>
                      @endfor
                    @endif
                    @if($party != '0')
                      <i class="fa fa-star-half-o"></i>
                    @endif
                    @if($nul != '0')
                      @for($i='0'; $i < $nul; $i++)
                        <i class="fa fa-star-o"></i>
                      @endfor
                    @endif

                  </div>
                </div>
              </div>
            </div>
          </a>
        @endforeach
        @endif
    </div>
    <!-- /Popular -->


    <!-- Specials -->
    <h2 class="container h1">Featured </h2>
    <div class="youplay-carousel">

        @if(!empty($featured))
            @foreach($featured as $f)
                <a class="angled-img" href="{{url('products/' . $f->id)}}">
                    <div class="img img-offset">
                        <img src="{{url($f->picture_main)}}" alt="">

                        <?php
                        if($f->isPercentage == '1')
                        {
                            $percentage = $f->discountPrice;
                        }
                        else
                        {
                            $price = $f->price;
                            $discount = $f->discountPrice;
                            $percentage = round($discount / $price * 100);
                        }
                        ?>

                        @if(!empty($percentage))
                            <div class="badge bg-default">
                                -{{$percentage}}%
                            </div>
                            @endif

                    </div>
                    <div class="bottom-info">
                        <h4>{{$f->product_name}}</h4>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="rating">
                                    <?php

                                    $ratins = $f->rating;
                                    $fullys = floor($ratins);
                                    $partys = $ratins - $fullys;
                                    $nuls = '0';

                                    if($partys != '0')
                                    {
                                        $nuls = 5 - $fullys - 1;
                                    }
                                    else
                                    {
                                        $nuls = 5 - $fullys;
                                    }

                                    ?>
                                    @if($fullys != '0')
                                        @for($i='0'; $i < $fullys; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    @endif
                                    @if($partys != '0')
                                        <i class="fa fa-star-half-o"></i>
                                    @endif
                                    @if($nuls != '0')
                                        @for($i='0'; $i < $nuls; $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <?php

                                if($f->isPercentage == '1')
                                {
                                    $priceD = ($f->discountPrice / 100) * $f->price;
                                    $price = $f->price - $priceD;
                                }
                                else
                                {
                                    $price = $f->price - $f->discountPrice;
                                }

                                ?>
                                    @if($f->isDiscountOn == '0')
                                        <div class="price">${{$f->price}}
                                            @elseif($price != '0')

                                                <div class="price"> ${{$price}} <sup><del>${{$f->price}}</del></sup>
                                                    </div>

                                                @else


                                                <div class="price"><span class="text-success">FREE!</span><sup><del>${{$f->price}}</del></sup></div>

                                            @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            @endif

    </div>
    <!-- /Specials -->


    <!-- Preorder -->
    @if(!empty($preorder))
        <div class="h2"></div>
        <section class="youplay-banner youplay-banner-parallax small">
          <div class="image" style="background-image: url('{{$preorder['background']}}');">
          </div>

          <div class="info container align-center">
            <div>
              <h2>{{$preorder['name']}}</h2>

              <!-- See countdown init in bottom of the page -->
              <div class="countdown h2" data-end="{{$preorder['released']}}" data-timezone="EST"></div>

              <br>
              <br>
              <a class="btn btn-lg" href="#!">Pre-Order</a>
            </div>
          </div>
        </section>
      @endif
    <!-- /Preorder -->


    <!-- Latest News -->
    <h2 class="container h1">Latest News</h2>
    <section class="youplay-news container">
      <!-- Single News Block -->
      <div class="news-one">
        <div class="row vertical-gutter">
          <div class="col-md-4">
            <a href="blog-post-1.html" class="angled-img">
              <div class="img">
                <img src="images/game-bloodborne-500x375.jpg" alt="">
              </div>
              <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="9.1 out of 10"><span>9.1</span>
              </div>
            </a>
          </div>
          <div class="col-md-8">
            <div class="clearfix">
              <h3 class="h2 pull-left m-0"><a href="blog-post-1.html">Bloodborne - First Try!</a></h3>
              <span class="date pull-right"><i class="fa fa-calendar"></i> Today</span>
            </div>
            <div class="tags">
              <i class="fa fa-tags"></i>  <a href="#">Bloodborne</a>, <a href="#">first try</a>, <a href="#">first boss problem</a>, <a href="#">newbie game</a>
            </div>
            <div class="description">
              <p>
                Gus sit amet suum motum. Nescio quando, aut quomodo, nescio quo. Illud scio, amet tortor. Suarum impotens prohibere eum.
              </p>
              <p>
                Sum expectantes. Ego hodie expectantes. Expectantes, et misit unum de pueris Gus interficere. Et suus vos. Nescio quis, qui est bonus usus liberi ad Isai? Qui nosti ... Quis dimisit filios ad necem ... hmm? Gus!
              </p>
            </div>
            <a href="blog-post-1.html" class="btn read-more pull-left">Read More</a>
          </div>
        </div>
      </div>
      <!-- /Single News Block -->

      <!-- Single News Block -->
      <div class="news-one">
        <div class="row vertical-gutter">
          <div class="col-md-4">
            <a href="blog-post-2.html" class="angled-img">
              <div class="img">
                <img src="images/game-dark-souls-ii-500x375.jpg" alt="">
              </div>
              <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="9 out of 10"><span>9</span>
              </div>
            </a>
          </div>
          <div class="col-md-8">
            <div class="clearfix">
              <h3 class="h2 pull-left m-0"><a href="blog-post-2.html">Coming to Youplay - Dark Souls II</a></h3>
              <span class="date pull-right"><i class="fa fa-calendar"></i> March 9, 2015</span>
            </div>
            <div class="tags">
              <i class="fa fa-tags"></i>  <a href="#">Dark Souls II</a>, <a href="#">coming soon</a>, <a href="#">first review</a>, <a href="#">sale date</a>
            </div>
            <div class="description">
              Ille vivere. Ut ad te quaerebam ... purgare caeli. Sunt uh ... nonnullus propter errorem qui de rebus inter nos et iacere puto suus in causa, id est in mensa. Levir meus, priusquam oppugnarent tempus quis, admonere dicitur. Credo quod idem mihi praesidium.
            </div>
            <a href="blog-post-2.html" class="btn read-more pull-left">Read More</a>
          </div>
        </div>
      </div>
      <!-- /Single News Block -->

      <!-- Single News Block -->
      <div class="news-one">
        <div class="row vertical-gutter">
          <div class="col-md-4">
            <a href="blog-post-3.html" class="angled-img">
              <div class="img">
                <img src="images/game-kingdoms-of-amalur-reckoning-500x375.jpg" alt="">
              </div>
              <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="3.8 out of 10"><span>3.8</span>
              </div>
            </a>
          </div>
          <div class="col-md-8">
            <div class="clearfix">
              <h3 class="h2 pull-left m-0"><a href="blog-post-3.html">Review Kingdoms of Amalur</a></h3>
              <span class="date pull-right"><i class="fa fa-calendar"></i> March 1, 2015</span>
            </div>
            <div class="tags">
              <i class="fa fa-tags"></i>  <a href="#">Kingdoms of Amalur</a>, <a href="#">game</a>, <a href="#">review</a>
            </div>
            <div class="description">
              Quod satis pecuniae sempiternum. Ut sciat oportet motum. Nunquam invenies eum. Hic de tabula. Ego vivere, ut debui, et nunc fiant. Istuc quod opus non est. Lorem ipsum occurrebat pragmaticam semper ut, si quis ita velim tibi bene recognoscere. Quorum
              duo te mihi videtur.
            </div>
            <a href="blog-post-3.html" class="btn read-more">Read More</a>
          </div>
        </div>
      </div>
      <!-- /Single News Block -->
    </section>
    <!-- /Latest News -->


    <!-- Features -->
    <h2 class="container h1">Why Buy from Us</h2>
    <section class="youplay-features container">
      <div class="col-md-3 col-sm-6">
        <a class="feature angled-bg" href="#">
          <i class="fa fa-cc-visa"></i>
          <h3>Payment</h3>
          <small>More than 10 payment systems</small>
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature angled-bg">
          <i class="fa fa-gamepad"></i>
          <h3>Games</h3>
          <small>A large number of games</small>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature angled-bg">
          <i class="fa fa-money"></i>
          <h3>Cheap</h3>
          <small>Lowest prices on the Internet</small>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature angled-bg">
          <i class="fa fa-users"></i>
          <h3>Community</h3>
          <small>The largest gaming community</small>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="youplay-footer-parallax">
      <div class="wrapper" style="background-image: url('@if(!empty($general->Bg_image)) {{url($general->Bg_image)}} @endif')">

        <!-- Social Buttons -->
        <div class="social">
          <div class="container">
            <h3>Connect socially with <strong>youplay</strong></h3>

            <div class="social-icons">
              <div class="social-icon">
                <a href="@if(!empty($general->facebook)) http://{{$general->facebook}} @endif">
                  <i class="fa fa-facebook-square"></i>
                  <span>Like on Facebook</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="@if(!empty($general->twitter)) http://{{$general->twitter}} @endif">
                  <i class="fa fa-twitter-square"></i>
                  <span>Follow on Twitter</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="@if(!empty($general->twitch)) http://{{$general->twitch}} @endif">
                  <i class="fa fa-twitch"></i>
                  <span>Watch on Twitch</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="@if(!empty($general->youtube)) http://{{$general->youtube}} @endif">
                  <i class="fa fa-youtube-square"></i>
                  <span>Watch on Youtube</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /Social Buttons -->

        <!-- Copyright -->
        <div class="copyright">
          <div class="container">
            <strong>nK</strong> &copy; 2016. All rights reserved
          </div>
        </div>
        <!-- /Copyright -->

      </div>
    </footer>
    <!-- /Footer -->

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

  <!-- Jarallax -->
  <script type="text/javascript" src="bower_components/jarallax/dist/jarallax.min.js"></script>

  <!-- Smooth Scroll -->
  <script type="text/javascript" src="bower_components/smoothscroll-for-websites/SmoothScroll.js"></script>

  <!-- Owl Carousel -->
  <script type="text/javascript" src="bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

  <!-- Countdown -->
  <script type="text/javascript" src="bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>

  <!-- Moment.js -->
  <script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="bower_components/moment-timezone/builds/moment-timezone-with-data.min.js"></script>
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


  <script type="text/javascript">
    $(".countdown").each(function() {
        var tz = $(this).attr('data-timezone');
        var end = $(this).attr('data-end');
            end = moment.tz(end, tz).toDate();
        $(this).countdown(end, function(event) {
          $(this).text(
            event.strftime('%D days %H:%M:%S')
          );
        });
    })
  </script>

</body>

</html>
