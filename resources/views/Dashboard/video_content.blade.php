<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

    <!-- Start Row -->
    <div class="row">

        <!-- Start Info -->
        <div class="col-lg-12">
            <div class="card" style="border-left: 5px solid blue; background-color: rgba(0, 0, 255, 0.1);">
                <div class="card-body">
                    <h3 id="info-content-toggle" style="cursor: pointer;"><i class="fa fa-info-circle"></i> Information</h3>
                    <p style="display: none;" class="card-title-desc font-size-16 content-toggle">
                        The <span class="fw-bold text-primary text-justify">Video Content</span> table is a tool designed to help you manage and customize the video displayed on the video page of website. This table allows you to add new video, edit existing ones, and remove those that are no longer needed.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Info -->

        <!-- Start Table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="my-3 fw-bold">Video Content Table</h4>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Button Add -->
                        <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#videoModal" onclick="resetForm()">Add Video</button>
                        <!-- Container -->
                       <div class="d-flex align-items-center gap-3">
                         <!-- Sort Dropdown -->
                         <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Sortir <i class="fas fa-sort"></i> 
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ request('sort') == 'desc' ? 'fw-bold text-primary' : '' }}" href="#" onclick="updateSort('desc')">Data Terbaru</a></li>
                                <li><a class="dropdown-item {{ request('sort') == 'asc' ? 'fw-bold text-primary' : '' }}" href="#" onclick="updateSort('asc')">Data Terlama</a></li>
                            </ul>
                        </div>
                         <!-- Pagin Dropdown -->
                         <div class="d-flex align-items-end mt-1 gap-1">
                            <label for="perPage">Show</label>
                            <select id="perPage" class="form-select" name="per_page" onchange="updatePerPage()">
                                <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                <option value="{{ $videos->total() }}" {{ $perPage == $videos->total() ? 'selected' : '' }}>All</option>
                            </select>
                            <label for="perPage">entries</label>
                        </div>
                       </div>
                    </div>
                    
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered dt-responsive nowrap">

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul Video @include('partials.flags.id-flag')</th>
                                    <th>Video Title @include('partials.flags.en-flag')</th>
                                    <th>Link Video</th>
                                    <th>Video Thumbnail/Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $videos as $video )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td style="width: 20%"><p>{{ $video->id_title }}</p></td>
                                    <td style="width: 20%"><p>{{ $video->en_title }}</p></td>
                                    
                                    <td><a href="{{ $video->link_video }}" target="_blank">{{ $video->link_video }}</a></td>
                                    <td>
                                        <img style="width: 100%;" src="{{ asset('storage/' . $video->image) }}" alt="">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a class="btn btn-primary btn-sm" title="Detail" onclick="showVideo('{{ $video->slug }}')">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm" title="Edit" onclick="editVideo('{{ $video->slug }}')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteVideo('{{ $video->slug }}')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination links -->
                    <div class="pagination-container mt-3">
                        {{ $videos->appends(['per_page' => $perPage, 'sort' => $sort])->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
        <!-- End Table -->

    <!-- Modal -->
   <div class="col-lg-12">
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Add Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="videoForm" enctype="multipart/form-data">
                        @csrf
                        <!-- Bahasa indonesia -->
                        <div class="mb-3">
                            <label for="id_title" class="form-label">Judul Video @include('partials.flags.id-flag')</label>
                            <input type="text" class="form-control" id="id_title" name="id_title" required>
                        </div>

                        <!-- English Lang -->
                        <div class="mb-3">
                            <label for="en_title" class="form-label">Video Title @include('partials.flags.en-flag')</label>
                            <input type="text" class="form-control" id="en_title" name="en_title" required>
                        </div>

                        <!-- Video Youtube Link-->
                        <div class="mb-3">
                            <label for="link_video" class="form-label">Link Video Youtube</label>
                            <input type="text" class="form-control" id="link_video" name="link_video" required>
                        </div>

                        <!-- Upload Image -->
                        <div class="mb-5 row">
                            <div class="mb-1">
                                <label for="formFile" class="form-label">Upload Thumbnail/Gambar Video</label>
                                <input class="form-control" type="file" id="formFile" name="image" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            <!-- Preview Image -->
                            <div class="mb-1">
                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none;">
                                <p id="fileSize"></p>
                                <p id="errorMessage" style="color: red; display: none;">Jenis file tidak valid. Silakan unggah file gambar (PNG, JPG, JPEG).</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small id="" class="upload-img-info form-text">Ukuran file gambar maksimum adalah 5 MB | Hanya jenis gambar PNG, JPG, dan JPEG yang diizinkan</small>
                                <div></div>
                            </div>
                        </div>

                        <input type="hidden" id="video_slug" name="video_slug">
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveVideo()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal -->

</div>
<!-- end Row -->

@push('scripts')

<script>
    function resetForm() {
        $('#videoModalLabel').text('Add Video');
        $('#videoForm')[0].reset();
        $('#video_slug').val('');
        $('#imagePreview').hide();
    }

    function saveVideo() {
        var slug = $('#video_slug').val();
        var method = slug ? 'POST' : 'POST';
        var url = slug ? '/video-content/' + slug + '?_method=PUT' : '/video-content';

        var formData = new FormData($('#videoForm')[0]);

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#videoModal').modal('hide');
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

    function editVideo(slug) {
        $.get('/video-content/' + slug, function(data) {
            $('#videoModalLabel').text('Edit Video');
            $('#video_slug').val(data.slug);
            $('#id_title').val(data.id_title);
            $('#en_title').val(data.en_title);
            $('#link_video').val(data.link_video);
            $('#imagePreview').attr('src', '/storage/' + data.image).show();
            $('#videoModal').modal('show');
        });
    }

    function showVideo(slug) {
        $.get('/video-content/' + slug, function(data) {
            Swal.fire({
                title: '<h3>Video Detail</h3>',
                icon: 'info',
                html: `
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/id-flag.png') }}" alt="Id Flag" class="me-1" height="24"></p>
                    <b>Judul Video:</b><br> ${data.id_title}<br><br>
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/uk-flag.png') }}" alt="UK Flag" class="me-1" height="24"></p>
                    <b>Video Title:</b><br> ${data.en_title}<br><br>
                    <b>Link Video Youtube:</b><br> <p>${data.link_video}</p>
                    <b>Gambar:</b><br><br> <img src="/storage/${data.image}" style="width: 100%;"><br><br>
                `,
                customClass: {
                    popup: 'large-sweetalert'
                }
            });
        });
    }

    function deleteVideo(slug) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/video-content/' + slug,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
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
        });
    }

    //pagin
    function updatePerPage() {
    const perPage = document.getElementById('perPage').value;
    window.location.href = `?per_page=${perPage}`;
    }
    //sort
    function updateSort(sort) {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('sort', sort);
    window.location.search = urlParams.toString();
    }
</script>

@endpush

</x-dashboard.layout>