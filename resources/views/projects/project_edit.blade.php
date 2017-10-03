@extends('main.main')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url({{asset('images/bangladesh.jpg')}}); opacity: 1;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-hero-content">
					<h1 class="page-title">Edit Project</h1>
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

							{!! Form::open(array('route' => array('ingo_project.update', $project->id), 'id' => 'designation-edit-form', 'method'=>'PUT')) !!}

							<div class="form-field form-field-inline">
								<label for="ingo-title">iNGO</label>

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
									@if(isset($project->project_name))
									<input type="text" id="project-name" name="project_name" value="{{$project->project_name}}" required>
									@endif
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="district">District</label>

								<div class="field">
									<div class="ci-select">
										<select id="district" name="district[]" class="js-example-basic-single"  multiple="multiple">
											@if(isset($districts))
											@foreach($districts as $dist)
											<option value="{{$dist->id}}" selected="selected">{{$dist->name}}</option>
											@endforeach
											@endif
										</select>
									</div>
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="upazila">Upazila</label>

								<div class="field">
									<div class="ci-select">
										<select id="upazila" name="upazila[]" class="js-example-basic-single" multiple="multiple" >
											@if(isset($project_thanas))
											@foreach($project_thanas as $p_thana)
											<option value="{{$p_thana->id}}" selected="selected">{{$p_thana->name}}</option>
											@endforeach
											@endif
										</select>
									</div>
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="theme">Theme</label>

								<div class="field">
									<div  class="ci-select">
										<select id="theme" name="theme" required>
											@if(isset($project->theme))
											<option value="{{$project->theme}}">{{$project->theme}}</option>
											@endif
											<option value="Education">Education</option>
											<option value="Energy">Energy</option>
											<option value="Nutrition">Nutrition</option>
											<option value="Urban Services">Urban Services</option>
											<option value="Energy and Urban Services">Energy and Urban Services</option>
											<option value="Governence">Governence</option>
											<option value="Water,Sanitation and Hygiene">Water,Sanitation and Hygiene</option>
											<option value="Health">Health</option>
											<option value="Agriculture">Agriculture</option>
											<option value="Poverty">Poverty</option>
											<option value="Gender">Gender</option>
											<option value="Disability">Disability</option>
											<option value="Child Focused">Child Focused</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="partners">Key Partners</label>

								<div class="field">
									@if(isset($project->key_partners))
									<textarea id="partners" name="partners" cols="10" rows="10" required>{{$project->key_partners}}</textarea>
									@endif
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="project-name">Project URL(If any)</label>

								<div class="field">
									@if(isset($project->url))
									<input type="text" id="project-url" name="project_url" value="{{$project->url}}" >
									@else
									<input type="text" id="project-url" name="project_url"  >
									@endif
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label>Start Date:</label>

								<div class="field">
									@if(isset($start_date))
									<input type="text" class="form-control " name="start_date" data-date-format="dd-mm-yyyy" id="start-date" value="{{$start_date}}" required>
									@endif
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label>End Date:</label>

								<div class="field">
									@if(isset($end_date))
									<input type="text" class="form-control " name="end_date" data-date-format="dd-mm-yyyy" id="end-date" value="{{$end_date}}">
									@else
									<input type="text" class="form-control " name="end_date" data-date-format="dd-mm-yyyy" id="end-date" >
									@endif
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
@endsection

@section('script')


<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>



<script type="text/javascript">
	$( document ).ready(function() {

		$('#start-date').datepicker({
			autoclose: true

		});

		$('#end-date').datepicker({
			autoclose: true

		});


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

@endsection

