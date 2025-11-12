<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

    <!-- Start Row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="border-left: 5px solid blue; background-color: rgba(0, 0, 255, 0.1);">
                <div class="card-body">
                    <h3 id="info-content-toggle" style="cursor: pointer;"><i class="fa fa-info-circle"></i> Information</h3>
                    <p style="display: none;" class="card-title-desc font-size-16 content-toggle">
                        The <span class="fw-bold text-primary text-justify">About Content </span>menu provides a user-friendly interface for managing and updating the content on the "About" page of website. This section allows you to edit essential information and visuals that tell your story, highlight your strengths, explain your processes, and showcase your achievements. The Content Management offers four main features: <span class=" fw-bold text-primary">About Us</span>, <span class="fw-bold text-primary">Why Choose Us </span>, <span class="fw-bold text-primary"> How It Works </span>, <span class="fw-bold text-primary"> Experiences and Rating. </span>
                    </p>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-4 ps-2 fw-bold text-center">About Content</h4>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home2"
                                role="tab">About Us / Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab">Why Choose Us / <span class="font-size-12">Kenapa Pilih Kami</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2"
                                role="tab">How It Work / <span class="font-size-12">Bagaimana Cara Kerjanya</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings2"
                                role="tab">Experiences and Rating / <span class="font-size-12">Pengalaman dan Peringkat </span></a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Content About Us - CMS  -->
                        <div class="tab-pane active p-3 mt-3" id="home2" role="tabpanel">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Judul Konten @include('partials.flags.id-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $about_us->id_title }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Deskripsi @include('partials.flags.id-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p class="text-justify">{{ $about_us->id_description }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Content Title @include('partials.flags.en-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $about_us->en_title }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Description @include('partials.flags.en-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $about_us->en_description }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Gambar 1</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <img src="{{ asset('storage/' . $about_us->image_1) }}" style="width: 100%;max-width: 300px; height: auto;" alt="img-1">
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                      <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Gambar 2</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <img src="{{ asset('storage/' . $about_us->image_2) }}" style="width: 100%;max-width: 300px; height: auto;" alt="img-2">
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                      <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Video Link </h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <a href="{{ $about_us->link_video }}" target="_blank">{{ $about_us->link_video }}</a>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Thumbnail/Gambar Video</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <div class="intro-video-box" data-cursor-text="Play">
                                                <!-- Video Image Start -->
                                                <div class="video-image">
                                                    
                                                        <figure class="image-anime">
                                                            <img src="{{ asset('storage/' . $about_us->image_bg) }}" style="width: 100%;max-width: 600px; height: auto;" alt="img-bg">
                                                        </figure>
                                                </div>
                                                <!-- Video Image End -->
                                            </div>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     <!-- Start BTN Edit -->
                                    <div class="row my-8">
                                        <div class="col-lg-12 col-sm-12 text-center">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#aboutUsModal" class="btn btn-warning waves-effect waves-light px-4 py-2">
                                                <i class="fas fa-pencil-alt"></i> Edit About Us
                                            </button>
                                        </div>
                                    </div>
                                     <!-- End BTN Edit -->


                                </div>
                            </div>
                             <!-- Start Modal About Us -->

                             <!-- Modal untuk pengeditan About Us -->
                            <div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="aboutUsModalLabel">Edit About Us / Tentang Kami</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="aboutUsForm" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <!-- Indo Lang-->
                                                <div class="mb-3 row">
                                                    <label for="id_title" class="mb-1">Judul Konten @include('partials.flags.id-flag')</label>
                                                    <input type="text" class="form-control" id="id_title" name="id_title" value="{{ $about_us->id_title }}">
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="id_description" class="mb-1">Deskripsi @include('partials.flags.id-flag')</label>
                                                    <textarea class="form-control" id="id_description" name="id_description" rows="6">{{ $about_us->id_description }}</textarea>
                                                </div>
                                                <!-- English Lang-->
                                                <div class="mb-3 row">
                                                    <label for="en_title" class="mb-1">Content Title @include('partials.flags.en-flag')</label>
                                                    <input type="text" class="form-control" id="en_title" name="en_title" value="{{ $about_us->en_title }}">
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="en_description" class="mb-1">Content Description @include('partials.flags.en-flag')</label>
                                                    <textarea class="form-control" id="en_description" name="en_description" rows="6">{{ $about_us->en_description }}</textarea>
                                                </div>
                                                <!-- Image 1 -->
                                                <div class="mb-3 row">
                                                    <label for="image_1" class="mb-1">Gambar 1</label>
                                                    <input type="file" class="form-control" id="image_1" name="image_1" accept="image/png, image/jpeg, image/jpg">
                                                </div>
                                                <!-- Preview Image 1 -->
                                                <div class="mb-1">
                                                    <img id="imagePreview1" style="width: 150px; height: 150px" src="#" alt="Image Preview">
                                                    <p id="fileSize"></p>
                                                    <p id="errorMessage" style="color: red; display: none;">Jenis file tidak valid. Silakan unggah file gambar (PNG, JPG, JPEG).</p>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <small id="" class="upload-img-info form-text">Ukuran file gambar maksimum adalah 5 MB | Hanya jenis gambar PNG, JPG, dan JPEG yang diizinkan</small>
                                                    <div></div>
                                                </div>
                                                <!-- End Preview Image 1-->

                                                <!-- Image 1-->
                                                <div class="mb-3 row">
                                                    <label for="image_2" class="mb-1">Gambar 2</label>
                                                    <input type="file" class="form-control" id="image_2" name="image_2" accept="image/png, image/jpeg, image/jpg">
                                                </div>
                                                <!-- Preview Image 2 -->
                                                <div class="mb-1">
                                                    <img id="imagePreview2" style="width: 150px; height: 150px" src="#" alt="Image Preview">
                                                    <p id="fileSize2"></p>
                                                    <p id="errorMessage2" style="color: red; display: none;">Jenis file tidak valid. Silakan unggah file gambar (PNG, JPG, JPEG).</p>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <small id="" class="upload-img-info form-text">Ukuran file gambar maksimum adalah 5 MB | Hanya jenis gambar PNG, JPG, dan JPEG yang diizinkan</small>
                                                    <div></div>
                                                </div>
                                                <!-- End Preview Image 2-->

                                                <!-- Link Video-->
                                                <div class="mb-3 row">
                                                    <label for="link_video" class="mb-1">Link Video</label>
                                                    <input type="text" class="form-control" id="link_video" name="link_video" value="{{ $about_us->link_video }}">
                                                </div>
                                                <!-- Image Bg-->
                                                <div class="mb-3 row">
                                                    <label for="image_bg" class="mb-1">Thumbnail/Gambar Video</label>
                                                    <input type="file" class="form-control" id="image_bg" name="image_bg" accept="image/png, image/jpeg, image/jpg">
                                                </div>
                                                <!-- Preview Image Bg -->
                                                <div class="mb-1">
                                                    <img id="imagePreviewBg" style="width: 100%;max-width: 600px; height: auto;" src="#" alt="Image Preview">
                                                    <p id="fileSizeBg"></p>
                                                    <p id="errorMessageBg" style="color: red; display: none;">Jenis file tidak valid. Silakan unggah file gambar (PNG, JPG, JPEG).</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <small id="" class="upload-img-info form-text">Ukuran file gambar maksimum adalah 5 MB | Hanya jenis gambar PNG, JPG, dan JPEG yang diizinkan</small>
                                                    <div></div>
                                                </div>
                                                <!-- End Preview Image Bg-->
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="saveAboutUs()">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal About Us -->
                        </div>
                        <!-- End of Content About Us - CMS  -->


                        <!-- Content Why Choose Us - CMS  -->
                        <div class="tab-pane p-3 mt-3" id="profile2" role="tabpanel">
                             <div class="card">
                                <div class="card-body">

                                     <!-- Start data -->
                                     <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Judul Konten @include('partials.flags.id-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $why_us->id_title }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Deskripsi @include('partials.flags.id-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p class="text-justify">{{ $why_us->id_description }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Content Title @include('partials.flags.en-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $why_us->en_title }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Description @include('partials.flags.en-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $why_us->en_description }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Gambar 1</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <img src="{{ asset('storage/' . $why_us->image_why_1) }}" style="width: 100%;max-width: 300px; height: auto;" alt="img-1">
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                      <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Gambar 2</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <img src="{{ asset('storage/' . $why_us->image_why_2) }}" style="width: 100%;max-width: 300px; height: auto;" alt="img-2">
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     <!-- Start BTN Edit -->
                                     <div class="row my-8">
                                        <div class="col-lg-12 col-sm-12 text-center">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#whyUsModal" class="btn btn-warning waves-effect waves-light px-4 py-2">
                                                <i class="fas fa-pencil-alt"></i> Edit Why Choose Us
                                            </button>
                                        </div>
                                    </div>
                                     <!-- End of BTN Edit -->

                                </div>
                            </div>
                            
                              <!-- Modal Edit Why Us -->
                              <div class="modal fade" id="whyUsModal" tabindex="-1" aria-labelledby="whyUsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="whyUsModalLabel">Edit Why Choose Us / Kenapa Pilih Kami</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="whyUsForm" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <!-- Indo Lang-->
                                                <div class="mb-3 row">
                                                    <label for="id_title" class="mb-1">Judul Konten @include('partials.flags.id-flag')</label>
                                                    <input type="text" class="form-control" id="id_title" name="id_title" value="{{ $why_us->id_title }}">
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="id_description" class="mb-1">Deskripsi @include('partials.flags.id-flag')</label>
                                                    <textarea class="form-control" id="id_description" name="id_description" rows="6">{{ $why_us->id_description }}</textarea>
                                                </div>
                                                <!-- English Lang-->
                                                <div class="mb-3 row">
                                                    <label for="en_title" class="mb-1">Content Title @include('partials.flags.en-flag')</label>
                                                    <input type="text" class="form-control" id="en_title" name="en_title" value="{{ $why_us->en_title }}">
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="en_description" class="mb-1">Content Description @include('partials.flags.en-flag')</label>
                                                    <textarea class="form-control" id="en_description" name="en_description" rows="6">{{ $why_us->en_description }}</textarea>
                                                </div>
                                                <!-- Image 1 -->
                                                <div class="mb-3 row">
                                                    <label for="image_why_1" class="mb-1">Gambar 1</label>
                                                    <input type="file" class="form-control" id="image_why_1" name="image_why_1" accept="image/png, image/jpeg, image/jpg">
                                                </div>
                                                <!-- Preview Image 1 -->
                                                <div class="mb-1">
                                                    <img id="imagePreviewWhy1" style="width: 150px; height: 150px; object-fit:cover;" src="#" alt="Image Preview">
                                                    <p id="fileSizeWhy"></p>
                                                    <p id="errorMessageWhy" style="color: red; display: none;">Jenis file tidak valid. Silakan unggah file gambar (PNG, JPG, JPEG).</p>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <small id="" class="upload-img-info form-text">Ukuran file gambar maksimum adalah 5 MB | Hanya jenis gambar PNG, JPG, dan JPEG yang diizinkan</small>
                                                    <div></div>
                                                </div>
                                                <!-- End Preview Image 1-->

                                                <!-- Image 1-->
                                                <div class="mb-3 row">
                                                    <label for="image_why_2" class="mb-1">Gambar 2</label>
                                                    <input type="file" class="form-control" id="image_why_2" name="image_why_2" accept="image/png, image/jpeg, image/jpg">
                                                </div>
                                                <!-- Preview Image 2 -->
                                                <div class="mb-1">
                                                    <img id="imagePreviewWhy2" style="width: 150px; height: 150px; object-fit:cover;" src="#" alt="Image Preview">
                                                    <p id="fileSizeWhy2"></p>
                                                    <p id="errorMessageWhy2" style="color: red; display: none;">Jenis file tidak valid. Silakan unggah file gambar (PNG, JPG, JPEG).</p>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <small id="" class="upload-img-info form-text">Ukuran file gambar maksimum adalah 5 MB | Hanya jenis gambar PNG, JPG, dan JPEG yang diizinkan</small>
                                                    <div></div>
                                                </div>
                                                <!-- End Preview Image 2-->

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="saveWhyUs()">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <!--End  Modal Edit Why Us -->

                        </div>
                        <!-- End of Content Why Us - CMS  -->



                        <!-- Content How it Work - CMS  -->
                        <div class="tab-pane p-3 mt-3" id="messages2" role="tabpanel">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Judul @include('partials.flags.id-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $how_work->id_title }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Deskripsi @include('partials.flags.id-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $how_work->id_description }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                      <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Title @include('partials.flags.en-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $how_work->en_title }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Description @include('partials.flags.en-flag')</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $how_work->en_description }}</p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     

                                    <div class="row my-8">
                                        <div class="col-lg-12 col-sm-12 text-center">
                                            <button type="button" data-bs-toggle="modal" data-bs-target=".bs-how-it-work-modal-xl" class="btn btn-warning waves-effect waves-light px-4 py-2"><i class="fas fa-pencil-alt"></i> Edit Content</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Modal Edit How It Work  -->
                        <div class="modal fade bs-how-it-work-modal-xl" tabindex="-1" role="dialog"
                        aria-labelledby="howItWorkModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="howItWorkModalLabel">Edit How It Works / Bagaimana Cara Kerjanya</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="howItWorkForm" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!-- Indo Lang-->
                                        <div class="mb-3 row">
                                            <label for="id_title" class="mb-1">Judul @include('partials.flags.id-flag')</label>
                                            <input type="text" class="form-control" id="id_title" name="id_title" value="{{ $how_work->id_title }}">
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="id_description" class="mb-1">Deskripsi @include('partials.flags.id-flag')</label>
                                            <textarea class="form-control" id="id_description" name="id_description" rows="6">{{ $how_work->id_description }}</textarea>
                                        </div>
                                        <!-- English Lang-->
                                        <div class="mb-3 row">
                                            <label for="en_title" class="mb-1">Title @include('partials.flags.en-flag')</label>
                                            <input type="text" class="form-control" id="en_title" name="en_title" value="{{ $how_work->en_title }}">
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="en_description" class="mb-1">Description @include('partials.flags.en-flag')</label>
                                            <textarea class="form-control" id="en_description" name="en_description" rows="6">{{ $how_work->en_description }}</textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="saveHowItWork()">Save changes</button>
                                </div>
                            </div>
                        </div>
                        </div>
                             <!-- End of Modal Edit How It Work  -->
                        </div>
                        <!-- End of Content How it Work - CMS  -->

                        <!-- Content Experiences and Rating - CMS  -->
                        <div class="tab-pane p-3 mt-3" id="settings2" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Total Years Experience</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $year_exp->years_experience }} <span>+</span></p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Total Projects Completed</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $year_exp->projects_completed }} <span>+</span></p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     
                                     <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Total Satisfied Client</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $year_exp->satisfied_client }} <span>+</span></p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                     <!-- Start data -->
                                    <div class="mb-5 row">
                                        <div class="col-lg-2 col-sm-2">
                                            <h6>Total Rating</h6>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-lg-9 col-sm-8">
                                            <p>{{ $year_exp->total_rating }} <span>+</span></p>
                                        </div>
                                    </div>
                                     <!-- End Data -->

                                    
                                    <div class="row my-8">
                                        <div class="col-lg-12 col-sm-12 text-center">
                                            <button type="button" data-bs-toggle="modal" data-bs-target=".bs-exp-rating-modal-xl" class="btn btn-warning waves-effect waves-light px-4 py-2"><i class="fas fa-pencil-alt"></i> Edit Content</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit Experiences and Ratings  -->
<div class="modal fade bs-exp-rating-modal-xl" tabindex="-1" role="dialog" aria-labelledby="expRatingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="expRatingsModalLabel">Edit Experiences and Ratings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="yearExperiencesForm">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <!-- experiences -->
                            <div class="mb-3 row">
                                <label for="years_experience" class="col-sm-2 col-form-label">Total Experiences</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="years_experience" name="years_experience" value="{{ $year_exp->years_experience }}">
                                </div>
                            </div>

                            <!-- projects completed -->
                            <div class="mb-3 row">
                                <label for="projects_completed" class="col-sm-2 col-form-label">Total Projects Completed</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="projects_completed" name="projects_completed" value="{{ $year_exp->projects_completed }}">
                                </div>
                            </div>

                            <!-- satisfied client -->
                            <div class="mb-3 row">
                                <label for="satisfied_client" class="col-sm-2 col-form-label">Total Satisfied Client</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="satisfied_client" name="satisfied_client" value="{{ $year_exp->satisfied_client }}">
                                </div>
                            </div>

                            <!-- ratings -->
                            <div class="mb-3 row">
                                <label for="total_rating" class="col-sm-2 col-form-label">Total Ratings</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" step="0.1" id="total_rating" name="total_rating" value="{{ $year_exp->total_rating }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="saveYearExperiences()">Save changes</button>
            </div>
        </div>
    </div>
</div>
                                        <!--End of Modal Edit Experiences and Ratings  -->

                        </div>

                        </div>
                        <!-- End of Content Experiences and Rating - CMS  -->

                    </div>

                </div>
            </div>
        </div>
    </div>


    
    @push('scripts')
    {{-- script faq --}}
    <script>
    function saveAboutUs() {
        var formData = new FormData($('#aboutUsForm')[0]);
        $.ajax({
            url: '{{ route("about-us.update") }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#aboutUsModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        });
    }

    function saveWhyUs() {
        var formData = new FormData($('#whyUsForm')[0]);
        $.ajax({
            url: '{{ route("why-us.update") }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#whyUsModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        });
    }

    function saveHowItWork() {
    var formData = new FormData($('#howItWorkForm')[0]);
    $.ajax({
        url: '{{ route("how-it-work.update") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('.bs-how-it-work-modal-xl').modal('hide');
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.success,
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        }
    });
}


function saveYearExperiences() {
    var formData = new FormData($('#yearExperiencesForm')[0]);
    $.ajax({
        url: '{{ route("year-exp.update") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('.bs-exp-rating-modal-xl').modal('hide');
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.success,
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        }
    });
}

    $(document).ready(function() {

    $('#aboutUsModal').on('show.bs.modal', function() {
        $('#id_title').val('{{ $about_us->id_title }}');
        $('#id_description').val('{{ $about_us->id_description }}');
        $('#link_video').val('{{ $about_us->link_video }}');
        // Display existing images
        $('#imagePreview1').attr('src', '{{ asset('storage/' . $about_us->image_1) }}').show();
        $('#imagePreview2').attr('src', '{{ asset('storage/' . $about_us->image_2) }}').show();
        $('#imagePreviewBg').attr('src', '{{ asset('storage/' . $about_us->image_bg) }}').show();
    });

    $('#whyUsModal').on('show.bs.modal', function() {
        $('#id_title').val('{{ $why_us->id_title }}');
        $('#id_description').val('{{ $why_us->id_description }}');
        // Display existing images
        $('#imagePreviewWhy1').attr('src', '{{ asset('storage/' . $why_us->image_why_1) }}').show();
        $('#imagePreviewWhy2').attr('src', '{{ asset('storage/' . $why_us->image_why_2) }}').show();
    });

    $('.bs-how-it-work-modal-xl').on('show.bs.modal', function() {
        $('#id_title').val('{{ $how_work->id_title }}');
        $('#id_description').val('{{ $how_work->id_description }}');
        $('#en_title').val('{{ $how_work->en_title }}');
        $('#en_description').val('{{ $how_work->en_description }}');
    });

    $('.bs-exp-rating-modal-xl').on('show.bs.modal', function() {
        $('#years_experience').val('{{ $year_exp->years_experience }}');
        $('#projects_completed').val('{{ $year_exp->projects_completed }}');
        $('#satisfied_client').val('{{ $year_exp->satisfied_client }}');
        $('#total_rating').val('{{ $year_exp->total_rating }}');
    });

    // Preview images About
    $('#image_1').change(function() {
        previewImage(this, '#imagePreview1', '#fileSize', '#errorMessage');
    });
    $('#image_2').change(function() {
        previewImage(this, '#imagePreview2', '#fileSize2', '#errorMessage2');
    });
    $('#image_bg').change(function() {
        previewImage(this, '#imagePreviewBg', '#fileSizeBg', '#errorMessageBg');
    });

    // Preview images Why
    $('#image_why_1').change(function() {
        previewImage(this, '#imagePreviewWhy1', '#fileSizeWhy', '#errorMessageWhy');
    });
    $('#image_why_2').change(function() {
        previewImage(this, '#imagePreviewWhy2', '#fileSizeWhy2', '#errorMessageWhy2');
    });
    

    // image Preview Function
    function previewImage(input, imagePreviewSelector, fileSizeSelector, errorMessageSelector) {
        var file = input.files[0];
        if (file) {
            var fileType = file.type;
            var validImageTypes = ["image/jpeg", "image/jpg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                // If the file type is invalid
                $(errorMessageSelector).show();
                $(fileSizeSelector).hide();
                $(imagePreviewSelector).hide();
            } else {
                // If the file type is valid
                $(errorMessageSelector).hide();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(imagePreviewSelector).attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);

                // Show file size
                var fileSize = (file.size / 1024 / 1024).toFixed(2); // Dalam MB
                $(fileSizeSelector).text('Ukuran file: ' + fileSize + ' MB').show();

                // File size validation
                if (file.size > 5242880) { // 5 MB
                    $(errorMessageSelector).text('Ukuran file melebihi batas 5 MB.').show();
                    $(imagePreviewSelector).hide();
                }
            }
        }
    }
});
    </script>
    @endpush


</x-dashboard.layout>

