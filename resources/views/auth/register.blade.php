<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register &ndash; Specialty</title>
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
                            
                            <nav class="nav" style="background-color: #333;
                            overflow: hidden;">
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
                                    <a href="{{ url('/login') }}">Login</a>
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
    <div class="page-hero">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-xs-12">
                    <div class="page-hero-content">
                        <h1 class="page-title">Register Account</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="main main-elevated">
        <div class="container">
            <div class="row">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <div class="box-message box-message-success">
                        <div class="box-message-content">
                            <p>{{ Session::get('alert-' . $msg) }}</p>
                        </div>
                    </div>

                    @endif
                    @endforeach

                </div>
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-xs-12">
                    <div class="content-wrap">

                        {!! Form::open(array('url' => '/register', 'id' => 'register-form')) !!}



                        <div class="row">

                            <div class="col-lg-12 col-xs-12">
                                <form action="/" class="form-register">
                                    <h3>Register</h3>

                                    <div class="form-field">
                                        <label for="email-register">Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter User Name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="form-field">
                                        <label for="username-register">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email address" required>
                                    </div>

                                    <div class="form-field">
                                        <label for="password-register">Password</label>
                                        <input type="password" id="password" name="password"placeholder="Enter password" required>
                                    </div>

                                    <div class="form-field">
                                        <label for="password-register">Confirm Password</label>
                                        <input type="password" id="password_confirm" name="password_confirmation"placeholder="please enter your password again" required>
                                    </div>

                                    <div class="form-field">
                                        <button button type="submit" class="btn">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="form-group">
     @if (count($errors) > 0)
     <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <aside class="widget widget_text group">
                            <h3 class="widget-title">Text Widget</h3>
                            <p>Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis
                            aliquet egestas purus.</p>
                        </aside>
                        <!-- /widget -->
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <aside class="widget widget_categories group">
                            <h3 class="widget-title">Widget Title</h3>
                            <ul>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                                <li>
                                    <a href="#">History</a>
                                </li>
                                <li>
                                    <a href="#">Disclaimer</a>
                                </li>
                            </ul>
                        </aside>
                        <!-- /widget -->
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <aside class="widget widget_categories group">
                            <h3 class="widget-title">Widget Title</h3>
                            <ul>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                                <li>
                                    <a href="#">History</a>
                                </li>
                                <li>
                                    <a href="#">Disclaimer</a>
                                </li>
                            </ul>
                        </aside>
                        <!-- /widget -->
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <!-- For a list of all supported social icons please see: http://fontawesome.io/icons/#brand -->

                        <aside class="widget widget_ci_social_widget ci-socials group">
                            <h3 class="widget-title">Socials</h3>

                            <ul class="list-social-icons">
                                <li>
                                    <a class="social-icon" href="#">
                                        <i class="fa fa-rss"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="social-icon" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="social-icon" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="social-icon" href="#">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="social-icon" href="#">
                                        <i class="fa fa-vimeo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="social-icon" href="#">
                                        <i class="fa fa-medium"></i>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>

                <div class="footer-copy">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <p>
                                <a href="">Specialty</a> &ndash; Job Board Template by
                                <a href="https://www.cssigniter.com/ignite" target="_blank">CSSIgniter</a>
                            </p>
                        </div>

                        <div class="col-sm-6 col-xs-12 text-right">
                            <p>Powered by
                                <a href="https://www.cssigniter.com/ignite" target="_blank">CSSIgniter</a>
                            </p>
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