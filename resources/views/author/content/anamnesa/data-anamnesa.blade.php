@extends('layout.app')
@section('title', 'Data Anamnesa')
@section('title-page')
    <div class="page-title">
        <h4>List Data Anamnesa</h4>
        <h6>All records anamnesa</h6>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="page-header">

            <div class="page-btn">
                <button class="btn btn-primary mb-2" id="bnAddAnamnesa">
                    <i class="fa fa-plus"></i>
                    Add New anamnesa
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                </div>
                <div class="table-responsive">
                    <div id="" class="">
                        <table class="table table-group-divider table-responsive table-hover table-condensed" id=""
                            role="grid" aria-describedby="">
                            <thead>
                                <tr role="row">
                                    <th class="" style="width:130px;">Tanggal</th>
                                    <th>Name</th>
                                    <th>Anamnesa</th>
                                    <th>Diagnosa</th>
                                    <th>Nama Obat</th>
                                    <th>Pengobatan</th>
                                    <th class="d-flex" style="width:130px;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                @foreach ($anamnesas as $anamnesa)
                                    <tr class="even">
                                        <td>{{ $anamnesa->created_at }}</td>
                                        <td class="">{{ $anamnesa->pasien[0]->nama }}</td>
                                        <td>{{ $anamnesa->anamnesa }}</td>
                                        <td>{{ $anamnesa->diagnosa }} </td>
                                        <td>{!! __($anamnesa->obat->nama_obat) !!} </td>
                                        <td>{{ $anamnesa->pengobatan }}</td>
                                        <td>
                                            <button class="me-3 btn btn-primary" onclick="deleteAnamnesa(this)"
                                                data-id="{{ $anamnesa->id }}"><i class="fa fa-trash"></i>
                                            </button>
                                            <a class="me-3" href="">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function deleteAnamnesa(button) {
            const id = button.getAttribute('data-id')
            const url = '{{ url('author/delete-anamnesa/') }}'
            const name = button.getAttribute('data-name') ?? ''
            swal.fire({
                title: "Hapus data?",
                imageWidth: 60,
                imageHeight: 48,
                html: `Apakah kamu yakin ingin menghapus data <b>${name}</b>?`,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 350,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url + '/' + id,
                        method: "delete",
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: (res) => {
                            Toastify({
                                avatar: '/dist/assets/images/icon/warning.png',
                                text: `Data obat ${name} deleted successfully`,
                                duration: 2500,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#f59f00",
                                callback: () => window.location.reload(),
                            }).showToast()
                        },
                    })
                }
            });
        }
        $(document).ready(() => {
            $('#bnAddAnamnesa').on('click', function(e) {
                $.ajax({
                    url: "{{ route('author.tambah-anamnesa') }}",
                    method: 'get',
                    processData: false,
                    contentType: false,
                    dataType: 'json', // added data type
                    statusCode: {
                        403: (res) => {
                            var response = res.responseJSON
                            console.log(response)
                            Swal.fire({
                                title: "error",
                                html: `<strong>${response.message}</strong>`,
                                icon: "error",
                            })
                        },
                        200: (res) => {
                            window.location.href = "{{ route('author.tambah-anamnesa') }}"
                        }
                    },
                    success: function(res) {
                        console.log(res);
                        alert(res);
                    }
                });
            })
        })
    </script>
@endpush
