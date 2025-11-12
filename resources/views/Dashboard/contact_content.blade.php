<x-dashboard.layout>
    @section('title', $title)
    
     <!-- Start of Row -->
    <div class="row"> 

        <!-- Start Info -->
        <div class="col-lg-12">
            <div class="card" style="border-left: 5px solid blue; background-color: rgba(0, 0, 255, 0.1);">
                <div class="card-body">
                    <h3 id="info-content-toggle" style="cursor: pointer;"><i class="fa fa-info-circle"></i> Information</h3>
                    <p style="display: none;" class="card-title-desc font-size-16 content-toggle">
                        The <span class="fw-bold text-primary text-justify">Contact Content</span> table is a tool designed to help you manage the contact displayed on the contact page of website.
                    </p>
                </div>
            </div>
        </div>
         <!-- End of Info -->
         
        <!-- Start Showing Data -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Data Fields -->
                    @foreach($contact->getAttributes() as $key => $value)
                        @if($key == 'location_detail')
                            <!-- Start Data -->
                            <div class="mb-5 row">
                                <div class="col-lg-2 col-sm-2">
                                    <h6>{{ ucfirst(str_replace('_', ' ', $key)) }}</h6>
                                </div>
                                <div class="col-lg-1 col-sm-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-lg-9 col-sm-8">
                                    <!-- Google Map Iframe Start -->
                                    <div class="map-contact-container">
                                        <iframe src="{{ $value }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <!-- Google Map Iframe End -->
                                </div>
                            </div>
                            <!-- End Data -->
                        @else
                            <!-- Start Data -->
                            <div class="mb-5 row">
                                <div class="col-lg-2 col-sm-2">
                                    <h6>{{ ucfirst(str_replace('_', ' ', $key)) }}</h6>
                                </div>
                                <div class="col-lg-1 col-sm-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-lg-9 col-sm-8">
                                    <p>{{ $value }}</p>
                                </div>
                            </div>
                            <!-- End Data -->
                        @endif
                    @endforeach

                    <!-- Edit Button -->
                    <div class="row my-8">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#contactModal" class="btn btn-warning px-4 py-2">
                                <i class="fas fa-pencil-alt"></i> Edit Contact
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Showing Data -->

        <!-- Start Modal -->
        <div class="col-lg-12">
            <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactModalLabel">Edit Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="contactForm">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $contact->city }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $contact->address }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="location_detail" class="form-label">Location Detail</label>
                                    <textarea class="form-control" rows="3" id="location_detail" name="location_detail" required>{{ $contact->location_detail }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $contact->contact_number }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $contact->instagram }}">
                                </div>
                                <div class="mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $contact->linkedin }}">
                                </div>
                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $contact->facebook }}">
                                </div>
                                <div class="mb-3">
                                    <label for="youtube" class="form-label">YouTube</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $contact->youtube }}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveContact()">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
    </div>
     <!-- End of Row -->


    @push('scripts')
    {{-- script faq --}}
    <script>
        function saveContact() {
            $.ajax({
                url: '{{ route("contact-content.update") }}',
                method: 'PUT',
                data: $('#contactForm').serialize(),
                success: function(response) {
                    $('#contactModal').modal('hide');
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
            $('#contactModal').on('show.bs.modal', function() {
                $.get('{{ route("contact-content") }}', function(data) {
                    $('#city').val(data.contact.city);
                    $('#address').val(data.contact.address);
                    $('#location_detail').val(data.contact.location_detail);
                    $('#email').val(data.contact.email);
                    $('#contact_number').val(data.contact.contact_number);
                    $('#instagram').val(data.contact.instagram);
                    $('#linkedin').val(data.contact.linkedin);
                    $('#facebook').val(data.contact.facebook);
                    $('#youtube').val(data.contact.youtube);
                });
            });
        });
    </script>
    @endpush
</x-dashboard.layout>
