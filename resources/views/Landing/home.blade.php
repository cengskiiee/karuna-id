<x-landing.layout>
    @section('title')
        {{ $title }}
    @endsection

    <!-- Hero Section Start -->
    <div class="hero hero-slider">
        <div class="hero-slider-layout">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <!-- Dynamic Hero Slide Start -->
                        <div class="swiper-slide">
                            <div class="hero-slide">
                                <!-- Slider Image Start -->
                                <div class="hero-slider-image">
                                    <img src="{{ asset('storage/' . $slider->image) }}" alt="">
                                </div>
                                <!-- Slider Image End -->

                                <!-- Slider Content Start -->
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <!-- Hero Content Start -->
                                            <div class="hero-content">
                                                <div class="hero-content-title">
                                                    <h3 class="wow fadeInUp">Karuna Liberatia Indonesia</h3>
                                                    <!-- Title -->
                                                    <h1 class="text-anime-style-3" data-cursor="-opaque">
                                                        {{ $slider->translate('title') }}</h1>
                                                </div>
                                                <div class="hero-content-body wow fadeInUp" data-wow-delay="0.25s">
                                                    <!-- Description -->
                                                    <p>{{ $slider->translate('description') }}</p>
                                                </div>

                                                <div class="hero-content-footer wow fadeInUp" data-wow-delay="0.5s">
                                                    <a href="#about-us"
                                                        class="btn-default">{{ __('general.get_started') }}</a>
                                                    {{-- <a href="{{ route('services') }}"
                                                        class="btn-default btn-highlighted">{{ __('general.view_services') }}</a> --}}
                                                </div>
                                            </div>
                                            <!-- Hero Content End -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider Content End -->
                            </div>
                        </div>
                        <!-- Dynamic Hero Slide End -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->




    <!-- About Section Start -->
    <div class="about-us" id="about-us">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-5">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.about_us') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $aboutUs->translate('title') }}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                {{-- <div class="col-lg-7">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content wow fadeInUp" data-wow-delay="0.25s">
                        <p>At Hadiwana, we stand as a beacon of hope, dedicated to safeguarding Indonesia's rich biodiversity and ensuring a sustainable future for our planet. We are not just another organization; we are a collective of passionate individuals, driven by an unwavering commitment to conservation excellence.</p>
                    </div>
                    <!-- Section Title Content End -->
                </div> --}}
            </div>

            <div class="row align-items-center">
                <div class="col-lg-4">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- About Content Title Start -->
                        <div class="about-content-title wow fadeInUp">
                            <p style="text-align: justify;">{{ $aboutUs->translate('description') }}</p>
                        </div>
                        <!-- About Content Title End -->

                        <!-- About Content Body Start -->
                        <div class="about-content-body">
                            <ul class="wow fadeInUp" data-wow-delay="0.25s">
                                @foreach ($categories as $data)
                                    <li>{{ $data->translate('service_category_title') }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- About Content Body End -->

                        <!-- About Content Footer Start -->
                        <div class="about-content-footer wow fadeInUp" data-wow-delay="0.5s">
                            <a href="{{ route('about') }}" class="btn-default">{{ __('general.learn_more') }}</a>
                        </div>
                        <!-- About Content Footer End -->
                    </div>
                    <!-- About Content End -->
                </div>

                <div class="col-lg-4">
                    <!-- About Image Start -->
                    <div class="about-image">
                        <figure class="image-anime reveal">
                            <img src="{{ asset('storage/' . $aboutUs->image_1) }}"
                                alt="{{ $aboutUs->translate('title') }}">
                        </figure>
                    </div>
                    <!-- About Image End -->
                </div>

                <div class="col-lg-4">
                    <!-- About Image Start -->
                    <div class="about-image-2">
                        <figure class="image-anime reveal">
                            <img src="{{ asset('storage/' . $aboutUs->image_2) }}"
                                alt="{{ $aboutUs->translate('title') }}">
                        </figure>
                    </div>
                    <!-- About Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services">
        <div class="container">
            <div class="row section-row align-items-center">
                {{-- <div class="col-lg-5">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.our_services') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            {{ __('general.best_conservation_planning_desc') }}</h2>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-7">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content wow fadeInUp" data-wow-delay="0.25s">
                        <p>At Hadiwana, we are dedicated to safeguarding Indonesia's rich biodiversity, ensuring a sustainable future for our planet. We offer a comprehensive range of services to achieve our conservation goals, working collaboratively with local communities, government agencies, and other partners.</p>
                    </div>
                    <!-- Section Title Content End -->
                </div> --}}
            </div>

            {{-- <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="service-item wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.25 }}s"
                            data-cursor="-opaque">
                            <div class="icon-box">
                                <img src="{{ asset('storage/' . $service->image) }}"
                                    alt="{{ $service->translate('title') }}">
                            </div>
                            <div class="service-body">
                                <h3>{{ $service->translate('title') }}</h3>
                            </div>
                            <div class="service-footer">
                                <a
                                    href="{{ route('service-details', $service->slug) }}">{{ __('general.learn_more') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="service-footer-btn wow fadeInUp" data-wow-delay="0.25s">
                    <a href="{{ route('services') }}" class="btn-default">{{ __('general.view_all_services') }}</a>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Why Choose Us Section Start -->
    {{-- <div class="why-choose-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="why-choose-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ __('general.why_choose_us') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $whyUs->translate('title') }}</h2>
                        </div>
\
                        <div class="why-choose-content-body wow fadeInUp" data-wow-delay="0.25s">
                            <p style="text-align: justify;">{{ $whyUs->translate('description') }}</p>
                        </div>

                        <div class="why-choose-content-footer wow fadeInUp" data-wow-delay="0.5s">
                            <a href="{{ route('about') }}" class="btn-default">{{ __('general.learn_more') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="why-choose-box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="why-choose-image">
                                    <figure class="image-anime reveal">
                                        <img src="{{ asset('storage/' . $whyUs->image_why_1) }}"
                                            alt="{{ $whyUs->translate('title') }}">
                                    </figure>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s" data-cursor="-opaque">
                                    <div class="icon-box">
                                        <img src="{{ asset('Assets/Landing/images/icon-why-choose-1.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="why-choose-body">
                                        <h3>{{ __('general.proven_experience') }}</h3>
                                    </div>
                                    <div class="why-choose-footer">
                                        <a href="{{ route('projects') }}">{{ __('general.discover') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 order-lg-1 order-md-1 order-2">
                                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s" data-cursor="-opaque">
                                    <div class="icon-box">
                                        <img src="{{ asset('Assets/Landing/images/icon-why-choose-2.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="why-choose-body">
                                        <h3>{{ __('general.quality_services') }}</h3>
                                    </div>
                                    <div class="why-choose-footer">
                                        <a href="{{ route('services') }}">{{ __('general.discover') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 order-lg-2 order-md-2 order-1">
                                <div class="why-choose-image">
                                    <figure class="image-anime reveal">
                                        <img src="{{ asset('storage/' . $whyUs->image_why_2) }}"
                                            alt="{{ $whyUs->translate('title') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Why Choose Us Section End -->

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
                                    <img src="{{ asset('storage/' . $aboutUs->image_bg) }}"
                                        alt="{{ $aboutUs->translate('title') }}">
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

    <!-- Our Projects Section Start -->
    <div class="our-project">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-5">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.our_projects') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            {{ __('general.explore_our_latest_projects') }}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-7">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content wow fadeInUp" data-wow-delay="0.25s">
                        <p>{{ __('general.desc_project_section') }}</p>
                    </div>
                    <!-- Section Title Content End -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-3 col-md-6">
                        <!-- Project Item Start -->
                        <div class="project-item wow fadeInUp" data-wow-delay="0.25s">
                            <div class="project-image" data-cursor-text="View">
                                <a href="{{ route('project-details', $project->slug) }}">
                                    <figure>
                                        <img src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->translate('project_name') }}">
                                    </figure>
                                </a>
                            </div>
                            <div class="project-content">
                                <h3>{{ $project->translate('project_name') }}</h3>
                                <div class="project-readmore-btn">
                                    <a href="{{ route('project-details', $project->slug) }}"
                                        class="btn-default btn-highlighted">{{ __('general.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- Project Item End -->
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- Our Projects Section End -->



    <!-- Our FAQs Section Start -->
    {{-- <div class="our-faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.faq_title') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            {{ __('general.everything_you_know_about_our_services') }}</h2>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="faq-accordion" id="accordion">
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item wow fadeInUp" data-wow-delay="{{ $index * 0.25 }}s">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">
                                        <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>{{ $faq->translate('faq_question') }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>{{ $faq->translate('faq_answer') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Our FAQs Section End -->


    <!-- Latest News Section start -->
    {{-- <div class="latest-news">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.latest_post') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.read_our_latest_desc') }}
                        </h2>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                        <a href="{{ route('news') }}" class="btn-default">{{ __('general.view_more') }}</a>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($news as $newsItem)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.25 }}s">
                            <div class="post-featured-image" data-cursor-text="View">
                                <figure>
                                    <a href="{{ route('news-details', $newsItem->slug) }}" class="image-anime">
                                        <img src="{{ asset('storage/' . $newsItem->image) }}"
                                            alt="{{ $newsItem->translate('title') }}">
                                    </a>
                                </figure>
                            </div>

                            <div class="post-item-content">
                                <div class="post-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa-regular fa-user"></i>
                                                {{ $newsItem->author }}</a></li>
                                        <li><a href="#"><i class="fa-regular fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($newsItem->news_date)->format('d M Y') }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-body">
                                    <h2><a
                                            href="{{ route('news-details', $newsItem->slug) }}">{{ $newsItem->translate('title') }}</a>
                                    </h2>
                                </div>
                                <div class="post-item-footer">
                                    <a
                                        href="{{ route('news-details', $newsItem->slug) }}">{{ __('general.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- Latest News Section End -->

    <!-- Call To Action Start -->
    @include('Landing.section.contact-box')
    <!-- Call To Action End -->

</x-landing.layout>
