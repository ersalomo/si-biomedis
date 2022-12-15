@extends('layout.app')
@section('title', 'Data Pasien')
@section('title-page')
    <div class="page-title">
        <h4>Pasien List</h4>
        <h6>All records Pasien</h6>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="page-btn d-flex mb-2">
            <button type="button" class="btn btn-primary" id="btnTambahPasien">
                <i class="fa fa-plus"></i> Add New Pasien
            </button>
        </div>
    </div>
    <div class="card text-black">
        <div class="card-body">
            <div class="table-top">
            </div>
            <div class="table-responsive">
                <div id="" class="">
                    <table class="table text-black" id="table-pasien" role="grid" aria-describedby="">
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
                        url: `{{ url('author/delete-pasien/${idPasien}') }}`,
                        method: "delete",
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: (res) => {
                            Toastify({
                                avatar: '/dist/assets/images/icon/sucess.png',
                                text: `Data pasien delete successfully`,
                                duration: 2500,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#2fb344",
                                selector: $('#table-pasien').DataTable().ajax.reload(),
                            }).showToast();
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
                    [5, 10, 25, 50, 100, 1000, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', '100 rows', 'All']
                ],
                processing: true,
                serverSide: false,
                ajax: "{{ route('author.get-patiens', []) }}",
                columns: [{
                        width: '90px',
                        title: 'Action',
                        data: 'action',
                        name: 'Action',
                    },
                    {
                        data: 'created_at',
                        name: 'Tanggal Pemeriksaan',
                        title: 'Tanggal Pemeriksaan'
                    },
                    {
                        searchable: true,
                        data: 'nama',
                        name: 'name',
                        title: 'name'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'Tanggal lahir',
                        title: 'Tanggal lahir'
                    },
                    {
                        searchable: true,
                        data: 'umur',
                        name: 'Umur',
                        title: 'Umur'
                    },
                    {
                        searchable: true,
                        data: 'jenis_kelamin',
                        name: 'Gender',
                        title: 'Gender'
                    },
                    {
                        searchable: true,
                        data: 'alamat',
                        name: 'Alamat',
                        title: 'Alamat',
                    },
                    {
                        searchable: true,
                        data: 'pekerjaan',
                        name: 'Pekerjaan',
                        title: 'Pekerjaan'
                    },

                ]
            })
            $('#btnTambahPasien').on('click', function(e) {
                $.ajax({
                    url: "{{ route('author.tambah-pasien') }}",
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
                            window.location.href = "http://127.0.0.1:8000/author/tambah-pasien"
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
