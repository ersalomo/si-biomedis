@extends('layout.app')
@section('title', 'Edit Data Pasien')
@section('title-page')
    <div class="page-title">
        <h4>Edit Data Pasien</h4>
    </div>
@endsection
@section('content')
    <div class="content text-black">
        <div class="card">
            <div class="card-body">
                {{-- {{ route('author.update-pasien') }} --}}
                <form method="post" action="{{ url('author/update-pasien/' . request()->id) }}" id="form-edit-pasien"
                    class="">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" value="" id="">
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input name="nama" value="{{ $pasien->nama ?? '' }}" type="text" class="form-control"
                                    placeholder="enter name">
                                <span class="text-danger error-text nama_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Jenis Pasien</label>
                                <select class="form-control" name="jenis_pasien">
                                    <option value="{{ $pasien->jenis_pasien ?? '' }}" class="">
                                        {{ $pasien->jenis_pasien ?? 'pilih' }}</option>
                                    <option value="umum">Pasien Umum</option>
                                    <option value="bpjs">Pasien BPJS</option>
                                </select>
                                <span class="text-danger error-text jenis_pasien_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tanggal lahir</label>
                                <input name="tanggal_lahir" value="{{ $pasien->tanggal_lahir ?? '' }}" type="date"
                                    class="form-control">
                                <span class="text-danger error-text tanggal_lahir_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Umur</label>
                                <input id="umur" name="umur" value="{{ $pasien->umur ?? '' }}" type="number"
                                    class="form-control text-black" placeholder="umur anda">
                                <span class="text-danger error-text umur_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Jenis kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="{{ $pasien->jenis_kelamin ?? '' }}"class="">
                                        {{ $pasien->jenis_kelamin ?? 'pilih' }}</option>
                                    <option value="pria">Laki-laki</option>
                                    <option value="wanita">Perempuan</option>
                                </select>
                                <span class="text-danger error-text jenis_kelamin_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" style="height: 60px;">{{ $pasien->alamat ?? '' }}</textarea>
                                <span class="text-danger error-text  alamat_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Pekerjaan <span class="text-muted">optional</span></label>
                                <textarea name="pekerjaan" class="form-control" style="height: 60px;">{{ $pasien->pekerjaan ?? '' }}</textarea>
                                <span class="text-danger error-text pekerjaan_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        if ("{{ request()->id == null }}") {
            Toastify({
                avatar: 'X',
                text: `Data pasien not found redirect...`,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#ffc107",
            }).showToast();
            setTimeout(() => {
                window.location.href = '{{ url('author/show-data-pasien') }}';
            }, 3000);
        }

        $(document).ready(function() {
            $('#form-edit-pasien').on('submit', (e) => {
                e.preventDefault()
                var form = $(e.target);
                // var id = $(form).find('input[data-id]').val()
                // var id = "{{ request()->id ?? '' }}"
                $.ajax({
                    url: $(form).attr('action'),
                    method: 'POST',
                    data: new FormData(e.target),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: () => {
                        $(form).find('span.error-text').text('');
                    },
                    success: () => {
                        Toastify({
                            avatar: '/dist/assets/images/icon/sucess.png',
                            text: `Data pasien created successfully`,
                            duration: 2500,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#2fb344",
                            // selector: $('#modal-obat').modal('hide'),
                        }).showToast();
                    },
                    error: () => {
                        Toastify({
                            avatar: '/dist/assets/images/icon/sucess.png',
                            text: `There Something went wrong`,
                            duration: 2500,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#2fb344",
                            // selector: $('#modal-obat').modal('hide'),
                        }).showToast();
                    }
                })
            })
        })
    </script>
@endpush
