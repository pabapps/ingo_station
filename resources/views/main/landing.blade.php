<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Landing Page</title>
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
										<a href="index.html">Home</a>
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
									<li class="menu-item-btn">
										<a href="{{ url('/login') }}">Login</a>
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
		<div class="page-hero page-hero-xl page-hero-center page-hero-parallax" style="background-image: url({{asset('images/bangladesh.jpg')}}); opacity: 1;">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="page-hero-content">
							<h1 class="page-title">
								<span class="text-theme">Welcome</span> TO iNGO FORUM Bangladesh
							</h1>
							<p class="page-subtitle">
								<span class="text-theme"></span> 
							</p>

							<a href="index.html" class="btn btn-lg">Search projects</a>
						</div>
					</div>
				</div>
			</div>

			<div class="section-shape section-shape-bottom section-shape-bg-color">
				<svg style="height: 40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
					<path class="section-shape-fill" d="M761.9,44.1L643.1,27.2L333.8,98L0,3.8V0l1000,0v3.9"></path>
				</svg>
			</div>
		</div>

		<section class="widget-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<div class="item text-center">
							<span class="item-icon">
								<i class="fa fa-sliders"></i>
							</span>

							<p class="item-title">iNGO FORUM SUMMARY</p>

							<p>The INGO Forum Bangladesh aims to influence and increase the effectiveness and coherence of humanitarian relief and development aid in Bangladesh. It does this by exploring opportunities to develop and strengthen policy and best practice through coordinated information sharing, facilitated dialogue and constructive engagement with national and international decision-makers involved in humanitarian and development activities, in doing so it supports an enabling environment for INGOs to better fulfil their mandates.</p>
						</div>
					</div>

					<div class="col-md-4 col-xs-12">
						<div class="item text-center">
							<span class="item-icon">
								<i class="fa fa-tablet"></i>
							</span>

							<p class="item-title">Who are We:</p>

							<p>International organisations have a long chequered history in Bangladesh and INGOs have been working in multiple ways in all sectors requiring development assistance including health, education, disaster risk reduction, good governance, poverty alleviation, social inclusion etc. However, with many structural barriers still inherent (such as inefficiency, corruption, lack of transparency, accountability and poor law and order conditions), there is a vital role for INGOs to play in bringing about sustained (positive) change.</p>
						</div>
					</div>

					<div class="col-md-4 col-xs-12">
						<div class="item text-center">
							<span class="item-icon">
								<i class="fa fa-life-saver"></i>
							</span>

							<p class="item-title">Goal</p>

							<p>The INGO Forum aims to influence and increase the effectiveness and coherence of humanitarian relief and development aid in Bangladesh. It does this by exploring opportunities to develop and strengthen policy and best practice through coordinated information sharing, facilitated dialogue and constructive engagement with national and international decision-makers involved in humanitarian and development activities, in doing so it supports an enabling environment for INGOs to better fulfil their mandates.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="owl-carousel owl-theme">
			<div class="item"><img src="{{asset('images/carousel/bbc.jpg')}}" alt="" style=""></div>
			<div class="item"><img src="{{asset('images/carousel/care.png')}}" alt="" style=""></div>
			<div class="item"><img src="{{asset('images/carousel/PA.png')}}" alt="" style=""></div>
			<div class="item"><img src="{{asset('images/carousel/concern.png')}}" alt="" style=""></div>
			<div class="item"><img src="{{asset('images/carousel/download.png')}}" alt="" style=""></div>
			
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
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('js/jquery.mmenu.min.all.js')}}"></script>
		<script src="{{asset('js/jquery.fitvids.js')}}"></script>
		<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
		<script src="{{asset('js/jquery.matchHeight.js')}}"></script>
		<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
		<script src="{{asset('js/scripts.js')}}"></script>
		<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	</body>
	</html>

	<script type="text/javascript">
	$( document ).ready(function() {




		$('.owl-carousel').owlCarousel({
			rtl:false,
			loop:true,
			margin:10,
			nav:true,
			autoHeight:true,
			autoplay:true,
			autoplayTimeout:1000,
			autoplayHoverPause:false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:5
				}
			}
		})

		console.log("testing");
		


	});




	</script>



