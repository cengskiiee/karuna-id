<x-landing.layout>
    @section('title')
    {{ $title }}
    @endsection

     <!-- Service Strategy Section start -->
    <div class="service-strategy">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.service_details') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $service->translate('title') }}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col-lg-12">
                    <!-- Service Strategy Image start -->
                    <div class="service-strategy-image">
                        <figure class="image-anime reveal">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->translate('title') }}">
                        </figure>
                    </div>
                    <!-- Service Strategy Image End -->
                </div>

                <div class="col-lg-12 my-3">
                    <!-- Service Strategy Content start -->
                    <div class="service-strategy-content">
                        <div class="service-strategy-body">
                            <p style="color: #0086c5">{{ __('general.category') }}: {{ $service->category->translate('service_category_title') }}</p>
                        </div>
                        <!-- Service Strategy Title start -->
                        <div class="service-strategy-title wow fadeInUp">
                            <h3>{{ __('general.description') }} :</h3>
                        </div>
                        <!-- Service Strategy Title start -->

                        <!-- Service Strategy Body start -->
                        <div class="service-strategy-body">
                            {!! $service->translate('description') !!}
                        </div>
                        <!-- Service Strategy Body End -->
                    </div>
                    <!-- Service Strategy Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Service Strategy Section End -->

    <!-- Single Service Page Start -->
    <div class="page-service-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Service Sidebar Start -->
                    <div class="service-sidebar">
                        <!-- Service Catagery List Start -->
                        <div class="service-catagery-list wow fadeInUp">
                            <h3>{{ __('general.feel_free_explore_service') }}</h3>
                            <ul>
                                @foreach($otherServices as $otherService)
                                <li><a href="{{ route('service-details', $otherService->slug) }}">{{ $otherService->translate('title') }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Service Catagery List End -->
                    </div>
                    <!-- Service Sidebar End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Single Service Page End -->


    
    
    
    <!-- Call To Action Start -->
    @include('Landing.section.contact-box')
    <!-- Call To Action End -->

</x-landing.layout>