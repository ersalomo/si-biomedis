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
                <button class="btn btn-success d-flex me-1" type="button">
                    <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="img" class="me-1" />
                    Export to Excel
                </button>

                <button type="button" class="btn btn-added" id="btnTambahPasien">
                    <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Pasien
                </button>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                </div>
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
                            aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label=":activate to sort column descending" style="width: 38.5938px;">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>NO</th>
                                    <th>Name</th>
                                    <th>Tanggal lahir</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>
                                    <th>Create_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasiens as $pasien)
                                    <tr class="text-dark">
                                        <td class="sorting_1">
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                                <input id="id-pasien" type="hidden" value="{{ $pasien->uuid }}">
                                            </label>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-dark">{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->tanggal_lahir }}</td>
                                        <td>{{ $pasien->umur }} </td>
                                        <td>{{ $pasien->jenis_kelamin }}</td>
                                        <td>{{ __() }}</td>
                                        <td>{{ $pasien->pekerjaan }}</td>
                                        <td>{{ $pasien->created_at }}</td>
                                        <td>
                                            <button class="me-3 btn" id="hapusPasien">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                            </button>
                                            <a class="me-3" href="">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" palt="img">
                                            </a>
                                            @if (auth()->user()->role != 2)
                                                <a class="me-3" href="{{ url('d/tambah-anamnesa/' . $pasien->uuid) }}">
                                                    <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img">
                                                </a>
                                            @endif
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
        $('#hapusPasien').on('click', function(e) {
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
                    var idPasien = $('#id-pasien').val();
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
                            })
                        },
                    })
                }
                //else if (result.isDenied) {
                //  Swal.fire('Changes are not saved', '', 'info')
                //}
            })
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
                    alert(res);
                }
            });

        })
    </script>
@endpush
