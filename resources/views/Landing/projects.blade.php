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
						<h1 class="text-anime-style-3" data-cursor="-opaque">{{ __('header.projects') }}</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page"><a href="#our-projects">{{ __('header.projects') }}</a></li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    


      <!-- Projects Page Start -->
    <div class="our-projects" id="our-projects">
        <div class="container">
            <div class="row">
                <!-- Title start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">{{ __('general.all_projects') }}</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.all_projects_desc') }}</h2>
                </div>
                <div class="col-lg-12">
                    <!-- Project Item Box start -->
                    <div class="row project-item-boxes">
                        @foreach($projects as $project)
                        <div class="col-lg-4 col-md-6 project-item-box">
                            <!-- Project Item Start -->
                            <div class="project-item">
                                <div class="project-image" data-cursor-text="View">
                                    <a href="{{ route('project-details', $project->slug) }}">
                                        <figure>
                                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->translate('project_name') }}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="project-content">
                                    <h3>{{ $project->translate('project_name') }}</h3>
                                    <div class="project-readmore-btn">
                                        <a href="{{ route('project-details', $project->slug) }}" class="btn-default btn-highlighted">{{ __('general.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Project Item End -->
                        </div>
                        @endforeach
                    </div>
                    <!-- Project Item Box End -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Post Pagination Start -->
                    <div class="post-pagination wow fadeInUp" data-wow-delay="0.75s">
                        {{ $projects->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Post Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Projects Page End -->


</x-landing.layout>