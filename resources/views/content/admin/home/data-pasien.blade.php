@extends('layout.app')
@section('title', 'Data Pasien')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Pasien List</h4>
                <h6>All records Pasien</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('admin.tambah-pasien') }}" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                        class="me-1">Add New Pasien</a>
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
                                            <a class="me-3" href="">
                                                <img src="assets/img/icons/eye.svg" alt="img">
                                            </a>
                                            <a class="me-3" href="">
                                                <img src="assets/img/icons/edit.svg" palt="img">
                                            </a>
                                            <a class="me-3" href="{{ url('tambah-anamnesa/' . $pasien->uuid) }}">
                                                <img src="assets/img/icons/plus.svg" alt="img">
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
