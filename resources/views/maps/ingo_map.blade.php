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
						<figure class="entry-thumb">
							<div id="map" style="width:100%;height:400px;"></div>
						</figure>

						<div class="entry-content">
							
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</main>



@endsection

@section('script')
<script src="{{asset('googleMaps/maps.js')}}"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj-2jqN80dN53Vgp4dzO2jL_NcajouIQ0&callback=initMap">
</script>

<script type="text/javascript">
 



</script>

@endsection

