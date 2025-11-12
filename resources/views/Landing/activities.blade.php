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
                            <h1 class="text-anime-style-3" data-cursor="-opaque">{{ __('header.activities') }}</h1>
                            <nav class="wow fadeInUp">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#news-start">{{ __('header.activities') }}</a></li>
                                </ol>
                            </nav>
                        </div>
                        <!-- Page Header Box End -->
                    </div>
                </div>
            </div> 
        </div>
	<!-- Page Header End -->

        

    <!-- Page Blog Start -->
    <div class="page-blog" id="news-start">
        <div class="container">
            <div class="row">
                <!-- Title start -->
                <div class="section-title" style="text-align: center">
                    <h3 class="wow fadeInUp">{{ __('general.all_activities') }}</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.all_activities_desc') }}</h2>
                    <br>
                </div>
                <!-- Title End -->
                
                @foreach($activities as $activity)
                <div class="col-lg-4 col-md-6">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.2 }}s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="{{ route('activities-details', $activity->slug) }}" class="image-anime">
                                    <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->translate('title') }}" class="card-image">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Content Start -->
                        <div class="post-item-content">
                            <!-- post Item Meta Start -->
                            <div class="post-item-meta">
                                <ul>
                                    <li><a href="#"><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</a></li>
                                </ul>
                            </div>
                            <!-- post Item Meta End -->

                            <!-- post Item Body Start -->
                            <div class="post-item-body">
                                <h2><a href="{{ route('activities-details', $activity->slug) }}">{{ $activity->translate('title') }}</a></h2>
                            </div>
                            <!-- Post Item Body End-->
 
                            <!-- Post Item Footer Start-->
                            <div class="post-item-footer">
                                <a href="{{ route('activities-details', $activity->slug) }}">{{ __('general.read_more') }}</a>
                            </div>
                            <!-- Post Item Footer End-->
                        </div>
                        <!-- post Item Content End -->
                    </div>
                    <!-- Blog Item End -->
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Post Pagination Start -->
                    <div class="post-pagination wow fadeInUp" data-wow-delay="0.75s">
                        {{ $activities->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Post Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Blog End -->
        
        
</x-landing.layout>