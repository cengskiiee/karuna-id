<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

<div class="row">
        <div class="col-lg-12">
            <div class="card" style="border-left: 5px solid blue; background-color: rgba(0, 0, 255, 0.1);">
                <div class="card-body">
                    <h3 id="info-content-toggle" style="cursor: pointer;"><i class="fa fa-info-circle"></i> Information</h3>
                    <p style="display: none;" class="card-title-desc font-size-16 content-toggle">
                        The <span class="fw-bold text-primary text-justify">Profile Team</span> table is a tool designed to help you manage and customize the profile displayed on the about page of website. This table allows you to add new profile, edit existing ones, and remove those that are no longer needed.
                    </p>
                </div>
            </div>
        </div>

        <!-- start table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="my-3 fw-bold">Profile Team Table</h4>
                    <!-- Button Add -->
                    <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#profileTeamModal" onclick="resetForm()">Add Profile</button>
                        
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered dt-responsive nowrap">

                            <thead>
                                <tr>
                                    <th>No.</th> 
                                    <th>Name </th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Link Profil LinkedIn</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $profile )
                                    
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><p>{{ $profile->name }}</p></td>
                                    <td>
                                        {{ $profile->position }}
                                    </td>
                                    <td>
                                        {{ $profile->email }}
                                    </td>
                                    <td>
                                        {{ $profile->linkedin }}
                                    </td>
                                    <td>
                                        <figure><img src="{{ asset('storage/' . $profile->image) }}" alt=""></figure>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a class="btn btn-primary btn-sm" title="Detail" onclick="showProfile({{ $profile->id }})">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm" title="Edit" onclick="editProfile({{ $profile->id }})">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteProfile({{ $profile->id }})">
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
        <!-- end table -->

        <!-- Modal -->
   <div class="col-lg-12">
    <div class="modal fade" id="profileTeamModal" tabindex="-1" aria-labelledby="profileTeamModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTeamModalLabel">Add Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profileForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>


                        <div class="mb-3">
                            <label for="position" class="form-label">Posisi / Jabatan</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Link Profil LinkedIn</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" required>
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
                        <input type="hidden" id="profile_id" name="profile_id">
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveProfile()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal -->
</div>

@push('scripts')

<script>
    function resetForm() {
        $('#profileTeamModalLabel').text('Add Profile');
        $('#profileForm')[0].reset();
        $('#profile_id').val('');
        $('#imagePreview').hide();
    }

    function saveProfile() {
        var id = $('#profile_id').val();
        var method = id ? 'POST' : 'POST';
        var url = id ? '/profile-team/' + id + '?_method=PUT' : '/profile-team';

        var formData = new FormData($('#profileForm')[0]);

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#profileTeamModal').modal('hide');
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

    function editProfile(id) {
        $.get('/profile-team/' + id, function(data) {
            $('#profileTeamModalLabel').text('Edit Profile');
            $('#profile_id').val(data.id);
            $('#name').val(data.name);
            $('#position').val(data.position);
            $('#email').val(data.email);
            $('#linkedin').val(data.linkedin);
            $('#imagePreview').attr('src', '/storage/' + data.image).show();
            $('#profileTeamModal').modal('show');
        });
    }

    function showProfile(id) {
        $.get('/profile-team/' + id, function(data) {
            Swal.fire({
                title: '<h3>Profile Detail</h3>',
                icon: 'info',
                html: `
                    <b>Nama:</b><br> ${data.name}<br><br>
                    <b>Posisi / Jabatan:</b><br> ${data.position}<br><br>
                    <b>Email:</b><br> <p>${data.email}</p>
                    <b>Linkedin:</b><br> ${data.linkedin}<br><br>
                    <b>Gambar:</b><br><br> <img src="/storage/${data.image}" style="width: 100%;"><br><br>
                `,
                customClass: {
                    popup: 'large-sweetalert'
                }
            });
        });
    }

    function deleteProfile(id) {
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
                    url: '/profile-team/' + id,
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

