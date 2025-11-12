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
                    <h3 class="wow fadeInUp">{{ __('general.education_details') }}</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $educationItem->translate('title') }}</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row align-items-start">
            <div class="col-lg-12">
             <div class="post-image-2">
                 <figure class="image-anime reveal">
                     <img src="{{ asset('storage/' . $educationItem->image) }}" alt="{{ $educationItem->translate('title') }}">
                 </figure>
             </div>
            </div>

            <div class="col-lg-12">
                <!-- Service Strategy Content start -->
                <div class="service-strategy-content">
                 <!-- Service Strategy Title start -->
                 <div class="service-strategy-title wow fadeInUp">
                     <div class="post-item-meta">
                         <ul>
                             <li><a href="#"><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($educationItem->date)->format('d M Y') }}</a></li>
                         </ul>
                     </div>
                    </div>
                    <!-- Service Strategy Title start -->

                    <!-- Service Strategy Body start -->
                    <div class="news-strategy-body">
                        <p class="wow fadeInUp" data-wow-delay="0.25s">
                            {!! $educationItem->translate('description') !!}
                        </p>
                    </div>
                    <!-- Service Strategy Body End -->
                </div>
                <!-- Service Strategy Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Service Strategy Section End -->

<!-- Latest News Section start -->
<div class="latest-news">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-5">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">{{ __('general.other_education') }}</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.discover_more_education_details') }}</h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-lg-7">
                <!-- Section Title Content Start -->
                <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                    <a href="{{ route('education') }}" class="btn-default">{{ __('general.view_more') }}</a>
                </div>
                <!-- Section Title Content End -->
            </div>
        </div>

        <div class="row">
            @foreach($otherEducation as $education)
            <div class="col-lg-4 col-md-6">
                <!-- Blog Item Start -->
                <div class="blog-item wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.25 }}s">
                    <!-- Post Featured Image Start-->
                    <div class="post-featured-image" data-cursor-text="View">
                        <figure>
                            <a href="{{ route('education-details', $education->slug) }}" class="image-anime">
                                <img src="{{ asset('storage/' . $education->image) }}" alt="{{ $education->translate('title') }}" class="card-image">
                            </a>
                        </figure>
                    </div>
                    <!-- Post Featured Image End -->

                    <!-- post Item Content Start -->
                    <div class="post-item-content">
                        <!-- post Item Meta Start -->
                        <div class="post-item-meta">
                            <ul>
                                <li><a href="#"><i class="fa-regular fa-clock"></i>{{ \Carbon\Carbon::parse($education->date)->format('d M Y') }}</a></li>
                               
                            </ul>
                        </div>
                        <!-- post Item Meta End -->

                        <!-- post Item Body Start -->
                        <div class="post-item-body">
                            <h2><a href="{{ route('education-details', $education->slug) }}">{{ $education->translate('title') }}</a></h2>
                        </div>
                        <!-- Post Item Body End-->

                        <!-- Post Item Footer Start-->
                        <div class="post-item-footer">
                            <a href="{{ route('education-details', $education->slug) }}">{{ __('general.read_more') }}</a>
                        </div>
                        <!-- Post Item Footer End-->
                    </div>
                    <!-- post Item Content End -->
                </div>
                <!-- Blog Item End -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Latest News Section End -->
   
   
</x-landing.layout>