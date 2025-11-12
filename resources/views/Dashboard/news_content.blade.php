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
                        The <span class="fw-bold text-primary text-justify">News Content</span> table is a tool designed to help you manage and customize the news displayed on the home page of website. This table allows you to add new news, edit existing ones, and remove those that are no longer needed. Each news can have a title, an image, and a description, providing a rich, engaging experience for your visitors.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Info -->


        <!-- Start Table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="my-3 fw-bold">News Content Table</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#newsModal" onclick="resetForm()">Add News</button>
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
                               <option value="{{ $news->total() }}" {{ $perPage == $news->total() ? 'selected' : '' }}>All</option>
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
                                    <th>Author/Penulis</th>
                                    <th>Date/Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $nw)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><p>{{ $nw->id_title }}</p></td>
                                        <td>
                                            <p class="data-table-text-justify">{!! Str::limit(strip_tags($nw->id_description), 100, '...') !!}</p>
                                        </td>
                                        <td><p>{{ $nw->en_title }}</p></td>
                                        <td>
                                            <p class="data-table-text-justify">{!! Str::limit(strip_tags($nw->en_description), 100, '...') !!}</p>
                                        </td>
                                        <td>
                                            <img style="height: 150px; width: 200px; object-fit:cover" src="{{ asset('storage/' . $nw->image) }}" alt="">
                                        </td>
                                        <td><p>{{ $nw->author }}</p></td>
                                        <td><p>{{ $nw->formatted_date }}</p></td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a class="btn btn-primary btn-sm" title="Detail" onclick="showNews('{{ $nw->slug }}')">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning btn-sm" title="Edit" onclick="editNews('{{ $nw->slug }}')">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteNews('{{ $nw->slug }}')">
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
                        {{ $news->appends(['per_page' => $perPage, 'sort' => $sort])->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
        <!-- End Table -->

        <?php $today = date('Y-m-d'); ?>
        <!-- Modal -->
        <div class="col-lg-12">
            <div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newsModalLabel">Add News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="newsForm" enctype="multipart/form-data">
                                @csrf
                                <!-- Bahasa Indo -->
                                <div class="mb-3 row">
                                    <div class="col-12"> 
                                        <label for="id_title" class="mb-1">Judul @include('partials.flags.id-flag')</label>
                                        <input type="text" class="form-control" maxlength="355" name="id_title" id="id_title" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-12"> 
                                        <label for="id_description" class="form-label">Description @include('partials.flags.id-flag')</label>
                                        <div id="indoDescriptionEditor" style="height: 300px;"></div>
                                        <input type="hidden" name="id_description" id="id_description">
                                    </div>
                                </div>
                                <!-- English Lang -->
                                <div class="mb-3 row">
                                    <div class="col-12">
                                        <label for="en_title" class="mb-1">Title @include('partials.flags.en-flag')</label>
                                        <input type="text" class="form-control" maxlength="355" name="en_title" id="en_title" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-12"> 
                                        <label for="en_description" class="form-label">Description @include('partials.flags.en-flag')</label>
                                        <div id="englishDescriptionEditor" style="height: 300px;"></div>
                                        <input type="hidden" name="en_description" id="en_description">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-12">
                                        <label for="author" class="mb-1">Author / Penulis</label>
                                        <input type="text" class="form-control" maxlength="155" name="author" id="author" value="admin" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-12">
                                        <label for="news_date" class="mb-1">Date / Tanggal</label>
                                        <input type="date" class="form-control" name="news_date" id="news_date" value="{{ old('news_date', $today) }}" />
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
                                <input type="hidden" id="news_id" name="slug">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveButton" onclick="saveNews()">
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
        var quillIndo;
        var quillEng;

        $(document).ready(function() {
            quillIndo = new Quill('#indoDescriptionEditor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        
                    ]
                }
            });

            quillEng = new Quill('#englishDescriptionEditor', {
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
            $('#newsModalLabel').text('Add News');
            $('#newsForm')[0].reset();
            $('#news_id').val('');
            $('#imagePreview').hide();
            quillIndo.setContents([]);
            quillEng.setContents([]);
        }

        function saveNews() {
        var $button = $('#saveButton');
        var $spinner = $button.find('.spinner-border');
        var $buttonText = $button.find('.button-text');

        // Disable the button and show spinner
        $button.prop('disabled', true);
        $spinner.removeClass('d-none');
        $buttonText.text('Saving...');

        var slug = $('#news_id').val();
        var method = slug ? 'POST' : 'POST';
        var url = slug ? '/news-content/' + slug + '?_method=PUT' : '/news-content';

        var formData = new FormData($('#newsForm')[0]);
        formData.set('id_description', quillIndo.root.innerHTML);
        formData.set('en_description', quillEng.root.innerHTML);

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Re-enable the button and hide spinner
                $button.prop('disabled', false);
                $spinner.addClass('d-none');
                $buttonText.text('Save changes');

                $('#newsModal').modal('hide');
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


        function editNews(slug) {
            $.get('/news-content/' + slug, function(data) {
                $('#newsModalLabel').text('Edit News');
                $('#id_title').val(data.id_title);
                quillIndo.root.innerHTML = data.id_description;
                $('#en_title').val(data.en_title);
                quillEng.root.innerHTML = data.en_description;
                $('#author').val(data.author);
                $('#news_date').val(data.news_date);
                $('#news_id').val(slug);
                $('#imagePreview').attr('src', '/storage/' + data.image).show();
                $('#newsModal').modal('show');
            });
        }

        function showNews(slug) {
        $.get('/news-content/' + slug, function(data) {
            Swal.fire({
                title: '<h3>News/Berita Detail</h3>',
                icon: 'info',
                html: `
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/id-flag.png') }}" alt="Id Flag" class="me-1" height="24"></p>
                    <b>Judul:</b><br> ${data.id_title}<br><br>
                    <b>Deskripsi:</b><br> <div>${data.id_description}</div>
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/uk-flag.png') }}" alt="UK Flag" class="me-1" height="24"></p>
                    <b>Title:</b><br> ${data.en_title}<br><br>
                    <b>Description:</b><br> <div>${data.en_description}</div>
                    <b>Tanggal:</b><br> <p>${data.news_date}</p>
                    <b>Gambar:</b><br><br> <img src="/storage/${data.image}" style="width: 100%;">
                `,
                customClass: {
                    popup: 'large-sweetalert'
                }
            });
        });
    }

    function deleteNews(slug) {
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
                    url: '/news-content/' + slug,
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

