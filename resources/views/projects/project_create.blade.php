<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project Create</title>
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
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/datepicker/datepicker3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">

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
							<h1 class="site-logo">
								<a href="index.html">
									<img src="images/logo-light.png" alt="">
								</a>
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
										<a href="blog.html">Listings</a>
										<ul class="sub-menu">
											<li>
												<a href="index.html">Job Listing</a>
											</li>
											<li>
												<a href="index-fullwidth.html">Job Listing Full</a>
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
										<a href="#">Templates</a>
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
										<a href="#">Menu Item</a>
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
										<a href="auth.html">Sign Up</a>
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
					<div class="col-xs-12">
						<div class="page-hero-content">
							<h1 class="page-title">Create Project</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<main class="main main-elevated">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="content-wrap">
							<article class="entry">
								<div class="entry-content">

									{!! Form::open(array('route'=>'ingo_project.store', 'files'=>true, 'id'=>'project', 'class'=>'form form-submit-listing' )) !!}

									
									<div class="form-field form-field-inline">
										<label for="ingo-title">Ingo</label>

										<div class="field">
											@if(isset($ingo_office))
											<input type="text" id="ingo-title" value="{{$ingo_office->ingo_name}}" name="ingo_title" readonly>
											@endif
										</div>

										<div hidden>
											@if(isset($ingo_office))
											<input type="text" id="ingo-id" value="{{$ingo_office->id}}" name="ingo_id" readonly>
											@endif
										</div>
									</div>



									<div class="form-field form-field-inline">
										<label for="project-name">Project Name</label>

										<div class="field">
											<input type="text" id="project-name" name="project_name" required>
										</div>
									</div>

									<div class="form-field form-field-inline">
										<label for="district">District</label>

										<div class="field">
											<div class="ci-select">
												<select id="district" name="district[]" class="js-example-basic-single"  multiple="multiple">
												</select>
											</div>
										</div>
									</div>

									<div class="form-field form-field-inline">
										<label for="upazila">Upazila</label>

										<div class="field">
											<div class="ci-select">
												<select id="upazila" name="upazila[]" class="js-example-basic-single" multiple="multiple" >
												</select>
											</div>
										</div>
									</div>

									<div class="form-field form-field-inline">
										<label for="theme">Theme</label>

										<div class="field">
											<input type="text" id="theme" name="theme" required>
										</div>
									</div>

									<div class="form-field form-field-inline">
										<label for="partners">Key Partners</label>

										<div class="field">
											<textarea id="partners" name="partners" cols="10" rows="10" required></textarea>
										</div>
									</div>

									<div class="form-field form-field-inline">
										<label>Start Date:</label>

										<div class="field">
											<input type="text" class="form-control " name="start_date" data-date-format="dd-mm-yyyy" id="start-date" required>
										</div>
									</div>

									<div class="form-field form-field-inline">
										<label>End Date:</label>

										<div class="field">
											<input type="text" class="form-control " name="end_date" data-date-format="dd-mm-yyyy" id="end-date" >
										</div>
									</div>
										
									


									<button type="submit" class="btn">Save</button>
									
								</div>
								{!! Form::close() !!}
							</article>
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
		<script src="{{asset('js/select2.full.min.js')}}"></script>
		<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
		<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

	</body>
	</html>

	<script type="text/javascript">
	$( document ).ready(function() {

		$('#start-date').datepicker({
			autoclose: true

		});

		$('#end-date').datepicker({
			autoclose: true

		});

		$("#start-date").datepicker('setDate', new Date());



		$('#district').select2({
			placeholder: 'Select an option',
			ajax: {
				dataType: 'json',
				url: '{{URL::to('/')}}/get_disticts',
				delay: 250,
				data: function(params) {
					return {
						term: params.term
					}
				},
				processResults: function (data, params) {
					params.page = params.page || 1;
					return {
						results: data
					};
				},
			}
		});


		$( "#district" ).change(function() {

			var district_id = $("#district").val();

			$('#upazila').select2({
				placeholder: 'Select an option',
				ajax: {
					dataType: 'json',
					url: '{{URL::to('/')}}/get_upazila',
					delay: 250,
					data: function(params) {
						return {
							term: params.term,
							district: district_id
						}
					},
					processResults: function (data, params) {
						params.page = params.page || 1;
						return {
							results: data
						};
					},
				}
			});
			
		});


	});




</script>

