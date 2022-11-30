@extends('layout.app')
@section('title', 'Data Obat')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Data Obat</h4>
                <h6>All records Drugs</h6>
            </div>
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#modal-obat">
                    <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Drugs
                </a>
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
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Jumlah Obat</th>
                                    <th>Satuan Obat</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drugs as $drug)
                                    <tr class="text-dark">
                                        <td class="sorting_1">
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-dark">{{ $drug->nama_obat }}</td>
                                        <td>{{ $drug->jenis_obat }}</td>
                                        <td>{{ __($drug->jumlah_stok) }}</td>
                                        <td>{{ $drug->satuan }}</td>
                                        <td>{{ $drug->desc }}</td>
                                        <td>
                                            <a class="me-3" href="">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" href="">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" palt="img">
                                            </a>
                                            <a class="me-3" href="{{ url('d/tambah-anamnesa/' . $drug->id) }}">
                                                <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img">
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
    <div class="modal modal-blur fade" id="modal-obat" tabindex="-1" style="display: none; padding-left: 0px;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Drugs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.obat.store') }}" id="form-obat" class="">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input name="nama_obat" value="{{ old('nama_obat') }}" type="text"
                                        class="form-control text-dark" placeholder="enter nama obat">
                                    <span class="text-danger error-text nama_obat_error"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Jenis Obat</label>
                                    <input name="jenis_obat" value="{{ old('jenis_obat') }}" type="text"
                                        class="form-control" placeholder="enter jenis obat">
                                    <span class="text-danger error-text jenis_obat_error"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Jumlah Stok</label>
                                    <input id="umur" name="jumlah_stok" value="{{ old('jumlah_stok') }}"
                                        type="number" class="form-control text-dark" placeholder="enter jumlah stok">
                                    <span class="text-danger error-text jumlah_stok_error"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Satuan Obat</label>
                                    <select class="form-control" value="{{ old('satuan') }}" name="satuan">
                                        <option value="" class="">Pilih</option>
                                        <option value="botol">Botol</option>
                                        <option value="butir">Butir</option>
                                        <option value="tablet">Tablet</option>
                                        <option value="box">Box</option>
                                        <option value="strip">Strip</option>
                                    </select>
                                    <span class="text-danger error-text satuan_error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="desc" class="text-dark" value="{{ old('desc') }}" style="height: 120px;"></textarea>
                                    <span class="text-danger error-text desc_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-cancel">Cancel</button>
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $("#form-obat").on("submit", (e) => {
                e.preventDefault();
                $.ajax({
                    url: e.target["action"],
                    method: e.target["method"],
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    //  data: new FormData(e.target),
                    data: Object.assign(new FormData(e.target), {
                        '_token': "{{ csrf_token() }}"
                    }),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: () => {
                        $(e.target).find("span.error-text").text("");
                    },
                    success: (data) => {
                        $("#form-obat")[0].reset();
                        Swal.fire({
                            title: data.title,
                            text: data.message,
                            icon: "success",
                            confirmButtonText: 'Yep!',
                            allowOutsideClick: false
                        }).then((res) => {
                            if (res.isConfirmed) {
                                $('#modal-obat').modal('hide');
                                window.location.href = "http://127.0.0.1:8000/d/obat/"
                            }
                        });
                    },
                    error: (data) => {
                        $.each(data.responseJSON.errors, (prefix, val) => {
                            $("span." + prefix + "_error").text(val[0]);
                        });
                    },
                });
            });
            $('button.btn-cancel').on('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                $('#form-pasien').find("span.error-text").text("");
            })
        });
    </script>
@endpush
