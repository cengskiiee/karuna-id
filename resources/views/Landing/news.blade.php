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
                            <h1 class="text-anime-style-3" data-cursor="-opaque">{{ __('header.news') }}</h1>
                            <nav class="wow fadeInUp">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#news-start">{{ __('header.news') }}</a></li>
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
                    <h3 class="wow fadeInUp">{{ __('general.all_news') }}</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.all_news_desc') }}</h2>
                    <br>
                </div>
                <!-- Title End -->

                @foreach($news as $index => $newsItem)
                <div class="col-lg-3 col-md-3">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp" data-wow-delay="{{ $index * 0.2 }}s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="{{ route('news-details', $newsItem->slug) }}" class="image-anime">
                                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->translate('title') }}" class="card-image">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Content Start -->
                        <div class="post-item-content">
                            <!-- post Item Meta Start -->
                            <div class="post-item-meta">
                                <ul>
                                    <li><a href="#"><i class="fa-regular fa-user"></i> {{ $newsItem->author }}</a></li>
                                    <li><a href="#"><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($newsItem->news_date)->format('d M Y') }}</a></li>
                                </ul>
                            </div>
                            <!-- post Item Meta End -->

                            <!-- post Item Body Start -->
                            <div class="post-item-body">
                                <h2><a href="{{ route('news-details', $newsItem->slug) }}">{{ $newsItem->translate('title') }}</a></h2>
                            </div>
                            <!-- Post Item Body End-->

                            <!-- Post Item Footer Start-->
                            <div class="post-item-footer">
                                <a href="{{ route('news-details', $newsItem->slug) }}">{{ __('general.read_more') }}</a>
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
                        {{ $news->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Post Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Blog End -->
</x-landing.layout>