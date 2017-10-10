@extends('main.main')
@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">

@endsection
@section('content')

<div class="page-hero page-hero-lg" style="background-image: url({{asset('images/bangladesh.jpg')}}); opacity: 1;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-hero-content">
					<h2 class="page-title">
						<span class="text-theme">Search.</span> 
						
					</h2>

				</div>
			</div>
		</div>
	</div>

	<form action="/" class="form-filter">
		<div class="form-filter-header">
			<a href="#" class="form-filter-dismiss">&times;</a>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-xs-12">
					<select class="js-example-responsive" style="width: 100%" id="project-id" name="project_id">

					</select>
				</div>

				<div class="col-lg-3 col-xs-12">
					<select class="js-example-responsive" style="width: 100%" id="district-id" name="district_id">

					</select>
				</div>
				<div class="col-lg-3 col-xs-12">
					<label for="job-category" class="sr-only">Job Category</label>
					<select class="js-example-responsive" style="width: 100%" id="theme" name="theme">
						<option ></option>
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
				<div class="col-lg-3 col-xs-12">
					<button class="btn btn-block" id="search-box" type="submit">Search</button>
				</div>
			</div>
		</div>
	</form>
</div>
<main class="main">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-8 col-xs-12">

				<div class="entry-content">
					<h1>Project List</h1>

					<div id="job-manager-job-dashboard">
						<table class="job-manager-jobs" id="project-table">
							<thead>
								<tr>
									<th class="job_title" >Name</th>
									<th >iNGO</th>
									<th >Theme</th>
									<th >District</th>
									<th >Key Partners</th>
								</tr>
							</thead>

							<tbody>
								@if(isset($final_array))
								@foreach($final_array as $list)
								<tr>
									<td class="job_title">{{$list['project']->project_name}}
										<ul class="job-dashboard-actions">
											<li>
												<a href="{{URL::to('/') . '/search/project_details_by_id/'.$list['project']->id}}" class="job-dashboard-action-edit">Details</a>
											</li>
										</ul>
									</td>
									<td>{{$list['ingo']->ingo_name}}</td>
									<td>{{$list['project']->theme}}</td>
									<td>{{$list['district']}}</td>
									<td>{{$list['project']->key_partners}}</td>
									
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
</main>


</div>

@endsection

@section('script')

<script src="{{asset('js/select2.full.min.js')}}"></script>

<script type="text/javascript">
	$( document ).ready(function() {

		var table = $('#project-table').DataTable({

			"bSort" : false,
			paging: false
			
		});


		$('#project-id').select2({
			placeholder: 'Select a project',
			allowClear: true,
			ajax: {
				dataType: 'json',
				url: '{{URL::to('/')}}/search/get_project_id',
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

		$('#district-id').select2({
			placeholder: 'Select a district',
			allowClear: true,
			ajax: {
				dataType: 'json',
				url: '{{URL::to('/')}}/search/get_distict_id',
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
			allowClear: true,
		});

		$( "#search-box" ).click(function( event ) {
			event.preventDefault();

			var project_id = $("#project-id").val();
			var district_id = $("#district-id").val();
			var theme_id = $("#theme").val();

			// $("#project-table td").remove();

			

			var jqxhr = $.get("{{URL::to('/')}}/search/general_search_query", {project_id: project_id ,district_id: district_id,theme_id:theme_id }, function(final_array){

				var object = JSON.parse(final_array);

				// console.log(object);

				var trHTML = '';

				if(object.length==0){
					alert("sorry there is no data with the given parameters");
				}else{

					table.clear().draw();

					for(var i =0; i<object.length; i++){

						table.row.add( [
							object[i]['project'].project_name +'<ul class="job-dashboard-actions"><li> <a href="{{URL::to('/')}}/search/project_details_by_id/'+object[i]['project'].id+'" class="job-dashboard-action-edit">Details</a></li></ul>',
							object[i]['ingo'].ingo_name,
							object[i]['project'].theme,
							object[i]['district'],
							object[i]['project'].key_partners
							] ).draw( false );

					}

				}



			});
		});




	});


</script>
@endsection
