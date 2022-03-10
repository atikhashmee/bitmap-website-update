@extends('site.pages.pages-layout')
@section('page-contents')
<style>
   .team-image-style{
      min-height: 250px;
      height: 250px !important;
      background-size: cover;
   }
   .mybox{
      width: 100% !important;
   }
</style>
	<div class="content">
		<div class="fixed-column-wrap">
		<div class="pr-bg"></div>
		<div class="fixed-column-wrap-content">
			<div class="scroll-nav-wrap color-bg">
				<div class="carnival">Scroll down</div>
				<div class="snw-dec">
					<div class="mousey">
					<div class="scroller"></div>
					</div>
				</div>
			</div>
			<div class="bg" data-bg="{{ asset("storage/website/".$about_info->image_bg) }}"></div>
			<div class="overlay"></div>
			<div class="progress-bar-wrap bot-element">
				<div class="progress-bar"></div>
			</div>
			<div class="fixed-column-wrap_title first-tile_load">
				<h2>  {{  $about_info->headline_bg }} </h2>
				<p class="content-style" >
					{{  $about_info->description_bg }} </p>
			</div>
			<div class="fixed-column-dec"></div>
		</div>
		</div>
		<div class="column-wrap">
		<div class="column-wrap-container fl-wrap">
			<div class="col-wc_dec">
				<div class="pr-bg pr-bg-white"></div>
			</div>
			<div class="col-wc_dec col-wc_dec2">
				<div class="pr-bg pr-bg-white"></div>
			</div>
			<section id="sec1" class="small-padding">
				<div class="container">
					<div class="split-sceen-content_title fl-wrap">
					<div class="pr-bg pr-bg-white"></div>
					<h3> {{  $about_info->company_history_title }}</h3>
					<p class='content-style'>{{  $about_info->compnay_history_description }}</div>
					<div class="column-wrap-content fl-wrap">
					<div class="column-wrap-media fl-wrap">
						<div class="pr-bg pr-bg-white">
						</div>
						<img src="{{ asset("storage/website/".$about_info->about_img) }}"  class="respimg" alt="">
						<a href="{{ $about_info->youtubelink }}" class="column-wrap-media_btn color-bg image-popup">Our Story Video <i class="fas fa-play"></i>
							<div class="pr-bg pr-bg-white"></div>
						</a>
					</div>
					<div class="column-wrap-text">
						<div class="row">
							<div class="col-md-4">
								<h3 class="pr-subtitle">
								{{  $about_info->heading }}
								<div class="pr-bg pr-bg-white"></div>
								</h3>
							</div>
							<div class="col-md-8">
								<div class="pr-bg pr-bg-white"></div>
								<p class='content-style'>
								{{  $about_info->description }}
								</p>
							</div>
						</div>
					</div>
					</div>
					<div class="section-number right_sn">
					<div class="pr-bg pr-bg-white"></div>
					<span>0</span>1.
					</div>
				</div>
			</section>
			<div class="section-separator"></div>
				<section id="sec2" class="small-padding">
					<div class="container">
					<div class="split-sceen-content_title fl-wrap">
						<div class="pr-bg pr-bg-white"></div>
						<h3>Our awesome team</h3>
					</div>
					@foreach ($teamtype as $type)
						@php
							$teammembers = getTeamMemberByTypeId($type->id);
						@endphp
						@foreach ($teammembers as $member)
							<div class="team-box">
								<div class="pr-bg pr-bg-white"></div>
								<div class="team-photo">
								<div class="overlay"></div>
								<img src="{{ asset("storage/team_members/".$member->image) }}" alt="" class="respimg">
								<ul class="team-social">
									<li><a href="https://www.instagram.com/{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
									<li><a href="https://twitter.com/{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
									<li><a href="https://www.linkedin.com/in/{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
								</ul>
								<a href="{{ $member->email }}" class="team-contact_btn color-bg"><i class="fal fa-envelope"></i></a>
								</div>
								<div class="team-info">
								<h3>{{ $member->name }} </h3>
								<h4>{{ $member->designation }}</h4>
								<p>{{ $member->description }}</p>
								</div>
							</div>
						@endforeach
					@endforeach   
					<div class="section-number right_sn">
						<div class="pr-bg pr-bg-white"></div>
						<span>0</span>2.
					</div>
					</div>
				</section>
			<div class="section-separator"></div>
			<section id="sec5" class="small-padding">
				<div class="container">
					<div class="split-sceen-content_title fl-wrap">
					<div class="pr-bg pr-bg-white"></div>
					<h3>Testimonials</h3>
					<p>What clients think and review Studiobitmap</p>
					</div>
					<div class="column-wrap-content fl-wrap">
					<div class="column-wrap-text">
						<div class="testilider fl-wrap" data-effects="slide">
							<div class="pr-bg pr-bg-white"></div>
							<div class="swiper-container">
								<div class="swiper-wrapper">
								@foreach ($testimonial as $testis)
									<div class="swiper-slide">
										<div class="testi-item fl-wrap">
											<div class="testi-avatar">
											<img src="{{  asset("storage/testimonial/".$testis->client_image) }}"alt="">
											</div>
											<h3>{{ $testis->client_name}}</h3>
											<p>"{{ $testis->client_comment}}"</p>
											<a href="#" class="teti-link" target="_blank">Via {{ $testis->comment_via }}</a>
										</div>
									</div>
								@endforeach
								</div>
								<div class="testilider-controls">
								<div class="tc-pagination"></div>
								<div class="ss-slider-btn ss-slider-prev color-bg"><i class="fal fa-long-arrow-left"></i></div>
								<div class="ss-slider-btn ss-slider-next color-bg"><i class="fal fa-long-arrow-right"></i></div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="section-number right_sn">
					<div class="pr-bg pr-bg-white"></div>
					<span>0</span>3.
					</div>
				</div>
			</section>
		</div>    
		</div>
		<div class="limit-box fl-wrap"></div>
	</div>
@endsection

   