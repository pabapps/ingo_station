@extends('main.main')
@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">

@endsection
@section('content')

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
															<select class="js-example-responsive" style="width: 100%" id="district" name="district">

															</select>

														</div>
														<div class="col-lg-3 col-xs-12">

															<select class="js-example-responsive" style="width: 100%" id="theme" name="theme">
																<option ></option>
																<option value="Education">Education</option>
																<option value="Disaster Risk Reduction">Disaster Risk Reduction</option>
																<option value="Energy and Urban Services">Energy and Urban Services</option>
																<option value="Governence">Governence</option>
																<option value="Water,Sanitation and Hygiene">Water,Sanitation and Hygiene</option>
																<option value="Health">Health</option>
																<option value="Agriculture">Agriculture</option>
																<option value="Poverty">Poverty</option>
																<option value="Gender">Gender</option>
																<option value="Disability and Child Rights">Disability and Child Rights</option>

															</select>

														</div>
														<div class="col-lg-3 col-xs-12">
															<button class="btn btn-block" id="search-box" type="submit">Search</button>
														</div>
													</div>
												</div>
											</form>


											<div class="entry-content">
												<h1>Project List</h1>

												<div id="job-manager-job-dashboard">
													<table class="job-manager-jobs" id="project-table">
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
															@if(isset($final_array))
															@foreach($final_array as $list)
															<tr>
																<td class="job_title">{{$list['project']->project_name}}
																	<ul class="job-dashboard-actions">
																		<li>
																			<a href="#" class="job-dashboard-action-edit">Edit</a>
																		</li>
																		<li>
																			<a href="#" class="job-dashboard-action-delete">Delete</a>
																		</li>
																	</ul>
																</td>
																<td>{{$list['project']->theme}}</td>
																<td>{{$list['district']}}</td>
																<td>{{$list['thana']}}</td>
																<td>{{$list['project']->start_date}}</td>
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

@endsection

@section('script')

<script src="{{asset('js/select2.full.min.js')}}"></script>

<script type="text/javascript">
	$( document ).ready(function() {


		$('#district').select2({
			placeholder: 'Select a district',
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
		});


		$( "#search-box" ).click(function( event ) {
			event.preventDefault();

			// console.log("working on it");

			$("#project-table td").remove();

			var district_id = $("#district").val();

			var theme_id = $("#theme").val();

			console.log(theme_id.length);

			/**
			 * checking if the district_id and theme_id is not null,
			 * if null search function will not work
			 */

			 if(district_id!= null && theme_id.length==0){
			 	var jqxhr = $.get( "{{URL::to('/')}}/ingo_project/get_project_by_district", { district_id: district_id },
			 		function(final_array) {

			 			console.log("testing");

			 			//need to type the remaining code
			 			var object = JSON.parse(final_array);

			 			var trHTML = '';

			 			for (var i = 0; i < object.length; i++) { 

			 				trHTML += '<tr><td>' + object[i]['project'].project_name +'<ul class="job-dashboard-actions"><li> <a href="#" class="job-dashboard-action-edit">Edit</a></li> <li> <a href="#" class="job-dashboard-action-delete">Delete</a> </li> </ul>  </td><td>' + object[i]['project'].theme + '</td><td>' + object[i]['district']+'</td><td>'+object[i]['thana']+'</td><td>'+object[i]['project'].start_date+'</td></tr>';
			 			}

			 			$('#project-table').append(trHTML);

			 		});


			 }else if(theme_id.length>0 && district_id===null){

			 	var jqxhr = $.get("{{URL::to('/')}}/ingo_project/get_project_by_theme", {theme:theme_id}, function(final_array){

			 		var object = JSON.parse(final_array);

			 		var trHTML = '';

			 		for (var i = 0; i < object.length; i++) { 

			 			trHTML += '<tr><td>' + object[i]['project'].project_name +'<ul class="job-dashboard-actions"><li> <a href="#" class="job-dashboard-action-edit">Edit</a></li> <li> <a href="#" class="job-dashboard-action-delete">Delete</a> </li> </ul>  </td><td>' + object[i]['project'].theme + '</td><td>' + object[i]['district']+'</td><td>'+object[i]['thana']+'</td><td>'+object[i]['project'].start_date+'</td></tr>';
			 		}

			 		$('#project-table').append(trHTML);

			 	});


			 }else if(theme_id.length>0  && district_id!=null){

			 	var jqxhr = $.get("{{URL::to('/')}}/ingo_project/get_project_by_district_theme", {district_id: district_id,theme:theme_id}, function(final_array){

			 		var object = JSON.parse(final_array);

			 		var trHTML = '';

			 		for (var i = 0; i < object.length; i++) { 

			 			trHTML += '<tr><td>' + object[i]['project'].project_name +'<ul class="job-dashboard-actions"><li> <a href="#" class="job-dashboard-action-edit">Edit</a></li> <li> <a href="#" class="job-dashboard-action-delete">Delete</a> </li> </ul>  </td><td>' + object[i]['project'].theme + '</td><td>' + object[i]['district']+'</td><td>'+object[i]['thana']+'</td><td>'+object[i]['project'].start_date+'</td></tr>';
			 		}

			 		$('#project-table').append(trHTML);

			 	});

			 }else{
			 	alert("please select one of the options from the dropdown");
			 }



			});


		


	});


</script>
@endsection
