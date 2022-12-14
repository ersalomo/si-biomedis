@extends('layout.app')
@section('title', 'Tambah Pasien')
@section('title-page')
    <div class="page-title">
        <h4>Create New Data Pasien</h4>
    </div>
@endsection
@section('content')
    <div class="content text-black">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('author.create-pasien') }}" id="form-pasien" class="">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input name="nama" value="{{ old('nama') }}" type="text" class="form-control"
                                    placeholder="enter name">
                                <span class="text-danger error-text nama_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Jenis Pasien</label>
                                <select class="form-control" value="{{ old('jenis_pasien') }}" name="jenis_pasien">
                                    <option value="" class="">Pilih</option>
                                    <option value="umum">Pasien Umum</option>
                                    <option value="bpjs">Pasien BPJS</option>
                                </select>
                                <span class="text-danger error-text jenis_pasien_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tanggal lahir</label>
                                <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date"
                                    class="form-control">
                                <span class="text-danger error-text tanggal_lahir_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Umur</label>
                                <input id="umur" name="umur" value="{{ old('umur') }}" type="number"
                                    class="form-control text-black" placeholder="umur anda">
                                <span class="text-danger error-text umur_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Jenis kelamin</label>
                                <select class="form-control" value="{{ old('jenis_kelamin') }}" name="jenis_kelamin">
                                    <option value="" class="">Pilih</option>
                                    <option value="pria">Laki-laki</option>
                                    <option value="wanita">Perempuan</option>
                                </select>
                                <span class="text-danger error-text jenis_kelamin_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" value="{{ old('alamat') }}" class="form-control" style="height: 60px;"></textarea>
                                <span class="text-danger error-text  alamat_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <textarea name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control" style="height: 60px;"></textarea>
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
    <script src="{{ asset('main.js') }}" type="text/javascript"></script>
@endpush
