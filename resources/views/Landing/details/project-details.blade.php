<x-landing.layout>
    @section('title')
    {{ $title }}
    @endsection

    <!-- Page Project Single Start -->
    <div class="page-project-single">
        <div class="container">
            <!-- Section Title Start -->
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="wow fadeInUp" style="background-color: #fff;">{{ __('general.projects_details') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $project->translate('project_name') }}</h2>
                    </div>
                </div>
            </div>
            <!-- Section Title End -->

            <div class="row">
                <div class="col-lg-4">
                    <!-- Project Sidebar Start -->
                    <div class="project-sidebar" style="background-color: #fff;">
                        <div class="project-info-box wow fadeInUp" data-wow-delay="0.25s">
                            <div class="project-info-box-title">
                                <h3>{{ __('general.project_information') }}</h3>
                            </div>

                            <!-- Project Info Item Start -->
                            <div class="project-info-item">
                                <div class="icon-box">
                                    <img src="{{ asset('Assets/Landing/images/icon-service-benefit-3.svg') }}" alt="">
                                </div>
                                <div class="project-info-content">
                                    <h3>{{ __('general.project_name') }}</h3>
                                    <p>{{ $project->translate('project_name') }}</p>
                                </div>
                            </div>
                            <!-- Project Info Item End -->

                            <!-- Project Info Item Start -->
                            <div class="project-info-item">
                                <div class="icon-box">
                                    <img src="{{ asset('Assets/Landing/images/icon-project-info-1.svg') }}" alt="">
                                </div>
                                <div class="project-info-content">
                                    <h3>{{ __('general.project_date') }}</h3>
                                    <p>{{ $project->project_date }}</p>
                                </div>
                            </div>
                            <!-- Project Info Item End -->

                            <!-- Project Info Item Start -->
                            <div class="project-info-item">
                                <div class="icon-box">
                                    <img src="{{ asset('Assets/Landing/images/icon-project-info-4.svg') }}" alt="">
                                </div>
                                <div class="project-info-content">
                                    <h3>{{ __('general.client_company') }}</h3>
                                    <p>{{ $project->client_company }}</p>
                                </div>
                            </div>
                            <!-- Project Info Item End -->

                            <!-- Project Info Item Start -->
                            <div class="project-info-item">
                                <div class="icon-box">
                                    <img src="{{ asset('Assets/Landing/images/icon-project-info-5.svg') }}" alt="">
                                </div>
                                <div class="project-info-content">
                                    <h3>{{ __('general.project_location') }}</h3>
                                    <p>{{ $project->location_address }}</p>
                                </div>
                            </div>
                            <!-- Project Info Item End -->
                        </div>
                    </div>
                    <!-- Project Sidebar End -->
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <!-- Project Single Slider Start -->
                        <div class="col-lg-12">
                            <div class="service-why-choose-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->translate('project_name') }}">
                                </figure>
                            </div>
                        </div>
                        <!-- Project Single Slider End -->
                    </div>

                    <br>
                    <!-- Project Single Content Start -->
                    <div class="project-single-content">
                        <!-- Project Meta Start -->
                        <div class="project-meta">
                            <h3 class="text-anime-style-3">{{ __('general.about_the_project') }}</h3>
                            <p class="wow fadeInUp" style="text-align: justify; line-height: 30px; color: #0e0d1b;">
                                {!! $project->translate('description') !!}
                            </p>
                        </div>
                        <!-- Project Meta End -->
                    </div>
                    <!-- Project Single Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Project Single End -->

    <!-- Other Projects Section -->
    <div class="our-projects" id="our-projects">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.other_projects') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.discover_more_projects_details') }}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row project-item-boxes">
                        @foreach($otherProjects as $otherProject)
                        <div class="col-lg-4 col-md-6 project-item-box">
                            <!-- Project Item Start -->
                            <div class="project-item">
                                <div class="project-image" data-cursor-text="View">
                                    <a href="{{ route('project-details', $otherProject->slug) }}">
                                        <figure>
                                            <img src="{{ asset('storage/' . $otherProject->image) }}" alt="{{ $otherProject->translate('project_name') }}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="project-content">
                                    <h3>{{ $otherProject->translate('project_name') }}</h3>
                                    <div class="project-readmore-btn">
                                        <a href="{{ route('project-details', $otherProject->slug) }}" class="btn-default btn-highlighted">{{ __('general.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Project Item End -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects Page End -->
</x-landing.layout>