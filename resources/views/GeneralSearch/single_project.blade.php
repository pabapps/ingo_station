@extends('main.main')
@section('styles')



@endsection
@section('content')
<div class="page-hero">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-hero-content">
					@if(isset($project_object->project_name))
					<h1 class="page-title">{{$project_object->project_name}}</h1>
					@endif
					<div class="page-hero-details">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<main class="main main-elevated">
	<div class="container">
		<div class="row">
			<div class="col-xl-9 col-lg-8 col-xs-12">
				<div class="content-wrap">
					<article class="entry">
						<div class="entry-content">
							<h2>Theme</h2>
							<p>{{$project_object->theme}}</p>

							<h2>Key Partners</h2>
							<p>{{$project_object->key_partners}}</p>

							<h3>Districts & Upazilas</h3>
							<ul>
								<li>
									<strong>{{$district}}</strong>
								</li>
								<li>{{$thana}}</li>
							</ul>

							<h2>Project Link</h2>
							@if(isset($project_object->url))
								<a href="{{$project_object->url}}" target="_blank" class="btn btn-block"><p>{{$project_object->url}}</p></a>
							@else
								<p>No Url Provided!</p>

							@endif
							
							<h2>Start Date</h2>
							<p>{{$project_object->start_date}}</p>
						</div>
					</article>

				</div>

				<div class="content-wrap-footer">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<div class="entry-sharing">
								Share this Job:
								<a href="" class="entry-share entry-share-facebook">Facebook</a>
								<a href="" class="entry-share entry-share-twitter">Twitter</a>
								<a href="" class="entry-share entry-share-google-plus">Google+</a>
								<a href="" class="entry-share entry-share-linkedin">LinkedIn</a>
								<a href="" class="entry-share entry-share-email">Email</a>
							</div>
						</div>

						<div class="col-md-4 col-xs-12 text-right">
							<a href="#">Report this listing</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-lg-4 col-xs-12">
				<div class="sidebar">
					<aside class="widget widget_ci-apply-button-widget">
						<a href="{{ $ingo_office->web_link }}" target="_blank" class="btn btn-block">
							Visit {{$ingo_office->ingo_name}}
						</a>
					</aside>
					<aside class="widget widget_ci-company-info-widget">
						<h3 class="widget-title"></h3>

						<div class="card-info">
							
						</div>
					</aside>
					<aside class="widget widget_ci-related-items">
						<h3 class="widget-title"></h3>

						<div class="item-listing">
							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									
								</div>
							</div>

							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									
								</div>
							</div>

							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									
								</div>
							</div>

							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									
								</div>
							</div>
						</div>
					</aside>
					<aside class="widget widget_ci-callout-widget">
						<div class="callout-wrapper">
							
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</main>




@endsection

@section('script')
<script type="text/javascript">

	$( document ).ready(function() {

		console.log("testing");

	});

</script>
@endsection
