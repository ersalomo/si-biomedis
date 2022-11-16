@extends('layout.app')
@section('title', 'Data Anamnesa')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product List</h4>
                <h6>Manage your products</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('admin.tambah-anamnesa') }}" class="btn btn-added"><img src="assets/img/icons/plus.svg"
                        alt="img" class="me-1">Add New anamnesa</a>
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
                                    <th>Anamnesa</th>
                                    <th>Diagnosa</th>
                                    <th>Pengobatan</th>
                                    <th>Create_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anamnesas as $anamnesa)
                                    <tr class="even">
                                        <td class="sorting_1">
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="">{{ $anamnesa->pasien[0]->nama }}</td>
                                        <td>{{ $anamnesa->anamnesa }}</td>
                                        <td>{{ $anamnesa->diagnosa }} </td>
                                        <td>{{ $anamnesa->pengobatan }}</td>
                                        <td>{{ $anamnesa->created_at }}</td>
                                        <td>
                                            <a class="me-3" href="">
                                                <img src="assets/img/icons/eye.svg" alt="img">
                                            </a>
                                            <a class="me-3" href="">
                                                <img src="assets/img/icons/edit.svg" palt="img">
                                            </a>
                                            <a class="me-3" href="{{ url('d/tambah-anamnesa/' . $anamnesa->uuid) }}">
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
