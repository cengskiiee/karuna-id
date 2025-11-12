<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

    <style>
        .table-responsive {
        overflow-x: auto;
    }
    
    #inboxContactTable {
        width: 100%;
        table-layout: auto;
    }
    
    #inboxContactTable th,
    #inboxContactTable td {
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }
    
    #inboxContactTable .col-no {
        width: 3%;
    }
    
    #inboxContactTable .col-nama {
        width: 10%;
    }
    
    #inboxContactTable .col-handphone {
        width: 10%;
    }
    #inboxContactTable .col-email {
        width: 10%;
    }
    #inboxContactTable .col-pengaduan {
        width: 35%;
    }
    #inboxContactTable .col-waktu {
        width: 15%;
    }
    
    #inboxContactTable .col-action {
        width: 5%;
    }
    
    #inboxContactTable .btn-group {
        display: flex;
        justify-content: space-around;
        flex-wrap: nowrap;
    }
    
    #inboxContactTable .btn-group .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    
    @media screen and (max-width: 768px) {
        #inboxContactTable {
            font-size: 0.875rem;
        }
        
        #inboxContactTable th,
        #inboxContactTable td {
            padding: 0.5rem;
        }
        
        #inboxContactTable .btn-group .btn {
            padding: 0.2rem 0.4rem;
        }
    }

         .modal-wide .modal-dialog {
                max-width: 80%; /* Atau nilai spesifik seperti 800px */
                width: 80%;
            }

            @media (max-width: 768px) {
                .modal-wide .modal-dialog {
                    max-width: 95%;
                    width: 95%;
                }
            }
    </style>


    <div class="row">
 
        <!-- Start Dasar Hukum Table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Inbox Pesan/Pengaduan/Saran</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="inboxContactTable">
                            <thead>
                                <tr>
                                    <th class="col-no">No.</th>
                                    <th class="col-nama">Nama Lengkap</th>
                                    <th class="col-handphone">Nomor Handphone</th>
                                    <th class="col-email">Email</th>
                                    <th class="col-pengaduan">Pesan/Pengaduan/Saran</th>
                                    <th class="col-waktu">Waktu Pesan Masuk</th>
                                    <th class="col-action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inboxContact as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}.</td>
                                        <td>{{ $data->nama_lengkap }}</td>
                                        <td>{{ $data->nomor_handphone }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ Str::limit($data->deskripsi, 250) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, DD/MM/YYYY - HH:mm') }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-primary btn-sm" onclick="showInboxContact('{{ $data->id }}')"><i class="fa fa-eye"></i></button>
                                                <button class="btn btn-danger btn-sm" onclick="deleteInboxContact({{ $data->id }})"><i class="fas fa-trash-alt"></i></button>
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
        <!-- End Dasar Hukum Table -->


       
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#inboxContactTable').DataTable({
                pageLength: 10,
                responsive: true
            });
        });
    
        function deleteInboxContact(id) {
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
                    url: '/view-inbox-contact/' + id,
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
    
        function showInboxContact(id) {
            $.get('/view-inbox-contact/' + id, function(data) {
                Swal.fire({
                    title: '<h3>Detail Inbox</h3>',
                    icon: 'info',
                    html: `
                        <b>Nama Lengkap:</b><br> ${data.nama_lengkap}<br><br>
                        <b>Nomor Handphone:</b><br> ${data.nomor_handphone}<br><br>
                        <b>Email:</b><br> ${data.email}<br><br>
                        <b>Pesan/Pengaduan/Saran:</b><br> ${data.deskripsi}<br><br>
                        <b>Waktu Pesan Masuk:</b><br> ${data.created_at}<br><br>
                    `,
                    customClass: {
                        popup: 'large-sweetalert'
                    }
                });
            });
        }
        </script>
    @endpush
</x-dashboard.layout>
