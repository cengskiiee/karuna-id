<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

<!-- Start Row -->
<div class="row">

        <!-- Start Info -->
        {{-- <div class="col-lg-12">
            <div class="card" style="border-left: 5px solid blue; background-color: rgba(0, 0, 255, 0.1);">
                <div class="card-body">
                    <h3 id="info-content-toggle" style="cursor: pointer;"><i class="fa fa-info-circle"></i> Information</h3>
                    <p style="display: none;" class="card-title-desc font-size-16 content-toggle">
                        The <span class="fw-bold text-primary text-justify">News Content</span> table is a tool designed to help you manage and customize the projects displayed on the home page of website. This table allows you to add new projects, edit existing ones, and remove those that are no longer needed.
                    </p>
                </div>
            </div>
        </div> --}}
        <!-- End Info -->


        <!-- Start Table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="my-3 fw-bold">Projects Content Table</h4>


                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Button Add -->
                        <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#projectModal" onclick="resetForm()">Add Project</button>
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
                               <option value="{{ $projects->total() }}" {{ $perPage == $projects->total() ? 'selected' : '' }}>All</option>
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
                                    <th>Nama Proyek @include('partials.flags.id-flag')</th>
                                    <th>Deskripsi @include('partials.flags.id-flag')</th>
                                    <th>Project Name @include('partials.flags.en-flag')</th>
                                    <th>Description @include('partials.flags.en-flag')</th>
                                    <th>Gambar</th>
                                    <th>Lokasi/Alamat</th>
                                    <th>Tanggal Proyek</th>
                                    <th>Klien / Perusahaan</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach ( $projects as $project )
                                    
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><p>{{ $project->id_project_name }}</p></td>
                                    <td>
                                        <p class="data-table-text-justify">{!! Str::limit(strip_tags($project->id_description), 100, '...') !!}</p>
                                    </td>
                                    <td><p>{{ $project->en_project_name }}</p></td>
                                    <td>
                                        <p class="data-table-text-justify">{!! Str::limit(strip_tags($project->en_description), 100, '...') !!}</p>
                                    </td>
                                    <td>
                                        <img style="height: 150px; width: 200px; object-fit:cover" src="{{ asset('storage/' . $project->image) }}" alt="">
                                    </td>
                                    <td><p>{{ $project->location_address }}</p></td>
                                    <td><p>{{ $project->formatted_date }}</p></td>
                                    <td>
                                        <p>{{ $project->client_company }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a class="btn btn-primary btn-sm" title="Detail" onclick="showProject('{{ $project->slug }}')">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm" title="Edit" onclick="editProject('{{ $project->slug }}')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteProject('{{ $project->slug }}')">
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
                        {{ $projects->appends(['per_page' => $perPage])->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
        <!-- End Table -->


        <?php $today = date('Y-m-d'); ?>
        <!-- Modal -->
   <div class="col-lg-12">
    <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Add Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="projectForm" enctype="multipart/form-data">
                        @csrf
                        <!-- Bahasa indonesia -->
                        <div class="mb-3">
                            <label for="id_project_name" class="form-label">Nama Proyek @include('partials.flags.id-flag')</label>
                            <input type="text" class="form-control" id="id_project_name" name="id_project_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_description" class="form-label">Deskripsi @include('partials.flags.id-flag')</label>
                            <div id="id_description_editor" style="height: 300px;"></div>
                            <input type="hidden" id="id_description" name="id_description">
                        </div>

                        <!-- English Lang -->
                        <div class="mb-3">
                            <label for="en_project_name" class="form-label">Project Name @include('partials.flags.en-flag')</label>
                            <input type="text" class="form-control" id="en_project_name" name="en_project_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="en_description" class="form-label">Description @include('partials.flags.en-flag')</label>
                            <div id="en_description_editor" style="height: 300px;"></div>
                            <input type="hidden" id="en_description" name="en_description">
                        </div>


                        <!-- Upload Image -->
                        <div class="mb-5 row">
                            <div class="mb-1">
                                <label for="formFile" class="form-label">Upload Gambar</label>
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

                        <!-- Project Location -->
                        <div class="mb-3">
                            <label for="location_address" class="form-label">Lokasi / Alamat</label>
                            <input type="text" class="form-control" id="location_address" name="location_address" required>
                        </div>

                        <!-- Project Date -->
                        <div class="mb-3 row">
                            <label for="project_date" class="form-label">Tanggal Proyek</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="project_date" value="{{ old('project_date', $today) }}" >
                            </div>
                        </div>

                        <!-- Client /Company -->
                        <div class="mb-3">
                            <label for="client_company" class="form-label">Nama Klien / Perusahaan</label>
                            <input type="text" class="form-control" id="client_company" name="client_company" required>
                        </div>
 

                        <input type="hidden" id="project_id" name="slug">
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveButton" onclick="saveProject()">
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

        // Image preview functionality
        $('#formFile').change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#imagePreview').attr('src', event.target.result).show();
                }
                reader.readAsDataURL(file);
                
                // Display file size
                const fileSize = (file.size / 1024 / 1024).toFixed(2); // in MB
                $('#fileSize').text(`File size: ${fileSize} MB`);
                
                // Validate file type
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    $('#errorMessage').show();
                } else {
                    $('#errorMessage').hide();
                }
            }
        });
    });

    function resetForm() {
        $('#projectModalLabel').text('Add Project');
        $('#projectForm')[0].reset();
        $('#project_id').val('');
        $('#imagePreview').hide();
        $('#fileSize').text('');
        $('#errorMessage').hide();
        quillId.setContents([]);
        quillEn.setContents([]);
    }

    function saveProject() {
    var $button = $('#saveButton');
    var $spinner = $button.find('.spinner-border');
    var $buttonText = $button.find('.button-text');

    // Disable the button and show spinner
    $button.prop('disabled', true);
    $spinner.removeClass('d-none');
    $buttonText.text('Saving...');

    var slug = $('#project_id').val();
    var url = slug ? `/projects-content/${slug}` : '/projects-content';
    var method = slug ? 'PUT' : 'POST';

    var formData = new FormData($('#projectForm')[0]);
    formData.set('id_description', quillId.root.innerHTML);
    formData.set('en_description', quillEn.root.innerHTML);

    if (method === 'PUT') {
        formData.append('_method', 'PUT');
    }

    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Re-enable the button and hide spinner
            $button.prop('disabled', false);
            $spinner.addClass('d-none');
            $buttonText.text('Save changes');

            $('#projectModal').modal('hide');
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

            let errors = xhr.responseJSON.errors;
            let errorMessage = '';
            for (let field in errors) {
                errorMessage += `${errors[field].join('<br>')}<br>`;
            }
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: errorMessage || 'Something went wrong!',
            });
        }
    });
}

function editProject(slug) {
    $.get(`/projects-content/${slug}`, function(data) {
        $('#projectModalLabel').text('Edit Project');
        $('#project_id').val(data.slug);
        $('#id_project_name').val(data.id_project_name);
        quillId.root.innerHTML = data.id_description;
        $('#en_project_name').val(data.en_project_name);
        quillEn.root.innerHTML = data.en_description;
        $('#imagePreview').attr('src', `/storage/${data.image}`).show();
        $('#location_address').val(data.location_address);
        $('#project_date').val(data.project_date);
        $('#client_company').val(data.client_company);
        $('#projectModal').modal('show');
    });
}

function showProject(slug) {
    $.get(`/projects-content/${slug}`, function(data) {
        Swal.fire({
            title: '<h3>Project Detail</h3>',
            icon: 'info',
            html: `
                <p><img src="{{ asset('Assets/Dashboard/images/flags/id-flag.png') }}" alt="Id Flag" class="me-1" height="24"></p>
                <b>Nama Proyek:</b><br> ${data.id_project_name}<br><br>
                <b>Deskripsi:</b><br> <div>${data.id_description}</div>
                <p><img src="{{ asset('Assets/Dashboard/images/flags/uk-flag.png') }}" alt="UK Flag" class="me-1" height="24"></p>
                <b>Project Name:</b><br> ${data.en_project_name}<br><br>
                <b>Description:</b><br> <div>${data.en_description}</div>
                <b>Gambar:</b><br><br> <img src="/storage/${data.image}" style="width: 100%;"><br><br>
                <b>Lokasi/Alamat:</b><br> <p>${data.location_address}</p>
                <b>Tanggal Proyek:</b><br> <p>${data.project_date}</p>
                <b>Nama Klien / Perusahaan:</b><br> <p>${data.client_company}</p>
            `,
            customClass: {
                popup: 'large-sweetalert'
            }
        });
    });
}


function deleteProject(slug) {
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
                    url: '/projects-content/' + slug,
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

    function updatePerPage() {
        const perPage = document.getElementById('perPage').value;
        window.location.href = `?per_page=${perPage}`;
    }

    function updateSort(sort) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('sort', sort);
        window.location.search = urlParams.toString();
    }
</script>

@endpush

</x-dashboard.layout>

