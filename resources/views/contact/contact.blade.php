<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login / Register</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mmenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/magnific.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">

    <link rel="shortcut icon" href="#">
    <link rel="apple-touch-icon" href="#">
    <link rel="apple-touch-icon" sizes="72x72" href="#">
    <link rel="apple-touch-icon" sizes="114x114" href="#">
</head>
<body>

    <div id="page">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mast-head">
                           
                            <nav class="nav" >
                                <ul class="navigation-main">
                                    <li class="menu-item-home current-menu-item">
                                        <a href="{{URL::to('/').'/'}}">Home</a>
                                    </li>
                                    <li class="menu-item-home current-menu-item">
                                        <a href="{{ url('/info_maps') }}">Map</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{URL::to('/').'/ingo/create'}}">iNGO</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{URL::to('/').'/ingo/create'}}">Ingo</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('/').'/ingo_project/create'}}">Create Project</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-btn">
                                        <a href="{{ url('/register') }}">Register</a>
                                    </li>

                                </ul>
                                <!-- #navigation -->

                                <a href="#mobilemenu" class="mobile-nav-trigger">
                                    <i class="fa fa-navicon"></i> Menu
                                </a>
                            </nav>
                            <!-- #nav -->

                            <div id="mobilemenu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
        <div class="page-hero page-hero-xl" style="background-image: url({{asset('images/pics/p14_jute.jpg')}}); opacity: 1;>
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-xs-12">
                        <div class="page-hero-content">
                            <h1 class="page-title">Login </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

        <main class="main main-elevated">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-xs-12">
                        <div class="content-wrap">
                            {!! Form::open(array('url' => 'login', 'id' => 'login-form')) !!}

                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    
                                        <h3>Login</h3>

                                        <div class="form-field">
                                            <label for="username-login">Email</label>
                                            <input type="email" name="email" required>
                                        </div>

                                        <div class="form-field">
                                            <label for="username-password">Password</label>
                                            <input type="password" name="password" required>
                                        </div>

                                        <div class="form-field">
                                            <label>
                                                <input type="checkbox" /> Remember me
                                            </label>
                                        </div>

                                        <div class="form-field">
                                            <button type="submit" class="btn">Login</button>
                                        </div>
                                  

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <aside class="widget widget_text group">
                                    <h3 class="widget-title"></h3>
                                    <p></p>
                                </aside>
                                <!-- /widget -->
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">

                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">

                                <!-- /widget -->
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <!-- For a list of all supported social icons please see: http://fontawesome.io/icons/#brand -->


                            </div>
                        </div>

                        <div class="footer-copy">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <p>
                                        
                                    </p>
                                </div>

                                <div class="col-sm-6 col-xs-12 text-right">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- #page -->

    <script src="{{asset('js/jquery-1.12.3.min.js')}}"></script>
    <script src="{{asset('js/jquery.mmenu.min.all.js')}}"></script>
    <script src="{{asset('js/jquery.fitvids.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('js/jquery.matchHeight.js')}}"></script>
    <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>

</body>
</html>

<script type="text/javascript">
    $( document ).ready(function() {






    });




</script>