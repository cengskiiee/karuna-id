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
                        The <span class="fw-bold text-primary text-justify">Faq Content</span> table is a tool designed to help you manage and customize the sliders displayed on the home page of website. This table allows you to add new sliders, edit existing ones, and remove those that are no longer needed. Each slider can have a title, an image, and a description, providing a rich, engaging experience for your visitors.
                    </p>
                </div>
            </div>
        </div>


       <!-- table start col -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="my-3 fw-bold">Faq Content Table</h4>
            <div class="d-flex justify-content-between align-items-center">
                <!-- Button Add -->
                <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#faqModal" onclick="resetForm()">Add New Faq</button>
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
                        <option value="{{ $faqs->total() }}" {{ $perPage == $faqs->total() ? 'selected' : '' }}>All</option>
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
                            <th>Pertanyaan @include('partials.flags.id-flag')</th>
                            <th>Jawaban @include('partials.flags.id-flag')</th>
                            <th>Question @include('partials.flags.en-flag')</th>
                            <th>Answer @include('partials.flags.en-flag')</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $faq->id_faq_question }}</td>
                            <td>
                               <p class="data-table-text-justify">{{ $faq->id_faq_answer }}</p></td>
                            <td>{{ $faq->en_faq_question }}</td>
                            <td>
                               <p class="data-table-text-justify">{{ $faq->en_faq_answer }}</p></td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a class="btn btn-primary btn-sm" title="Detail" onclick="showFaq({{ $faq->id }})">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" title="Edit" onclick="editFaq({{ $faq->id }})">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" title="Delete" onclick="deleteFaq({{ $faq->id }})">
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
                {{ $faqs->appends(['per_page' => $perPage])->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
<!-- table end col -->



    <!-- Modal -->
    <div class="col-lg-12">
        <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="faqModalLabel">Add Faq</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="faqForm">
                            @csrf
                            <!-- Indonesia -->
                            <div class="mb-3">
                                <label for="id_faq_question" class="form-label">Pertanyaan @include('partials.flags.id-flag')</label>
                                <input type="text" class="form-control" id="id_faq_question" name="id_faq_question" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_faq_answer" class="form-label">Jawaban @include('partials.flags.id-flag')</label>
                                <textarea class="form-control" rows="5" id="id_faq_answer" name="id_faq_answer" required></textarea>
                            </div>
                            <!-- English -->
                            <div class="mb-3">
                                <label for="en_faq_question" class="form-label">Question @include('partials.flags.en-flag')</label>
                                <input type="text" class="form-control" id="en_faq_question" name="en_faq_question" required>
                            </div>
                            <div class="mb-3">
                                <label for="en_faq_answer" class="form-label">Answer @include('partials.flags.en-flag')</label>
                                <textarea class="form-control" rows="5" id="en_faq_answer" name="en_faq_answer" required></textarea>
                            </div>

                            <input type="hidden" id="faq_id">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveFaq()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

       </div>

    </div>

    @push('scripts')
    {{-- script faq --}}
    <script>

        function resetForm() {
            $('#faqModalLabel').text('Add Faq');
            $('#faqForm')[0].reset();
            $('#faq_id').val('');
        }
        
        function saveFaq() {
            var id = $('#faq_id').val();
            var method = id ? 'PUT' : 'POST';
            var url = id ? '/faq-content/' + id : '/faq-content';

            $.ajax({
                url: url,
                method: method,
                data: $('#faqForm').serialize(),
                success: function(response) {
                    $('#faqModal').modal('hide');
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

        function editFaq(id) {
        $.get('/faq-content/' + id, function(data) {
            $('#faqModalLabel').text('Edit Faq');
            $('#en_faq_question').val(data.en_faq_question);
            $('#en_faq_answer').val(data.en_faq_answer);
            $('#id_faq_question').val(data.id_faq_question);
            $('#id_faq_answer').val(data.id_faq_answer);
            $('#faq_id').val(data.id);
            $('#faqModal').modal('show');
        });
        }

        function showFaq(id) {
            $.get('/faq-content/' + id, function(data) {
                Swal.fire({
                    title: '<h3>Faq Detail</h3>',
                    icon: 'info',
                    html: `
                        <p><img src="{{ asset('Assets/Dashboard/images/flags/id-flag.png') }}" alt="Indonesian Flag" class="me-1" height="24"></p>
                        <b>Pertanyaan:</b><br> ${data.id_faq_question}<br><br>
                        <b>Jawaban:</b><br> <p>${data.id_faq_answer}</p>
                        <br><hr><br>
                        <p><img src="{{ asset('Assets/Dashboard/images/flags/uk-flag.png') }}" alt="UK Flag" class="me-1" height="24"></p>
                        <b>Question:</b><br> ${data.en_faq_question}<br><br>
                        <b>Answer:</b><br> <p>${data.en_faq_answer}</p>
                    `,
                    customClass: {
                        popup: 'large-sweetalert'
                    }
                });
            });
        }

        function deleteFaq(id) {
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
                        url: '/faq-content/' + id,
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

