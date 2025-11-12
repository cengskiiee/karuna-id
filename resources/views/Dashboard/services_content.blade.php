<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

    <!-- Start Row -->
    <div class="row">


        <!-- Start Table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="my-3 fw-bold">Services Content Table</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#servicesModal" onclick="resetForm()">Add Service</button>
                        <!-- Container -->
                        <div class="d-flex align-items-center gap-3">
                            <!-- Sort Dropdown -->
                            <div class="dropdown">
                               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortButton" data-bs-toggle="dropdown" aria-expanded="false">
                                   Sortir  <i class="fas fa-sort"></i> 
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
                                   <option value="{{ $services->total() }}" {{ $perPage == $services->total() ? 'selected' : '' }}>All</option>
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
                                    <th>Judul @include('partials.flags.id-flag')</th>
                                    <th>Deskripsi @include('partials.flags.id-flag')</th>
                                    <th>Title @include('partials.flags.en-flag')</th>
                                    <th>Description @include('partials.flags.en-flag')</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><p>{{ $service->id_title }}</p></td>
                                    <td>
                                        <p class="data-table-text-justify">{!! Str::limit(strip_tags($service->id_description), 100) !!}</p>
                                    </td>
                                    <td><p>{{ $service->en_title }}</p></td>
                                    <td>
                                        <p class="data-table-text-justify">{!! Str::limit(strip_tags($service->en_description), 100) !!}</p>
                                    </td>
                                    <td>
                                        <img style="height: 150px; width: 200px; object-fit:cover" src="{{ asset('storage/' . $service->image) }}" alt="">
                                    </td>
                                    <td><p>{{ $service->category->en_service_category_title }}</p></td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a class="btn btn-primary btn-sm" title="Detail" onclick="showService('{{ $service->slug }}')">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm" title="Edit" onclick="editService('{{ $service->slug }}')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteService('{{ $service->slug }}')">
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
                        {{ $services->appends(['per_page' => $perPage, 'sort' => $sort])->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Table -->

        <!-- Modal -->
       <div class="col-lg-12">
        <div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="servicesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="servicesModalLabel">Add Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="servicesForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label for="id_title" class="mb-1">Judul @include('partials.flags.id-flag')</label>
                                    <input type="text" class="form-control" maxlength="355" name="id_title" id="id_title" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label class="mb-1">Deskripsi @include('partials.flags.id-flag')</label>
                                    <div id="id_description_editor" style="height: 300px;"></div>
                                    <input type="hidden" name="id_description" id="id_description">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label for="en_title" class="mb-1">Title @include('partials.flags.en-flag')</label>
                                    <input type="text" class="form-control" maxlength="355" name="en_title" id="en_title" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label class="mb-1">Description @include('partials.flags.en-flag')</label>
                                    <div id="en_description_editor" style="height: 300px;"></div>
                                    <input type="hidden" name="en_description" id="en_description">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label for="service_category_id" class="mb-1">Service Category</label>
                                    <select class="form-control" name="service_category_id" id="service_category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->en_service_category_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <div class="col-12 mb-1">
                                    <label for="formFile" class="form-label">Upload Gambar</label>
                                    <input class="form-control" type="file" id="formFile" name="image" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="col-12 mb-1">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none;">
                                    <p id="fileSize"></p>
                                    <p id="errorMessage" style="color: red; display: none;">Jenis file tidak valid. Silakan unggah file gambar (PNG, JPG, JPEG).</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small id="" class="upload-img-info form-text">Ukuran file gambar maksimum adalah 5 MB | Hanya jenis gambar PNG, JPG, dan JPEG yang diizinkan</small>
                                </div>
                            </div>
                            <input type="hidden" id="service_id" name="slug">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveButton" onclick="saveService()">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span class="button-text">Save changes</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
       </div>
        <!-- End Modal -->

    </div>
    <!-- end row -->

    @push('scripts')
    <script>

    var quillId, quillEn;

    $(document).ready(function() {
        quillId = new Quill('#id_description_editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    
                ]
            }
        });

        quillEn = new Quill('#en_description_editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                   
                ]
            }
        });
    });


    function resetForm() {
    $('#servicesModalLabel').text('Add Service');
    $('#servicesForm')[0].reset();
    $('#service_id').val('');
    $('#imagePreview').hide();
    quillId.setContents([]);
    quillEn.setContents([]);
}

    function saveService() {
        var $button = $('#saveButton');
        var $spinner = $button.find('.spinner-border');
        var $buttonText = $button.find('.button-text');

        // Disable the button and show spinner
        $button.prop('disabled', true);
        $spinner.removeClass('d-none');
        $buttonText.text('Saving...');

        var id = $('#service_id').val();
        var method = id ? 'PUT' : 'POST';
        var url = id ? '/services-content/' + id : '/services-content';

        var formData = new FormData($('#servicesForm')[0]);
        formData.set('id_description', quillId.root.innerHTML);
        formData.set('en_description', quillEn.root.innerHTML);

        if (id) {
            formData.append('_method', 'PUT');
        }

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Re-enable the button and hide spinner
                $button.prop('disabled', false);
                $spinner.addClass('d-none');
                $buttonText.text('Save changes');

                $('#servicesModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                // Re-enable the button and hide spinner
                $button.prop('disabled', false);
                $spinner.addClass('d-none');
                $buttonText.text('Save changes');

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        });
    }

    function editService(slug) {
        $.get('/services-content/' + slug, function(data) {
            $('#servicesModalLabel').text('Edit Service');
            $('#id_title').val(data.id_title);
            quillId.root.innerHTML = data.id_description;
            $('#en_title').val(data.en_title);
            quillEn.root.innerHTML = data.en_description;
            $('#service_category_id').val(data.service_category_id);
            $('#service_id').val(data.slug);
            $('#imagePreview').attr('src', '/storage/' + data.image).show();
            $('#servicesModal').modal('show');
        });
    }

    function showService(slug) {
        $.get('/services-content/' + slug, function(data) {
            Swal.fire({
                title: '<h3>Service Detail</h3>',
                icon: 'info',
                html: `
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/id-flag.png') }}" alt="Id Flag" class="me-1" height="24"></p>
                    <b>Judul:</b><br> ${data.id_title}<br><br>
                    <b>Deskripsi:</b><br> <div>${data.id_description}</div>
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/uk-flag.png') }}" alt="UK Flag" class="me-1" height="24"></p>
                    <b>Title:</b><br> ${data.en_title}<br><br>
                    <b>Description:</b><br> <div>${data.en_description}</div>
                    <b>Category:</b><br> <p>${data.category.en_service_category_title}</p>
                    <b>Gambar:</b><br><br> <img src="/storage/${data.image}" style="width: 100%;">
                `,
                customClass: { 
                    popup: 'large-sweetalert'
                }
            });
        });
    }

    function deleteService(slug) {
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
                    url: '/services-content/' + slug,
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

    // Pagination
    function updatePerPage() {
        const perPage = document.getElementById('perPage').value;
        window.location.href = `?per_page=${perPage}`;
    }

    // Sorting
    function updateSort(sort) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('sort', sort);
        window.location.search = urlParams.toString();
    }

    // Image preview
    $(document).ready(function() {
        $('#formFile').change(function() {
            previewImage(this);
        });
    });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).show();
            }
            
            reader.readAsDataURL(input.files[0]);
            
            // File size check
            var fileSize = input.files[0].size / 1024 / 1024; // in MB
            $('#fileSize').text('File size: ' + fileSize.toFixed(2) + ' MB');
            
            if (fileSize > 5) {
                $('#errorMessage').text('File size exceeds 5 MB').show();
            } else {
                $('#errorMessage').hide();
            }
        }
    }

    // Toggle information section
    $(document).ready(function() {
        $("#info-content-toggle").click(function() {
            $(".content-toggle").toggle();
        });
    });
    </script>
    @endpush

</x-dashboard.layout>