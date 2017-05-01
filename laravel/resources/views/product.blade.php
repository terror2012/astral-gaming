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
  <link rel="icon" type="image/png" href="{{url('images/icon.png')}}">
  <!-- Google Fonts -->

  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />

  <!-- FontAwesome -->
  <link rel="stylesheet" type="text/css" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}" />

  <!-- Owl Carousel -->
  <link rel="stylesheet" type="text/css" href="{{url('bower_components/owl.carousel/dist/assets/owl.carousel.min.css')}}" />

  <!-- Magnific Popup -->
  <link rel="stylesheet" type="text/css" href="{{url('bower_components/magnific-popup/dist/magnific-popup.css')}}" />

  <!-- Social Likes -->
  <link rel="stylesheet" type="text/css" href="{{url('bower_components/social-likes/dist/social-likes_flat.css')}}" />
  <!-- Youplay -->

  <link rel="stylesheet" type="text/css" href="{{url('youplay/css/youplay.min.css')}}" />

  <!-- Custom Styles -->
  <link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}" />
  <!-- RTL (uncomment this to enable RTL support) -->
  <!-- <link rel="stylesheet" type="text/css" href="../youplay/css/youplay-rtl.css" /> -->

</head>


<body>

<!-- Preloader -->
<div class="page-preloader preloader-wrapp">
  <img src="{{url('images/logo.png')}}" alt="">
  <div class="preloader"></div>
</div>
<!-- /Preloader -->

  <!-- Navbar -->
  @include('layouts/navbar')
  <!-- /Navbar -->


  <!-- Main Content -->
  <section class="content-wrap">

    <!-- Banner -->
    <div class="youplay-banner youplay-banner-parallax banner-top">
      <div class="image" style="background-image: url('{{url($product['pic_main'])}}')">
      </div>

      <div class="info">
        <div>
          <div class="container">
            <h1>Bloodborne</h1>
            <br>
                    @if($product['isDiscOn'] == '1')
                  <a href="#!" class="btn btn-lg" title="Add to Cart">${{$product['price']}}</a>
                        @else
                  <?php

                  if($product['percentage'] == '1')
                  {
                      $priceD = ($product['discount'] / 100) * $product['price'];
                      $price = $product['price'] - $priceD;
                  }
                  else
                  {
                      $price = $product['price'] - $product['discount'];
                  }

                  ?>
                  <a href="#!" class="btn btn-lg" title="Add to Cart"><span><sup><del>${{$product['price']}}</del></sup></span> ${{$price}}</a>
@endif
          </div>
        </div>
      </div>
    </div>
    <!-- /Banner -->


    <!-- Images With Text -->
    <div class="youplay-carousel gallery-popup">
      <a class="angled-img" href="{{$product['trailer']}}">
        <div class="img">
          <img src="http://img.youtube.com/vi/{{$product['trailer_code']}}/1.jpg" alt="">
        </div>
        <i class="fa fa-play icon"></i>
          </a>
          <a class="angled-img" href="{{$product['gameplay']}}">
              <div class="img">
                  <img src="http://img.youtube.com/vi/{{$product['gameplay_code']}}/1.jpg" alt="">
              </div>
              <i class="fa fa-play icon"></i>
      </a>
      @if(!empty($product['pics']))
              @foreach($product['pics'] as $p)
                <a class="angled-img" href="{{url('images/products/'.$p)}}">
                    <div class="img">
                        <img src="{{url('images/products/' . $p)}}" alt="">
                    </div>
                    <i class="fa fa-search-plus icon"></i>
                </a>

                  @endforeach
          @endif
    </div>
    <!-- /Images With Text -->


    <div class="container youplay-store">

      <div class="col-md-9">
        <!-- Post Info -->
        <article>

          <!-- Description -->
          <h2 class="mt-0">Description</h2>
          <div class="description">
            <p>{{$product['description']}}</p>
          </div>
          <!-- /Description -->

          <!-- Post Share -->
          <div class="btn-group social-list social-likes" data-counters="no">
            <span class="btn btn-default facebook" title="Share link on Facebook"></span>
            <span class="btn btn-default twitter" title="Share link on Twitter"></span>
            <span class="btn btn-default plusone" title="Share link on Google+"></span>
            <span class="btn btn-default pinterest" title="Share image on Pinterest" data-media=""></span>
            <span class="btn btn-default vkontakte" title="Share link on VK"></span>
          </div>
          <!-- /Post Share -->
        </article>
        <!-- /Post Info -->


        <!-- Information -->
        <div class="requirements-block">
          <h2>System Requirements</h2>
          <div>
            <strong>OS:</strong> {{$product['os']}}
          </div>
          <div>
            <strong>Processor:</strong> {{$product['cpu']}}
          </div>
          <div>
            <strong>Memory:</strong> {{$product['memory']}}
          </div>
          <div>
            <strong>Graphics:</strong> {{$product['gpu']}}
          </div>
          <div>
            <strong>DirectX:</strong> {{$product['directX']}}
          </div>
          <div>
            <strong>Network:</strong> {{$product['network']}}
          </div>
          <div>
            <strong>Hard Drive:</strong> {{$product['hdd']}}
          </div>
          <div>
            <strong>Sound Card:</strong> {{$product['sound_card']}}
          </div>
        </div>
        <!-- /Information -->


        <!-- Reviews -->
        <div class="reviews-block mb-0">
          <h2>Reviews <small>{{$product['review_count']}}</small></h2>

          <!-- Reviews List -->
          <ul class="reviews-list">
            <!-- Kristen Bradley review -->
            @foreach($review as $r)
              <li>
                <article>
                  <div class="review-avatar pull-left">
                    <img src="assets/images/avatar-user-1.png" alt="">
                  </div>
                  <div class="review-cont clearfix">
                    <div class="rating pull-right">
                        <?php

                        $ratins = $r['reviewRating'];
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
                    <a class="review-author h4" href="#!">{{$r['userName']}}</a>
                    <div class="date"><i class="fa fa-calendar"></i> {{$r['postedAt']}}</div>
                    <div class="review-text">
                      <p>
                        {{$r['message']}}
                      </p>
                    </div>
                  </div>
                </article>
              </li>
            @endforeach
            <!-- /Kristen Bradley review -->
          </ul>
          <!-- /Reviews List -->

          <!-- Review Form -->
          @if(Auth::check())
            <h2>Add a Review</h2>
            <form action="{{url('/add_review/'.$product['id'])}}" class="review-form mb-0">
              <div class="review-cont clearfix">
                <div class="youplay-textarea">
                  <textarea name="message" rows="5" placeholder="Your Review..."></textarea>
                </div>
                <div class="youplay-rating pull-right">
                  <input type="radio" id="review-rate-5" name="review-rate" value="5">
                  <label for="review-rate-5"><i class="fa fa-star"></i>
                  </label>
                  <input type="radio" id="review-rate-4" name="review-rate" value="4">
                  <label for="review-rate-4"><i class="fa fa-star"></i>
                  </label>
                  <input type="radio" id="review-rate-3" name="review-rate" value="3">
                  <label for="review-rate-3"><i class="fa fa-star"></i>
                  </label>
                  <input type="radio" id="review-rate-2" name="review-rate" value="2">
                  <label for="review-rate-2"><i class="fa fa-star"></i>
                  </label>
                  <input type="radio" id="review-rate-1" name="review-rate" value="1">
                  <label for="review-rate-1"><i class="fa fa-star"></i>
                  </label>
                </div>
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-default pull-right">Submit</button>
              </div>
            </form>
          @endif
          <!-- /Review Form -->
        </div>
        <!-- /Reviews -->
      </div>

      <!-- Right Side -->
      <div class="col-md-3">

        <!-- Side Search -->
        <div class="side-block">
          <p>Search by Games:</p>
          <form action="search.html">
            <div class="youplay-input">
              <input type="text" name="search" placeholder="enter search term">
            </div>
          </form>
        </div>
        <!-- /Side Search -->

        <!-- Side Categories -->
        <div class="side-block">
          <h4 class="block-title">Categories</h4>
          <ul class="block-content">
            <li><a href="#!">All</a>
            </li>
            <li><a href="#!">Action</a>
            </li>
            <li><a href="#!">Adventure</a>
            </li>
            <li><a href="#!">Casual</a>
            </li>
            <li><a href="#!">Indie</a>
            </li>
            <li><a href="#!">Racing</a>
            </li>
            <li><a href="#!">RPG</a>
            </li>
            <li><a href="#!">Simulation</a>
            </li>
            <li><a href="#!">Strategy</a>
            </li>
          </ul>
        </div>
        <!-- /Side Categories -->

        <!-- Side Popular News -->
        <div class="side-block">
          <h4 class="block-title">Popular Games</h4>
          <div class="block-content p-0">
            <!-- Single News Block -->
            <div class="row youplay-side-news">
              <div class="col-xs-3 col-md-4">
                <a href="product.blade.php" class="angled-img">
                  <div class="img">
                    <img src="assets/images/game-bloodborne-500x375.jpg" alt="">
                  </div>
                </a>
              </div>
              <div class="col-xs-9 col-md-8">
                <h4 class="ellipsis"><a href="product.blade.php" title="Bloodborne">Bloodborne</a></h4>
                <span class="price">$50.00</span>
              </div>
            </div>
            <!-- /Single News Block -->

            <!-- Single News Block -->
            <div class="row youplay-side-news">
              <div class="col-xs-3 col-md-4">
                <a href="#!" class="angled-img">
                  <div class="img">
                    <img src="assets/images/game-dark-souls-ii-500x375.jpg" alt="">
                  </div>
                </a>
              </div>
              <div class="col-xs-9 col-md-8">
                <h4 class="ellipsis"><a href="#!" title="Dark Souls II">Dark Souls II</a></h4>
                <span class="price">$39.99 <sup><del>$49.99</del></sup></span>
              </div>
            </div>
            <!-- /Single News Block -->

            <!-- Single News Block -->
            <div class="row youplay-side-news">
              <div class="col-xs-3 col-md-4">
                <a href="#!" class="angled-img">
                  <div class="img">
                    <img src="assets/images/game-kingdoms-of-amalur-reckoning-500x375.jpg" alt="">
                  </div>
                </a>
              </div>
              <div class="col-xs-9 col-md-8">
                <h4 class="ellipsis"><a href="#!" title="Kingdoms of Amalur">Kingdoms of Amalur</a></h4>
                <span class="price">$20.00</span>
              </div>
            </div>
            <!-- /Single News Block -->

            <!-- Single News Block -->
            <div class="row youplay-side-news">
              <div class="col-xs-3 col-md-4">
                <a href="#!" class="angled-img">
                  <div class="img">
                    <img src="assets/images/game-diablo-iii-500x375.jpg" alt="">
                  </div>
                </a>
              </div>
              <div class="col-xs-9 col-md-8">
                <h4 class="ellipsis"><a href="#!" title="Let's Grind Diablo III">Diablo III</a></h4>
                <span class="price">$10.00</span>
              </div>
            </div>
            <!-- /Single News Block -->
          </div>
        </div>
        <!-- /Side Popular News -->

        <!-- Instagram -->
        <div class="side-block">
          <h4 class="block-title">Instagram</h4>
          <div class="youplay-instagram row small-gap" data-instagram-user-id="2133360819"></div>
        </div>
        <!-- /Instagram -->

      </div>
      <!-- /Right Side -->

    </div>

    <!-- Related -->
    <h2 class="container">Related</h2>
    <br>
    <div class="youplay-carousel">
      <a class="angled-img" href="#!">
        <div class="img">
          <img src="assets/images/game-kingdoms-of-amalur-reckoning-500x375.jpg" alt="">
        </div>
        <div class="over-info">
          <div>
            <div>
              <h4>Kingdoms of Amalur: Reckoning</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      <a class="angled-img" href="#!">
        <div class="img">
          <img src="assets/images/game-the-witcher-500x375.jpg" alt="">
        </div>
        <div class="over-info">
          <div>
            <div>
              <h4>The Witcher: Rise of the White Wolf</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      <a class="angled-img" href="#!">
        <div class="img">
          <img src="assets/images/game-diablo-iii-500x375.jpg" alt="">
        </div>
        <div class="over-info">
          <div>
            <div>
              <h4>Diablo III: Reaper of Souls</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      <a class="angled-img" href="#!">
        <div class="img">
          <img src="assets/images/game-dragons-dogma-500x375.jpg" alt="">
        </div>
        <div class="over-info">
          <div>
            <div>
              <h4>Dragons Dogma</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <!-- /Related -->

    <!-- Footer -->
    <footer class="youplay-footer-parallax">
      <div class="wrapper" style="background-image: url('assets/images/footer-bg.jpg')">

        <!-- Social Buttons -->
        <div class="social">
          <div class="container">
            <h3>Connect socially with <strong>youplay</strong></h3>

            <div class="social-icons">
              <div class="social-icon">
                <a href="#!">
                  <i class="fa fa-facebook-square"></i>
                  <span>Like on Facebook</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="#!">
                  <i class="fa fa-twitter-square"></i>
                  <span>Follow on Twitter</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="#!">
                  <i class="fa fa-twitch"></i>
                  <span>Watch on Twitch</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="#!">
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
  <script type="text/javascript" src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>

  <!-- Hexagon Progress -->
  <script type="text/javascript" src="{{url('bower_components/HexagonProgress/jquery.hexagonprogress.min.js')}}"></script>


  <!-- Bootstrap -->
  <script type="text/javascript" src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <!-- Jarallax -->
  <script type="text/javascript" src="{{url('bower_components/jarallax/dist/jarallax.min.js')}}"></script>

  <!-- Smooth Scroll -->
  <script type="text/javascript" src="{{url('bower_components/smoothscroll-for-websites/SmoothScroll.js')}}"></script>

  <!-- Owl Carousel -->
  <script type="text/javascript" src="{{url('bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

  <!-- Magnific Popup -->
  <script type="text/javascript" src="{{url('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>

  <!-- Social Likes -->
  <script type="text/javascript" src="{{url('bower_components/social-likes/dist/social-likes.min.js')}}"></script>
  <!-- Youplay -->
  <script type="text/javascript" src="{{url('youplay/js/youplay.min.js')}}"></script>

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
