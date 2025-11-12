<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

    <!-- start row -->
<div class="row">
        <div class="col-lg-12">
            <div class="card" style="border-left: 5px solid blue; background-color: rgba(0, 0, 255, 0.1);">
                <div class="card-body">
                    <h3 id="info-content-toggle" style="cursor: pointer;"><i class="fa fa-info-circle"></i> Information</h3>
                    <p style="display: none;" class="card-title-desc font-size-16 content-toggle">
                        The Service Category Table is a tool designed to help you manage and customize the category data displayed on your website's home page and the parent data of each service. These tables allow you to add new data, edit existing ones, and delete those that are no longer needed.
                    </p>
                </div>
            </div>
        </div>


            <!-- table start col -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="my-3 fw-bold">Services Category Content Table</h4>

                <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#serviceCategoryModal" onclick="resetForm()">Add Category</button>
                    
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-bordered dt-responsive nowrap">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori @include('partials.flags.id-flag')</th>
                                <th>Deskripsi @include('partials.flags.id-flag')</th>
                                <th>Category Name @include('partials.flags.en-flag')</th>
                                <th>Description @include('partials.flags.en-flag')</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->id_service_category_title }}</td>
                                <td>
                                   <p class="data-table-text-justify">{{ $category->id_description }}</p></td>
                                <td>{{ $category->en_service_category_title }}</td>
                                <td>
                                   <p class="data-table-text-justify">{{ $category->en_description }}</p></td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a class="btn btn-primary btn-sm" title="Detail" onclick="showServiceCategory({{ $category->id }})">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm" title="Edit" onclick="editServiceCategory({{ $category->id }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteServiceCategory({{ $category->id }})">
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
    <!-- table end col -->

       <!-- Modal -->
    <div class="col-lg-12">
        <div class="modal fade" id="serviceCategoryModal" tabindex="-1" aria-labelledby="serviceCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceCategoryModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="serviceCategoryForm">
                            @csrf
                            <!-- Indonesia -->
                            <div class="mb-3">
                                <label for="id_service_category_title" class="form-label">Nama Kategori @include('partials.flags.id-flag')</label>
                                <input type="text" class="form-control" id="id_service_category_title" name="id_service_category_title" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_description" class="form-label">Deskripsi @include('partials.flags.id-flag')</label>
                                <textarea class="form-control" rows="5" id="id_description" name="id_description" required></textarea>
                            </div>
                            <!-- English -->
                            <div class="mb-3">
                                <label for="en_service_category_title" class="form-label">Category Name @include('partials.flags.en-flag')</label>
                                <input type="text" class="form-control" id="en_service_category_title" name="en_service_category_title" required>
                            </div>
                            <div class="mb-3">
                                <label for="en_description" class="form-label">Description @include('partials.flags.en-flag')</label>
                                <textarea class="form-control" rows="5" id="en_description" name="en_description" required></textarea>
                            </div>

                            <input type="hidden" id="service_category_id">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveServiceCategory()">Save changes</button>
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
            $('#serviceCategoryModalLabel').text('Add Category');
            $('#serviceCategoryForm')[0].reset();
            $('#service_category_id').val('');
        }
        
        function saveServiceCategory() {
            var id = $('#service_category_id').val();
            var method = id ? 'PUT' : 'POST';
            var url = id ? '/services-category/' + id : '/services-category';

            $.ajax({
                url: url,
                method: method,
                data: $('#serviceCategoryForm').serialize(),
                success: function(response) {
                    $('#serviceCategoryModal').modal('hide');
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

        function editServiceCategory(id) {
        $.get('/services-category/' + id, function(data) {
            $('#serviceCategoryModalLabel').text('Edit Faq');
            $('#en_service_category_title').val(data.en_service_category_title);
            $('#en_description').val(data.en_description);
            $('#id_service_category_title').val(data.id_service_category_title);
            $('#id_description').val(data.id_description);
            $('#service_category_id').val(data.id);
            $('#serviceCategoryModal').modal('show');
        });
        }

        function showServiceCategory(id) {
            $.get('/services-category/' + id, function(data) {
                Swal.fire({
                    title: '<h3>Category Detail</h3>',
                    icon: 'info',
                    html: `
                        <p><img src="{{ asset('Assets/Dashboard/images/flags/id-flag.png') }}" alt="Indonesian Flag" class="me-1" height="24"></p>
                        <b>Nama Kategori:</b><br> ${data.id_service_category_title}<br><br>
                        <b>Deskripsi:</b><br> <p>${data.id_description}</p>
                        <br><hr><br>
                        <p><img src="{{ asset('Assets/Dashboard/images/flags/uk-flag.png') }}" alt="Indonesian Flag" class="me-1" height="24"></p>
                        <b>Category Name:</b><br> ${data.en_service_category_title}<br><br>
                        <b>Description:</b><br> <p>${data.en_description}</p>
                    `,
                    customClass: {
                        popup: 'large-sweetalert'
                    }
                });
            });
        }

        function deleteServiceCategory(id) {
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
                        url: '/services-category/' + id,
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

