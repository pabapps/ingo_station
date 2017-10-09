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
								<label for="ingo-title">iNGO</label>

								<div class="field">
									@if(isset($ingo_office))
									<input type="text" id="ingo-title" value="{{$ingo_office->ingo_name}}" name="ingo_title" readonly required>
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
										<select id="district" name="district[]" class="js-example-basic-single"  multiple="multiple" required>
										</select>
									</div>
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="upazila">Upazila</label>

								<div class="field">
									<div class="ci-select">
										<select id="upazila" name="upazila[]" class="js-example-basic-single" multiple="multiple" required >
										</select>
									</div>
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="theme">Theme</label>

								<div class="field">
									<div  class="ci-select">
										<select id="theme" name="theme" multiple="multiple" required>
											<option value="Education">Education</option>
											<option value="Disaster Risk Reduction">Disaster Risk Reduction</option>
											<option value="Energy">Energy</option>
											<option value="Nutrition">Nutrition</option>
											<option value="Urban Services">Urban Services</option>
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
									<textarea id="partners" name="partners" cols="10" rows="10" required></textarea>
								</div>
							</div>

							<div class="form-field form-field-inline">
								<label for="project-name">Project URL(If any)</label>

								<div class="field">
									<input type="text" id="project-url" name="project_url" >
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

		$("#start-date").datepicker('setDate', new Date());



		$('#theme').select2({
			
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

