<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection


<div class="row">

     <!-- Information -->
     <div class="col-lg-12">
        <div class="card" style="border-left: 5px solid blue; background-color: rgba(0, 0, 255, 0.1);">
            <div class="card-body">
                <h3 id="info-content-toggle" style="cursor: pointer;"><i class="fa fa-info-circle"></i> Information</h3>
                <p style="display: none;" class="card-title-desc font-size-16 content-toggle">
                    The <span class="fw-bold text-primary text-justify">Home Content Slider</span> table is a tool designed to help you manage and customize the sliders displayed on the home page of website. This table allows you to add new sliders, edit existing ones, and remove those that are no longer needed. Each slider can have a title, an image, and a description, providing a rich, engaging experience for your visitors.
                </p>
            </div>
        </div>
    </div>       

            <!-- Start Table -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="my-3 fw-bold">Home Content Slider Table</h4>
                <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#sliderModal" onclick="resetForm()">Add New Slider</button>

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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><p>{{ $slider->id_title }}</p></td>
                                    <td>
                                        <p class="data-table-text-justify">{{ $slider->id_description }}</p>
                                    </td>
                                    <td><p>{{ $slider->en_title }}</p></td>
                                    <td>
                                        <p class="data-table-text-justify">{{ $slider->en_description }}</p>
                                    </td>
                                    <td>
                                        <img style="width: 80%;" src="{{ asset('storage/' . $slider->image) }}" alt="">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a class="btn btn-primary btn-sm" title="Detail" onclick="showSlider({{ $slider->id }})">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm" title="Edit" onclick="editSlider({{ $slider->id }})">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteSlider({{ $slider->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- End Table -->

   <!-- Modal -->
   <div class="col-lg-12">
    <div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="sliderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sliderModalLabel">Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sliderForm" enctype="multipart/form-data">
                        @csrf
                        <!-- Bahasa Indonesia -->
                        <div class="mb-3 row">
                            <label for="id-title-slider-input" class="mb-1">Judul @include('partials.flags.id-flag')</label>
                            <input type="text" class="form-control" maxlength="155" name="id_title" id="id-title-slider-input" placeholder="Input ini memiliki batas 155 karakter." />
                            <div class="d-flex justify-content-between mt-2">
                                <div></div>
                                <small id="id-title-slider_char_count" class="char-count form-text d-none">0/155</small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="mb-1">Deskripsi @include('partials.flags.id-flag')</label>
                            <textarea id="id-desc-slider-textarea" class="form-control" maxlength="355" rows="4" name="id_description" placeholder="Textarea ini memiliki batas 355 karakter."></textarea>
                            <div class="d-flex justify-content-between mt-2">
                                <div></div>
                                <small id="id-desc-slider_char_count" class="char-count form-text d-none">0/355</small>
                            </div>
                        </div>

                        <!-- English Lang -->
                        <div class="mb-3 row">
                            <label for="en-title-slider-input" class="mb-1">Title @include('partials.flags.en-flag')</label>
                            <input type="text" class="form-control" maxlength="155" name="en_title" id="en-title-slider-input" placeholder="This input has a limit of 155 chars." />
                            <div class="d-flex justify-content-between mt-2">
                                <div></div>
                                <small id="en-title-slider_char_count" class="char-count form-text d-none">0/155</small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="mb-1">Description @include('partials.flags.en-flag')</label>
                            <textarea id="en-desc-slider-textarea" class="form-control" maxlength="355" rows="4" name="en_description" placeholder="This textarea has a limit of 355 chars."></textarea>
                            <div class="d-flex justify-content-between mt-2">
                                <div></div>
                                <small id="en-desc-slider_char_count" class="char-count form-text d-none">0/355</small>
                            </div>
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
                            <!-- End Preview Image -->
                        </div>
                        <input type="hidden" id="slider_id" name="slider_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveSlider()">Save changes</button>
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
    function resetForm() {
        $('#sliderModalLabel').text('Add Slider');
        $('#sliderForm')[0].reset();
        $('#slider_id').val('');
        $('#imagePreview').hide();
    }

    function saveSlider() {
        var id = $('#slider_id').val();
        var method = id ? 'POST' : 'POST';
        var url = id ? '/home-slider-content/' + id + '?_method=PUT' : '/home-slider-content';

        var formData = new FormData($('#sliderForm')[0]);

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#sliderModal').modal('hide');
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

    function editSlider(id) {
        $.get('/home-slider-content/' + id, function(data) {
            $('#sliderModalLabel').text('Edit Slider');
            $('#id-title-slider-input').val(data.id_title);
            $('#id-desc-slider-textarea').val(data.id_description);
            $('#en-title-slider-input').val(data.en_title);
            $('#en-desc-slider-textarea').val(data.en_description);
            $('#slider_id').val(data.id);
            $('#imagePreview').attr('src', '/storage/' + data.image).show();
            $('#sliderModal').modal('show');
        });
    }

    function showSlider(id) {
        $.get('/home-slider-content/' + id, function(data) {
            Swal.fire({
                title: '<h3>Slider Detail</h3>',
                icon: 'info',
                html: `
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/id-flag.png') }}" alt="Id Flag" class="me-1" height="24"></p>
                    <b>Judul:</b><br> ${data.id_title}<br><br>
                    <b>Deskripsi:</b><br> <p>${data.id_description}</p>
                    <p><img src="{{ asset('Assets/Dashboard/images/flags/uk-flag.png') }}" alt="UK Flag" class="me-1" height="24"></p>
                    <b>Title:</b><br> ${data.en_title}<br><br>
                    <b>Description:</b><br> <p>${data.en_description}</p>
                    <b>Gambar:</b><br><br> <img src="/storage/${data.image}" style="width: 100%;">
                `,
                customClass: {
                        popup: 'large-sweetalert'
                    }
            });
        });
    }

    function deleteSlider(id) {
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
                    url: '/home-slider-content/' + id,
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
</script>

@endpush

    

</x-dashboard.layout>
