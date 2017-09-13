@extends('main.main')
@section('styles')

@endsection

@section('content')

<div class="page-hero" style="background-image: url({{asset('images/bangladesh.jpg')}}); opacity: 1;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-hero-content">
					<h1 class="page-title">Maps</h1>
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
						<iframe src="{{asset('images/map/country.svg')}}" width="1000" height="1000">
						</iframe>

						<div class="entry-content">
							<div class="container">
								<div class="row">
									<div class="col-lg-3 col-xs-12">
										<ul class="map-project">
											@foreach($all_projects as $project)

											<li>
												<a href="#"> <span class="t"><strong>{{$project->project_name}}</strong></span>
													<span hidden class="id">{{$project->id}}</span>
												</a>
											</li>

											@endforeach
										</ul>
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




@endsection

@section('script')

{{-- <script src="{{asset('googleMaps/maps.js')}}"></script> --}}
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj-2jqN80dN53Vgp4dzO2jL_NcajouIQ0">


</script>


<script type="text/javascript">

	$(document).ready(function() 
	{
		

	});

</script>

@endsection

