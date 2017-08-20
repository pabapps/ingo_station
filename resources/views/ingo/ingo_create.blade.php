<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ingo create &ndash; Specialty</title>
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
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">

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
							<h1 class="page-title">Please enter iNGO info</h1>
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

									<div class="col-xs-12">
										<div class="nav-tabs-custom">
											<ul class="nav nav-tabs">
												<li><a href="#ingo-info" data-toggle="tab">iNGO Info</a></li>
												<li class="active" ><a href="#project-list" data-toggle="tab">Project list</a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane"  id="ingo-info">
													{!! Form::open(array('route'=>'ingo.store', 'files'=>true, 'id'=>'department-form', 'class'=>'form form-submit-listing' )) !!}


													<div class="form-field form-field-inline">
														<label for="ingo-name">iNGO name</label>

														<div class="field">
															@if(isset($ingo->ingo_name))
															<input type="text" id="ingo-name" name="ingo_name" value="{{$ingo->ingo_name}}" required>
															@else
															<input type="text" id="ingo-name" name="ingo_name" required>
															@endif	
														</div>
													</div>

													<div class="form-field form-field-inline">
														<label for="address">Address
														</label>

														<div class="field">
															@if(isset($ingo->address))
															<input type="text" id="address" placeholder='E.g. "London"' name="ingo_address" value="{{$ingo->address}}" required>
															@else
															<input type="text" id="address" placeholder='E.g. "London"' name="ingo_address" required>
															@endif
														</div>
													</div>

													<div class="form-field form-field-inline">
														<label for="contact-number">Contact Number</label>

														<div class="field">
															@if(isset($ingo->contact_number))
															<input type="number" id="contact-number" name="contact_number" value="{{$ingo->contact_number}}" required >
															@else
															<input type="number" id="contact-number" name="contact_number" required >
															@endif
														</div>
													</div>

													<div class="form-field form-field-inline">
														<label for="email">Email</label>

														<div class="field">
															@if(isset($ingo->email))
															<input type="email" id="email" name="ingo_email" value="{{$ingo->email}}" required >
															@else
															<input type="email" id="email" name="ingo_email" required >
															@endif
														</div>
													</div>


													<div class="form-field form-field-inline">
														<label for="web_link">URL
															<small>(optional)</small>
														</label>


														<div class="field">
															@if(isset($ingo->web_link))
															<input type="text" id="web_link" name="web_link" value="{{$ingo->web_link}}">
															@else
															<input type="text" id="web_link" name="web_link">
															@endif
														</div>
													</div>


													<button type="submit" class="btn">Save</button>

													{!! Form::close() !!}

												</div>
												<div class="active tab-pane"  id="project-list">

													<div class="container">
														<div class="row">
															<div class="col-xs-8">
																<div class="page-hero-content">
																	<h2 class="page-title">
																		@if(isset($ingo->ingo_name))
																		<span class="text-theme">{{$ingo->ingo_name}}.</span><br> Find your projects
																		@endif

																	</h2>
																</div>
															</div>
														</div>
													</div>

													<form action="/" >
														<div class="container">
															<div class="row">
																<div class="col-lg-3 col-xs-12">
																	<label for="district" class="sr-only">Theme</label>
																	<select class="js-example-responsive" style="width: 100%" id="district" name="district">
																		
																	</select>
																	
																</div>
																<div class="col-lg-3 col-xs-12">
																	<label for="theme" class="sr-only">Theme</label>
																	
																	<select class="js-example-responsive" style="width: 100%" id="theme" name="theme">
																		
																	</select>
																	
																</div>
																<div class="col-lg-3 col-xs-12">
																	<label for="year" class="sr-only">Year</label>
																	<select class="js-example-responsive" style="width: 100%" id="year" name="year">
																		
																	</select>
																	
																</div>
																<div class="col-lg-3 col-xs-12">
																	<button class="btn btn-block" type="submit">Search</button>
																</div>
															</div>
														</div>
													</form>
													

													<div class="entry-content">
														<h1>Project List</h1>

														<div id="job-manager-job-dashboard">
															<table class="job-manager-jobs">
																<thead>
																	<tr>
																		<th class="job_title" >Name</th>
																		<th >Theme</th>
																		<th >District</th>
																		<th >Upazila</th>
																		<th >Starting Year</th>
																	</tr>
																</thead>

																<tbody>
																	@if(isset($project_list))
																	@foreach($project_list as $list)
																	<tr>
																		<td class="job_title">{{$list->project_name}}
																		<ul class="job-dashboard-actions">
																			<li>
																				<a href="#" class="job-dashboard-action-edit">Edit</a>
																			</li>
																			<li>
																				<a href="#" class="job-dashboard-action-delete">Delete</a>
																			</li>
																		</ul>
																		</td>
																		<td>{{$list->theme}}</td>
																		<td>{{$list->district_id}}</td>
																		<td>{{$list->upozilla_id}}</td>
																		<td>{{$list->start_date}}</td>
																	</tr>
																	@endforeach
																	@endif
																</tbody>
															</table>
														</div>
													</div>
												</div>
												
											</div>

										</div>
									</div>
								</div>	
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
		<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/scripts.js')}}"></script>
		<script src="{{asset('js/select2.full.min.js')}}"></script>

	</body>
	</html>
	<script type="text/javascript">
	$( document ).ready(function() {


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

		$('#theme').select2({
			placeholder: 'Select an option',
			ajax: {
				dataType: 'json',
				url: '{{URL::to('/')}}/get_project_themes',
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


		


	});




	</script>



