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
					<label for="job-description" class="sr-only">Job Description</label>
					<input type="text" id="job-description" placeholder="Description">
				</div>

				<div class="col-lg-3 col-xs-12">
					<label for="job-location" class="sr-only">Job Location</label>
					<input type="text" id="job-location" placeholder="Location">
				</div>
				<div class="col-lg-3 col-xs-12">
					<label for="job-category" class="sr-only">Job Category</label>
					<div class="ci-select">
						<select id="job-category">
							<option value="0">Category</option>
							<option value="1">Full Time</option>
							<option value="2">Part Time</option>
							<option value="3">Internship</option>
							<option value="4">Freelance</option>
							<option value="5">Contract</option>
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-xs-12">
					<button class="btn btn-block" type="submit">Search</button>
				</div>
			</div>
		</div>
	</form>
</div>
<main class="main">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-8 col-xs-12">
				

				
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

	});


</script>
@endsection
