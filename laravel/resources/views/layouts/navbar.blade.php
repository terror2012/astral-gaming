<!-- Navbar -->
<nav class="navbar-youplay navbar navbar-default navbar-fixed-top ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{url('images/logo.png')}}" alt="">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Store <span class="caret"></span> <span class="label">games</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{url('/store')}}">Browse Store</a>
                            </li>
                            <li><a href="{{url('/cart')}}">Cart</a>
                            </li>
                            <li><a href="{{url('/preorders')}}">Pre-Orders</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Blog <span class="caret"></span> <span class="label">news</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{url('/news')}}">News</a>
                            </li>
                            <li><a href="{{url('/giveaways')}}">Giveaways</a>
                            </li>
                            <li><a href="{{url('/announcements')}}">Announcements</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Events <span class="caret"></span> <span class="label">All eveniments</span>
                    </a>
                    <div class="dropdown-menu">
                <ul class="menu">
                            <li><a href="{{url('/tournaments')}}">Tournaments</a>
                            </li>
                            <li><a href="{{url('/events')}}">Events</a>
                            </li>
                            <li><a href="{{url('/competitions')}}">Competitions</a>
                            </li>
                            <li><a href="{{url('/coming-soon')}}">Coming Soon</a>
                            </li>
                    </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Info <span class="caret"></span> <span class="label">All info about website</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul class="menu">
                            <li><a href="{{url('/about_us')}}">About Us</a>
                            </li>
                            <li><a href="{{url('/about_events')}}">About Events</a>
                            </li>
                            <li class="dropdown dropdown-submenu pull-left">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Partnerships</a>
                                <div class="dropdown-menu">
                                    <ul role="menu">
                                        <li><a href="{{url('/twitch_partnership')}}">Twitch Partnership</a>
                                        </li>
                                        <li><a href="{{url('/youtube_partnership')}}">Youtube Partnership</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login') && Auth::check() && $rank == "1" )
                    <li><a href="{{url('/admin')}}">Admin Panel</a></li>
                @elseif (Route::has('login') && Auth::check() && $rank == "2")
                    <li><a href="{{url('/moderator')}}">Moderator Panel</a></li>
                @endif
                @if (Route::has('login') && Auth::check())
                    <li class="dropdown dropdown-hover">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{$name}} <span class="badge bg-default">2</span> <span class="caret"></span> <span class="label">it is you</span>
                        </a>
                        <div class="dropdown-menu">
                            <ul role="menu">
                                <li><a href="../documentation">Documentation</a>
                                </li>
                                <li><a href="http://themeforest.net/item/youplay-game-template-based-on-bootstrap/11306207?ref=_nK">Purchase</a>
                                </li>
                                <li class="divider"></li>

                                <li><a href="user-profile.html">Profile <span class="badge pull-right bg-warning">13</span></a>
                                </li>
                                <li><a href="cart.html">My Cart <span class="badge pull-right bg-default">3</span></a>
                                </li>
                                <li class="divider"></li>

                                <li><a href="{{url('/user_logout')}}">Log Out</a>
                                </li>
                                <li class="dropdown dropdown-submenu pull-left">
                                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More..</a>
                                    <div class="dropdown-menu">
                                        <ul role="menu">
                                            <li><a href="#!">3rd level</a>
                                            </li>
                                            <li><a href="#!">3rd level</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                @elseif (Route::has('login') && Auth::guest())
                    <li>
                        <a href="{{url('/login')}}">Login</a>
                    </li>
                    <li>
                        <a href="{{url('/register')}}">Register</a>
                    </li>
                @endif
                <li class="dropdown dropdown-hover dropdown-cart">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <div class="dropdown-menu" style="width: 300px;">
                        <div class="row youplay-side-news">
                            <div class="col-xs-3 col-md-4">
                                <a href="#" class="angled-img">
                                    <div class="img">

                                        <img src="images/game-bloodborne-500x375.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-9 col-md-8">
                                <a href="#" style="text-decoration: none;" class="pull-right mr-10"><i class="fa fa-times"></i></a>

                                <h4 class="ellipsis"><a href="#">Bloodborne</a></h4>
                                <span class="quantity">1 × <span class="amount">$50.00</span></span>
                            </div>
                        </div>

                        <div class="row youplay-side-news">
                            <div class="col-xs-3 col-md-4">
                                <a href="#" class="angled-img">
                                    <div class="img">

                                        <img src="images/game-kingdoms-of-amalur-reckoning-500x375.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-9 col-md-8">
                                <a href="#" style="text-decoration: none;" class="pull-right mr-10"><i class="fa fa-times"></i></a>

                                <h4 class="ellipsis"><a href="#">Kingdoms of Amalur</a></h4>
                                <span class="quantity">1 × <span class="amount">$20.00</span></span>
                            </div>
                        </div>

                        <div class="ml-20 mr-20 pull-right"><strong>Subtotal:</strong>  <span class="amount">$70.00</span>
                        </div>

                        <div class="btn-group pull-right m-15">
                            <a href="#" class="btn btn-default btn-sm">View Cart</a>
                            <a href="#" class="btn btn-default btn-sm">Checkout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navbar -->
