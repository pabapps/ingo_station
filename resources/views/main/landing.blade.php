@extends('main.main')
@section('styles')

@endsection

@section('content')

<div class="page-hero page-hero-xl page-hero-center page-hero-parallax" style="background-image: url({{asset('images/bangladesh.jpg')}}); opacity: 1;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-hero-content">
					<h1 class="page-title">
						<span class="text-theme">Welcome</span> TO iNGO FORUM Bangladesh
					</h1>
					<p class="page-subtitle">
						<span class="text-theme"></span> 
					</p>

					<a href="{{URL::to('/')}}/search" class="btn btn-lg">Search projects</a>
				</div>
			</div>
		</div>
	</div>

	<div class="section-shape section-shape-bottom section-shape-bg-color">
		<svg style="height: 40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
			<path class="section-shape-fill" d="M761.9,44.1L643.1,27.2L333.8,98L0,3.8V0l1000,0v3.9"></path>
		</svg>
	</div>
</div>

<section class="widget-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12">
				<div class="item text-center">
					<span class="item-icon">
						<i class="fa fa-sliders"></i>
					</span>

					<p class="item-title">The aim of the INGO forum is to:</p>
					<ul>
						<li>
							<p align="justify">
								Facilitate information exchange, sharing and learning among members and to promote coordination and collaboration in order to improve their practices and jointly provide our input to development actors and policies
							</p>

						</li>
						<li>
							<p align="justify">
								Work together in a collaborative and systematic manner to better achieve our objectives and how to improve our ways of working to maximise our impact and come to a consensus on certain basic guidelines and standardisation where practical for our work in Bangladesh
							</p>
						</li>
						<li>
							<p align="justify">
								Engage with the Government on all issues relating to INGOs in Bangladesh
							</p>
						</li>
						<li>
							<p align="justify">
								Work together to demonstrate that INGOs operate in Bangladesh with highest standards of transparency, accountability and in line with the MDGs and national development and disaster response goals
							</p>
						</li>
						
						<li>
							<p align="justify">
								Provide peer support
							</p>
						</li>
					</ul>	
					
				</div>
			</div>

			<div class="col-md-4 col-xs-12">
				<div class="item text-center">
					<span class="item-icon">
						<i class="fa fa-tablet"></i>
					</span>

					<p class="item-title">Who are We:</p>

					<p>International organisations have a long chequered history in Bangladesh and INGOs have been working in multiple ways in all sectors requiring development assistance including health, education, disaster risk reduction, good governance, poverty alleviation, social inclusion etc. However, with many structural barriers still inherent (such as inefficiency, corruption, lack of transparency, accountability and poor law and order conditions), there is a vital role for INGOs to play in bringing about sustained (positive) change.</p>
				</div>
			</div>

			<div class="col-md-4 col-xs-12">
				<div class="item text-center">
					<span class="item-icon">
						<i class="fa fa-life-saver"></i>
					</span>

					<p class="item-title">BASIC PRINCIPLES AND OPERATING GUIDELINES</p>

					<p>We the INGOs operating in Bangladesh commit ourselves to adhering to the following principles and guidelines:</p>
					<ul>
						<li>
							<p align="justify">
								We are in Bangladesh to contribute to improvement in the quality of life of the people of Bangladesh.
							</p>
						</li>
						<li>
							<p align="justify">
								Our work focuses on responding to emergencies, reducing the impact of disasters and climate change, addressing the root causes of poverty, meeting basic needs and enabling communities to become more inclusive and self-sufficient.
							</p>
						</li>
						<li>
							<p align="justify">
								We respect the constitution and laws of Bangladesh and work within them.
							</p>
						</li>
						<li>
							<p align="justify">
								We will not engage in any partisan political activities within Bangladesh.
							</p>
						</li>
						<li>
							<p align="justify">
								We respect the dignity of the peoples of Bangladesh: their cultures, religions and customs.
							</p>
						</li>
						<li>
							<p align="justify">
								We support and work with the peoples of Bangladesh based on objective assessment of need alone, and not on any political, ethnic or religious agenda.
							</p>
						</li>
						<li>
							<p align="justify">
								We will not discriminate against any individual or group on the grounds of gender, political affiliation, ethnic origin, religious belief or sexual orientation.
							</p>
						</li>
						<li>
							<p align="justify">
								We will work to ensure that our work is transparent and undertake to involve program partners and their communities in the planning, management and implementation of programmes.
							</p>
						</li>
						<li>
							<p align="justify">
								We are accountable to those whom we seek to assist and to those providing the resources.
							</p>
						</li>
						<li>
							<p align="justify">
								In our recruitment, procurement and other transactions we are guided by suitability, qualification, expertise and experience and not by political, religious, personal or any other considerations that may lead to conflict of interest.
							</p>
						</li>
						<li>
							<p align="justify">
								We are committed to comply strictly with international humanitarian principles and human rights law.
							</p>
						</li>
						<li>
							<p align="justify">
								We are performance oriented to achieve the best results possible based on targets and achievements agreed with those we work for/with and those we mobilize resources from and we welcome objective evaluation of our work.
							</p>
						</li>						
					</ul>	

				</div>
			</div>
		</div>
	</div>
</section>

<div class="owl-carousel owl-theme">
	<div class="item"><img src="{{asset('images/carousel/bbc.jpg')}}" alt="" style=""></div>
	<div class="item"><img src="{{asset('images/carousel/care.png')}}" alt="" style=""></div>
	<div class="item"><img src="{{asset('images/carousel/PA.png')}}" alt="" style=""></div>
	<div class="item"><img src="{{asset('images/carousel/concern.png')}}" alt="" style=""></div>
	<div class="item"><img src="{{asset('images/carousel/download.png')}}" alt="" style=""></div>

</div>


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
								<a href="https://www.practicalaction.org" target="_blank">Practical Action Bangladesh</a>
							</p>
						</div>

						<div class="col-sm-6 col-xs-12 text-right">
							<p>Powered by
								<a href="https://www.practicalaction.org" target="_blank">Practical Action Bangladesh</a>
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

<script type="text/javascript">
	$( document ).ready(function() {




		$('.owl-carousel').owlCarousel({
			rtl:false,
			loop:true,
			margin:10,
			nav:true,
			autoHeight:true,
			autoplay:true,
			autoplayTimeout:1000,
			autoplayHoverPause:false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:5
				}
			}
		})

		console.log("testing");



	});




</script>
@endsection


