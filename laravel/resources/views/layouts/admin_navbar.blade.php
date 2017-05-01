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
                <img src="../images/logo.png" alt="">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Store <span class="caret"></span> <span class="label">settings</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{url('/general_settings')}}">General Settings</a>
                            </li>
                            <li><a href="{{url('/popular_products')}}">Popular Products</a>
                            </li>
                            <li><a href="{{url('/featured_products')}}">Features Products</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Products <span class="caret"></span> <span class="label">Manage Products</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{url('/add_products')}}">Add Products</a>
                            </li>
                            <li><a href="{{url('/category')}}">View Categories</a>
                            </li>
                            <li><a href="{{url('/manage_products')}}">Manage Products</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        PreOrders  <span class="caret"></span> <span class="label">Manage PreOrders</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{url('/add_preorder')}}">Add Preorder</a>
                            </li>
                            <li><a href="{{url('/manage_preorder')}}">Manage PreOrders</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Blog  <span class="caret"></span> <span class="label">Manage Blog Stuff</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{url('/add_blog_new')}}">Add News</a>
                            </li>
                            <li><a href="{{url('/add_blog_giveaway')}}">Add Giveaways</a>
                            </li>
                            <li><a href="#">Add Announcements</a></li>
                            <li><a href="#">Manage Posts</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Other Settings <span class="caret"></span> <span class="label">Other Stuff to Set Up</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li class="dropdown dropdown-submenu pull-left ">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Partnership Program</a>
                                <div class="dropdown-menu">
                                    <ul role="menu">
                                        <li><a href="user-activity.html">Manage Partners</a>
                                        </li>
                                        <li><a href="#">Partner Settings</a></li>
                                        <li><a href="#">NewsLetter Partners</a></li>
                                        <li><a href="#">Reward Program</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown dropdown-submenu pull-left ">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Events</a>
                                <div class="dropdown-menu">
                                    <ul role="menu">
                                        <li><a href="user-activity.html">Manage Events</a>
                                        </li>
                                        <li><a href="#">Manage Tournaments</a></li>
                                        <li><a href="#">Manage Competitions</a></li>
                                        <li><a href="#">Events Ideas</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="forums.html">About Us</a>
                            </li>
                            <li><a href="#">About Events</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('/adminPanel')}}">Admin Panel</a></li>
                    <li class="dropdown dropdown-hover">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{Auth::user()->name}} <span class="badge bg-default">2</span> <span class="caret"></span> <span class="label">it is you</span>
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

                                <li><a href="login.html">Log Out</a>
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
            </ul>
        </div>
    </div>
</nav>
<!-- /Navbar -->
