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
                        <table class="table" id="" role="grid" aria-describedby="">
                            <thead>
                                <tr role="row">
                                    <th>Tanggal</th>
                                    <th>Name</th>
                                    <th>Anamnesa</th>
                                    <th>Diagnosa</th>
                                    <th>Pengobatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anamnesas as $anamnesa)
                                    <tr class="even">
                                        <td>{{ $anamnesa->created_at }}</td>
                                        <td class="">{{ $anamnesa->pasien[0]->nama }}</td>
                                        <td>{{ $anamnesa->anamnesa }}</td>
                                        <td>{{ $anamnesa->diagnosa }} </td>
                                        <td>{{ $anamnesa->pengobatan }}</td>
                                        <td>
                                            <a class="me-3" href="">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
                        window.location.href = "http://127.0.0.1:8000/d/tambah-anamnesa"
                    }
                },
                success: function(res) {
                    console.log(res);
                    alert(res);
                }
            });

        })
    </script>
@endpush
