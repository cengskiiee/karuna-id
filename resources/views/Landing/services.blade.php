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
						<h1 class="text-anime-style-3" data-cursor="-opaque">{{ __('header.services') }}</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page"><a href="#services-start">{{ __('header.services') }}</a></li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    
        <!-- Page Service Section Start -->
        <div class="page-service" id="services-start">
            <div class="container">
                <div class="row">
                    <!-- Title start -->
                    <div class="section-title" style="text-align: center">
                        <h3 class="wow fadeInUp">{{ __('general.all_services') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.all_services_desc') }}</h2>
                        <br>
                    </div>
                    <!-- Title End -->
    
                    @foreach($services as $service)
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Services Item Start -->
                        <div class="service-item page-service-item wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.2 }}s" data-cursor="-opaque">
                            <div class="icon-box">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->translate('title') }}">
                            </div>
                            <div class="service-body">
                                <h3>{{ $service->translate('title') }}</h3>
                            </div>
                            <p style="color: #C1C1C1">{{ __('general.category') }}: {{ $service->category->translate('service_category_title') }}</p>
                            <div class="service-footer">
                                <a href="{{ route('service-details', $service->slug) }}">{{ __('general.learn_more') }}</a>
                            </div>
                        </div>
                        <!-- Services Item End -->
                    </div>
                    @endforeach
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <!-- Post Pagination Start -->
                        <div class="post-pagination wow fadeInUp" data-wow-delay="0.75s">
                            {{ $services->links('vendor.pagination.custom') }}
                        </div>
                        <!-- Post Pagination End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Service Section End -->

    
<!-- Call To Action Start -->
@include('Landing.section.contact-box')
<!-- Call To Action End -->
    
    
</x-landing.layout>

