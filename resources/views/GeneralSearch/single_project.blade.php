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
						<h3 class="widget-title">Company Information</h3>

						<div class="card-info">
							<div class="card-info-media">
								<figure class="card-info-thumb">
									<img src="https://placehold.it/66x66" alt="">
								</figure>

								<div class="card-info-details">
									<p class="card-info-title">Google Inc.</p>
									<p class="card-info-link">
										<a href="">https://www.google.com</a>
									</p>

									<div class="card-info-socials">
										<a href="">
											<i class="fa fa-facebook"></i>
										</a>
										<a href="">
											<i class="fa fa-twitter"></i>
										</a>
										<a href="">
											<i class="fa fa-linkedin"></i>
										</a>
										<a href="">
											<i class="fa fa-google-plus"></i>
										</a>
									</div>
								</div>
							</div>

							<div class="card-info-description">
								<p>There’s a lot of opportunity here to work on a wide range of very challenging projects and to grow quickly.</p>
							</div>
						</div>
					</aside>
					<aside class="widget widget_ci-related-items">
						<h3 class="widget-title">Related Jobs</h3>

						<div class="item-listing">
							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									<p class="list-item-title">
										<a href="single-job.html">Lion Tamer</a>
									</p>

									<div class="list-item-meta">
										<a href="" class="list-item-tag item-badge" style="background-color: #0071c2;">Full Time</a>
										<span class="list-item-company">Amazing Circus</span>
									</div>
								</div>
							</div>

							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									<p class="list-item-title">
										<a href="single-job.html">User Experience Designer</a>
									</p>

									<div class="list-item-meta">
										<a href="" class="list-item-tag item-badge" style="backgroud-color: #ec1a5b;">Freelance</a>
										<span class="list-item-company">McIntire Solutions, LLC</span>
									</div>
								</div>
							</div>

							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									<p class="list-item-title">
										<a href="single-job.html">Software Tester</a>
									</p>

									<div class="list-item-meta">
										<a href="#" class="list-item-tag item-badge" style="background-color: #1fbbb4;">Contract</a>
										<span class="list-item-company">McIntire Solutions, LLC</span>
									</div>
								</div>
							</div>

							<div class="list-item list-item-sm">
								<div class="list-item-main-info">
									<p class="list-item-title">
										<a href="single-job.html">Senior Software Engineer</a>
									</p>

									<div class="list-item-meta">
										<a href="" class="list-item-tag item-badge" style="background-color: #f26d46;">Part Time</a>
										<span class="list-item-company">Google, Inc.</span>
									</div>
								</div>
							</div>
						</div>
					</aside>
					<aside class="widget widget_ci-callout-widget">
						<div class="callout-wrapper">
							<img class="callout-thumb" src="images/logo-dark.png" alt="">

							<p>
								<strong>Find the right pros for your business. Post a new job today</strong>
							</p>

							<p class="text-secondary">From just
								<strong>$199</strong> for
								<strong>60 days</strong>
							</p>

							<a href="" class="btn btn-round btn-transparent">Post a new job</a>
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
