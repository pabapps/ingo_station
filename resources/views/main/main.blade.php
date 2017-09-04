<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ingo</title>
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
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
	@yield('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/owl.theme.green.min.css')}}" />

	

	<link rel="shortcut icon" href="#">
	<link rel="apple-touch-icon" href="#">
	<link rel="apple-touch-icon" sizes="72x72" href="#">
	<link rel="apple-touch-icon" sizes="114x114" href="#">

	<style>
		.page-hero::before {
			content: "";
			background-color: rgba(47, 48, 67, 0.40);
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
		}
	</style>

</head>
<body>

	<div id="page">
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="mast-head">
							<h1 class="site-logo">
								
							</h1>
							<nav class="nav">
								<ul class="navigation-main">
									<li class="menu-item-home current-menu-item">
										<a href="{{URL::to('/').'/'}}">Home</a>
									</li>
									<li>
										<a href="landing.html">Landing Page</a>
									</li>
									<li class="menu-item-has-children">
										<a href="blog.html">iNGO</a>
										<ul class="sub-menu">
											<li>
												<a href="{{URL::to('/').'/ingo/create'}}">Ingo</a>
											</li>
											<li>
												<a href="{{URL::to('/').'/ingo_project/create'}}">Create Project</a>
											</li>
											<li>
												<a href="index-left-sidebar.html">Job Listing Left</a>
											</li>
											<li>
												<a href="blog.html">Blog</a>
											</li>
											<li>
												<a href="dashboard.html">Job Dashboard</a>
											</li>
										</ul>
									</li>
									<li class="menu-item-has-children">
										<a href="#">Contacts</a>
										<ul class="sub-menu">
											<li>
												<a href="single.html">Single Article</a>
											</li>
											<li>
												<a href="single-job.html">Single Job</a>
											</li>
											<li>
												<a href="page.html">Page Default</a>
											</li>
											<li>
												<a href="page-centered.html">Page Centered</a>
											</li>
											<li>
												<a href="page-fullwidth.html">Page Fullwidth</a>
											</li>
											<li>
												<a href="submit.html">Submit</a>
											</li>
											<li>
												<a href="buttons.html">Button Styles</a>
											</li>
										</ul>
									</li>
									<li class="menu-item-has-children">
										<a href="#">Members</a>
										<ul class="sub-menu">
											<li>
												<a href="#">Submenu Item I</a>
											</li>
											<li class="menu-item-has-children">
												<a href="#">Submenu Item II</a>
												<ul class="sub-menu">
													<li>
														<a href="#">Third Level Menu Item</a>
													</li>
													<li>
														<a href="#">Menu Item</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									@if(Auth::user())

									<li class="menu-item-btn">
										<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										Logout
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
								
								@else
								<li class="menu-item-btn">
									<a href="{{ url('/login') }}">Login</a>
								</li>
								<li class="menu-item-btn">
									<a href="{{ url('/register') }}">Register</a>
								</li>
								@endif
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
	@yield('content')	

	<script src="{{asset('js/jquery-1.12.3.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/jquery.mmenu.min.all.js')}}"></script>
	<script src="{{asset('js/jquery.fitvids.js')}}"></script>
	<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
	<script src="{{asset('js/jquery.matchHeight.js')}}"></script>
	<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('js/scripts.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	@yield('script')
</body>
</html>
