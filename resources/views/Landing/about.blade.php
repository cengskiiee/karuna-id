<x-landing.layout>
    @section('title')
    {{ $title }}
    @endsection
    
    <!-- Page Header Start -->
	<div class="page-header parallaxie" style="background: linear-gradient(180deg, transparent 0%, #0e0d1b8c 40.5%), url('{{ asset('Assets/Landing/images/page-header-bg.jpg') }}') no-repeat center center; background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">{{ __('header.about') }}</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page"><a href="#about-us">{{ __('header.about') }}</a></li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->
    
  
    <!-- Page About Us Start -->
    <div class="page-about-us" id="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <!-- About Us Image Start -->
                    <div class="about-us-image">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('storage/' . $aboutUs->image_1) }}" alt="{{ $aboutUs->translate('title') }}" style="width: 471px; height: 487;">
                            </figure>
                        </div>
                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                 <img src="{{ asset('storage/' . $aboutUs->image_2) }}" alt="{{ $aboutUs->translate('title') }}" style="width: 350px; height: 426;">
                            </figure>
                        </div>

                        <!-- Counter Item Start -->
                        <div class="experience-counter-item wow fadeInUp">
                            <!-- Counter Content Start -->
                            <div class="experience-counter-content">
                                <h3><span class="counter">{{ $yearExp->years_experience }}</span>+</h3>
                                <p style="color: #fff">{{ __('general.years_of_experience') }}</p>
                            </div>
                            <!-- Counter Content End -->
                        </div>
                        <!-- Counter Item End -->

                    </div>
                    <!-- About Us Image End -->


                </div>
                <div class="col-lg-5">
                    <!-- About Story Content Start -->
                    <div class="about-story-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ __('general.about_us') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $aboutUs->translate('title') }}</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Our Story Body Start -->
                        <div class="about-story-body wow fadeInUp" data-wow-delay="0.25s">
                            <p style="text-align: justify;">{{ $aboutUs->translate('description') }}</p>
                        </div>
                        <!-- Our Story Body End -->

                        <div class="about-company-quality">

                            <!-- Compant Quality Item Start -->
                            <div class="company-quality-item wow fadeInUp" data-wow-delay="0.5s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{ asset('Assets/Landing/images/icon-company-quality-2.svg') }}" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Compant Quality Content Start -->
                                <div class="company-quality-content">
                                    <h3>{{ __('general.proven_experience') }}</h3>
                                </div>
                                <!-- Compant Quality Content End -->
                            </div>
                            <!-- Compant Quality Item End -->
                            
                            <!-- Compant Quality Item Start -->
                            <div class="company-quality-item wow fadeInUp" data-wow-delay="0.5s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{ asset('Assets/Landing/images/icon-company-quality-1.svg') }}" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Compant Quality Content Start -->
                                <div class="company-quality-content">
                                    <h3>{{ __('general.quality_services') }}</h3>
                                </div>
                                <!-- Compant Quality Content End -->
                            </div>
                            <!-- Compant Quality Item End -->

                            
                        </div>
                        
                        <!-- Our Story Footer Start -->
                        <div class="about-story-footer">
                            <ul class="wow fadeInUp" data-wow-delay="0.75s">
                                @foreach ($categories as $data )
                                <li>{{ $data->translate('service_category_title') }}</li>
                                @endforeach
                            </ul>

                           
                        </div>
                        <!-- Our Story Footer End -->
                    </div>
                    <!-- About Story Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page About Us End -->

    <!-- Comapany Counter Start -->
    <div class="company-counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <div class="counter-content">
                            <h3><span class="counter">{{ $yearExp->years_experience }}</span>+</h3>
                            <p>{{ __('general.years_experience') }}</p>
                        </div>
                    </div>
                    <!-- Company Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <div class="counter-content">
                            <h3><span class="counter">{{ $yearExp->projects_completed }}</span>+</h3>
                            <p>{{ __('general.projects_completed') }}</p>
                        </div>
                    </div>
                    <!-- Company Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <div class="counter-content">
                            <h3><span class="counter">{{ $yearExp->satisfied_client }}</span>+</h3>
                            <p>{{ __('general.satisfied_client') }}</p>
                        </div>
                    </div>
                    <!-- Company Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <div class="counter-content">
                            <h3><span class="counter">{{ $yearExp->total_rating }}</span></h3>
                            <p>{{ __('general.overall_rating') }}</p>
                        </div>
                    </div>
                    <!-- Company Counter Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Comapany Counter End -->

    <!-- Intro Video Section Start -->
    <div class="intro-video">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- Intro Video Box Start -->
					<div class="intro-video-box" data-cursor-text="Play">
                        <!-- Video Image Start -->
                        <div class="video-image">
                            <a href="{{ $aboutUs->link_video }}" class="popup-video">
                                <figure class="image-anime">
                                    <img src="{{ asset('storage/' . $aboutUs->image_bg) }}" alt="{{ $aboutUs->translate('title') }}">
                                </figure>
                            </a>
                        </div>
                        <!-- Video Image End -->

                        <!-- Video Play Button Start -->
                        <div class="video-play-button">
                            <a href="{{ $aboutUs->link_video }}" class="popup-video">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                        <!-- Video Play Button End -->
                    </div>
					<!-- Intro Video Box End -->
				</div>
			</div>
		</div>
	</div>
    <!-- Intro Video Section End -->

    <!-- How It Work Section Start -->
    <div class="how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.how_it_work') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $howItWork->translate('title') }}</h2>
                    </div>
                    <div class="why-choose-content-body wow fadeInUp" data-wow-delay="0.25s">
                        <p style="text-align: justify;">{{ $howItWork->translate('description') }}</p>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-7">
                    <!-- How Work Accordion Start -->
                    <div class="faq-accordion how-work-accordion" id="accordion">
                        @foreach($categories as $index => $category)
                        <!-- How It Work Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="{{ $index * 0.25 }}s">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                    <span>0{{ $index + 1 }}</span>{{ $category->translate('service_category_title') }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>{{ $category->translate('description') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- How It Work Item End -->
                        @endforeach
                    </div>
                    <!-- How Work Accordion End -->
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work Section End -->

    <!-- Company Expertise Start -->
    <div class="company-expertise">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Why Choose Content Start -->
                    <div class="why-choose-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ __('general.why_choose_us') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $whyUs->translate('title') }}</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Why Choose Content Body Start -->
                        <div class="why-choose-content-body wow fadeInUp" data-wow-delay="0.25s">
                            <p style="text-align: justify;">{{ $whyUs->translate('description') }}</p>
                        </div>
                        <!-- Why Choose Content Body End -->

                    </div>
                    <!-- Why Choose Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- Why Choose Box Start -->
                    <div class="why-choose-box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <!-- Why Choose Image Start -->
                                <div class="why-choose-image-second">
                                    <figure class="image-anime reveal">
                                        <img src="{{ asset('storage/' . $whyUs->image_why_1) }}" alt="{{ $whyUs->translate('title') }}">
                                    </figure>
                                </div>
                                <!-- Why Choose Image End -->
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <!-- Why Choose Item Start -->
                                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s" data-cursor="-opaque" style="background-color: #fff">
                                    <div class="icon-box">
                                        <img src="{{ asset('Assets/Landing/images/icon-why-choose-1.svg') }}" alt="">
                                    </div>
                                    <div class="why-choose-body">
                                        <h3>{{ __('general.proven_experience') }}</h3>
                                    </div>
                                    <div class="why-choose-footer">
                                        <a href="{{ route('projects') }}">{{ __('general.discover') }}</a>
                                    </div>
                                </div>
                                <!-- Why Choose Item End -->
                            </div>

                            <div class="col-lg-6 col-md-6 order-lg-1 order-md-1 order-2">
                                <!-- Why Choose Item Start -->
                                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s" data-cursor="-opaque" style="background-color: #fff">
                                    <div class="icon-box">
                                        <img src="{{ asset('Assets/Landing/images/icon-why-choose-2.svg') }}" alt="">
                                    </div>
                                    <div class="why-choose-body">
                                        <h3>{{ __('general.quality_services') }}</h3>
                                    </div>
                                    <div class="why-choose-footer">
                                        <a href="{{ route('services') }}">{{ __('general.discover') }}</a>
                                    </div>
                                </div>
                                <!-- Why Choose Item End -->
                            </div>

                            <div class="col-lg-6 col-md-6 order-lg-2 order-md-2 order-1">
                                <!-- Why Choose Image Start -->
                                <div class="why-choose-image-second">
                                    <figure class="image-anime reveal">
                                        <img src="{{ asset('storage/' . $whyUs->image_why_2) }}" alt="{{ $whyUs->translate('title') }}">
                                    </figure>
                                </div>
                                <!-- Why Choose Image End -->
                            </div>
                        </div>
                    </div>
                    <!-- Why Choose Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Company Expertise End -->

    <!-- Meet Team Start -->
    <div class="meet-team">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-5">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.meet_people') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.meet_people_desc') }}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                {{-- <div class="col-lg-7">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content wow fadeInUp" data-wow-delay="0.25s">
                        <p>Hadiwana was founded by a team of passionate individuals driven by a common goal: creating a positive impact on the world. Today, this vision is carried forward by a dedicated team of experts who bring diverse skills and experiences to the table.</p>  
                    </div>
                    <!-- Section Title Content End -->
                </div> --}}
            </div>

            <div class="row">
                @foreach($profile as $index => $member)
                <div class="col-lg-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-member-item wow fadeInUp" data-wow-delay="{{ $index * 0.25 }}s">
                        <!-- Team Img Start -->
                        <div class="team-image">
                            <figure>
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                            </figure>
                        </div>
                        <!-- Team Img End -->
            
                        <!-- Team Body Start -->
                        <div class="team-body">
                            <div class="team-content">
                                <h3>{{ $member->name }}</h3>
                                <p>{{ $member->position }}</p>
                            </div>
                            <div class="team-social-icon">
                                <ul>
                                    <li><a href="#" class="social-icon copy-email" data-email="{{ $member->email }}"><i class="fa-solid fa-envelope"></i></a></li>
                                    <li><a href="{{ $member->linkedin }}" class="social-icon" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Meet Team End -->

    <!-- Call To Action Start -->
    @include('Landing.section.contact-box')
    <!-- Call To Action End -->


    @push('scripts')
    <script>

document.addEventListener('DOMContentLoaded', function() {
    const copyEmailButtons = document.querySelectorAll('.copy-email');

    copyEmailButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const email = this.getAttribute('data-email');
            navigator.clipboard.writeText(email).then(() => {
                alert('Email copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy email: ', err);
            });
        });
    });
});
    </script>
    @endpush


</x-landing.layout>
