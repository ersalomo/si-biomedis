@extends('layout.app')
@section('title', 'Data Obat')
@section('title-page')
    <div class="page-title">
        <h4>List Data Obat</h4>
        <h6>All records obat</h6>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="page-btn">
            <a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal-obat">
                <i class="iconly-boldPlus"></i> Tambah baru
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div id="" class="">
                        <table class="table" id="" role="grid" aria-describedby="">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="" style="width: 38.5938px;">
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
                                    <tr class="text-black">
                                        <td class="sorting_1">
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-black">{{ $drug->nama_obat }}</td>
                                        <td>{{ $drug->jenis_obat }}</td>
                                        <td>{{ __($drug->jumlah_stok) }}</td>
                                        <td>{{ $drug->satuan }}</td>
                                        <td>{{ $drug->desc }}</td>
                                        <td>
                                            <a class="me-3" href="javascript:void(0);" data-item="{{ $drug->id }}"
                                                data-url="{{ url('author/obat/' . $drug->id) }}"
                                                data-name="{{ $drug->nama_obat }}" onclick="deleteObat(this)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a class="me-3" href="javascript:void(0);" data-item="{{ $drug->id }}"
                                                onclick="editObat(this)">
                                                <i class="fa fa-edit"></i>
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
                <div class="modal-body text-black">
                    <form method="post" action="{{ route('author.obat.store') }}" id="form-obat" class="">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input name="nama_obat" value="{{ old('nama_obat') }}" type="text"
                                        class="form-control text" placeholder="enter nama obat">
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
                                        type="number" class="form-control text" placeholder="enter jumlah stok">
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
                                    <textarea name="desc" class="text form-control" value="{{ old('desc') }}" style="height: 60px;"></textarea>
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
        const deleteObat = (button) => {
            const url = button.getAttribute('data-url')
            const name = button.getAttribute('data-name')
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
                        url: url,
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
    </script>
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
                        Toastify({
                            // avatar: 'https://cdn-icons-png.flaticon.com/512/3020/3020000.png',
                            avatar: '/dist/assets/images/icon/sucess.png',
                            text: `Data obat ${name} created successfully`,
                            duration: 2500,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#2fb344",
                            selector: $('#modal-obat').modal('hide'),
                        }).showToast();
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
