@extends('layout.app')
@section('title', 'Data Pasien')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Pasien List</h4>
                <h6>All records Pasien</h6>
            </div>
            <div class="page-btn d-flex">

                <button type="button" class="btn btn-added" id="btnTambahPasien">
                    <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Pasien
                </button>

            </div>
        </div>
        <div class="card text-dark">
            <div class="card-body">
                <div class="table-top">
                </div>
                <div class="table-responsive">
                    <div id="" class="">
                        <table class="table text-dark" id="table-pasien" role="grid" aria-describedby="">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function deletePasien(button) {
            const idPasien = button.getAttribute('data-item')
            Swal.fire({
                title: '',
                icon: 'info',
                text: 'Are you sure you want to delete this data?',
                //showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                //denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    //denyButton: 'order-3',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('d/delete-pasien/${idPasien}') }}`,
                        method: "delete",
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: (res) => {
                            Swal.fire({
                                title: res.title,
                                icon: res.icon,
                                text: res.message
                            }).then(function(res) {
                                window.location.reload();
                            })

                        },
                    })
                }
                //else if (result.isDenied) {
                //  Swal.fire('Changes are not saved', '', 'info')
                //}
            })

        }
        $(document).ready(function() {
            $('#table-pasien').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'excel', 'pdf', 'csv', 'print'
                ],
                "lengthMenu": [
                    [10, 25, 50, 100, 1000, -1],
                    ['10 rows', '25 rows', '50 rows', '100 rows', 'All']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.get-patiens') }}",
                columns: [{
                        data: 'action',
                        name: 'Action',
                    },
                    {
                        data: 'created_at',
                        name: 'Tanggal Pemeriksaan'
                    },
                    {
                        data: 'nama',
                        name: 'name'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'Tanggal lahir'
                    },
                    {
                        data: 'umur',
                        name: 'Umur'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'Gender'
                    },
                    {
                        data: 'alamat',
                        name: 'Alamat'
                    },
                    {
                        data: 'pekerjaan',
                        name: 'Pekerjaan'
                    },

                ]
            })
            $('#btnTambahPasien').on('click', function(e) {
                $.ajax({
                    url: "{{ route('admin.tambah-pasien') }}",
                    type: 'GET',
                    method: 'GET',
                    processData: false,
                    contentType: false,
                    dataType: 'json', // added data type
                    statusCode: {
                        403: (res) => {
                            var response = res.responseJSON
                            Swal.fire({
                                title: "error",
                                html: `<strong>${response.message}</strong>`,
                                icon: "error",
                            })
                        },
                        200: (res) => {
                            window.location.href = "http://127.0.0.1:8000/d/tambah-pasien"
                        }
                    },
                    success: function(res) {
                        console.log(res);
                    }
                });
            })


        })
    </script>
@endpush
