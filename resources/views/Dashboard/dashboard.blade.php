<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection
    
        <!-- card row -->
        <div class="row">

        <!-- Card Section -->
            <!-- Card Total Count Services -->
            <div class="col-md-4 col-xl-4">
                <a href="{{ route('services-content') }}">
                    <div class="card card-custom-hov text-center border-start border-info border-5">
                        <div class="mb-2 card-body text-muted">
                            Total Services / Pelayanan<h3 class="text-info mt-2">{{ $totalServices }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Total Count Projects -->
            <div class="col-md-4 col-xl-4">
                <a href="{{ route('projects-content') }}">
                    <div class="card card-custom-hov text-center border-start border-purple border-5">
                        <div class="mb-2 card-body text-muted">
                            Total Projects / Proyek<h3 class="text-purple mt-2">{{ $totalProjects }}</h3>
                        </div>
                    </div>
                </a>
            </div> 
            <!-- Card Total Count News -->
            <div class="col-md-4 col-xl-4">
                <a href="{{ route('news-content') }}">
                    <div class="card card-custom-hov text-center border-start border-success border-5">
                        <div class="mb-2 card-body text-muted">
                            Total News / Berita<h3 class="text-success mt-2">{{ $totalNews }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Total Count Videos -->
            <div class="col-md-4 col-xl-4">
                <a href="{{ route('video-content') }}">
                    <div class="card card-custom-hov text-center border-start border-primary border-5">
                        <div class="mb-2 card-body text-muted">
                            Total Videos<h3 class="text-primary mt-2">{{ $totalVideos }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Total Count Activities -->
            <div class="col-md-4 col-xl-4">
                <div class="card card-custom-hov text-center border-start border-danger border-5">
                    <div class="mb-2 card-body text-muted">
                        Total Activities / Kegiatan<h3 class="text-danger mt-2">{{ $totalActivities }}</h3>
                    </div> 
                </div>
            </div>
            <!-- Card Total Count Education -->
            <div class="col-md-4 col-xl-4">
                <div class="card card-custom-hov text-center border-start border-warning border-5">
                    <div class="mb-2 card-body text-muted">
                        Total Education / Edukasi<h3 class="text-warning mt-2">{{ $totalEducation }}</h3>
                    </div>
                </div>
            </div>

            <!-- Welcome Section -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Welcome to the Hadiwana Tirta Lestari Dashboard !
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p>This platform is designed to help you efficiently manage and organize all the data related to our conservation efforts and initiatives. Whether you are updating content, deleting content, or overseeing projects, you have all the tools you need at your fingertips.</p>
                            <footer class="blockquote-footer font-size-12">Hadiwana
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>

       
        </div>
        <!-- end card row -->



</x-dashboard.layout>
 
