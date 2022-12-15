@extends('layout.app')
@section('title', 'Tambah Anemnesa')
@section('title-page')
    <div class="page-title">
        <h4>Create new Data Anamnesa </h4>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="card text-black">
            <div class="card-body">
                <form method="post" action="{{ route('author.create-anamnesa') }}" id="form-anemnesa">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                @if ($pasien)
                                    <input type="text" class="form-control" id="input-name-pasien"
                                        placeholder="nama pasien" value="{{ $pasien[0]->nama }}">
                                    <input type="hidden" name="uuid_pasien" value="{{ $pasien[0]->uuid }}" />
                                @else
                                    <select id='sel_name' name="uuid_pasien" class="form-control">
                                        <option value="0">--select name--</option>
                                @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Anamnesa</label>
                                <textarea name="anamnesa" placeholder="anamnesa..." class="form-control" style="height: 60px;"></textarea>
                                <span class="text-danger error-text anamnesa_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Diagnosa</label>
                                <textarea name="diagnosa" placeholder="diagnosa..." class="form-control" style="height: 60px;"></textarea>
                                <span class="text-danger error-text diagnosa_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Obat Yang Dipakai</label>
                                <select id='sel_emp' name="id_obat" class="form-control">
                                    <option value='0'>-- Select nama obat --</option>
                                </select>
                            </div>
                            <span class="text-danger error-text id_obat_error"></span>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Pengobatan</label>
                                <textarea name="pengobatan" placeholder="pengobatan..." class="form-control" style="height: 60px;"></textarea>
                                <span class="text-danger error-text pengobatan_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-outline-danger">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="/add-anamnesa.js"></script>
    <script>
        $('#sel_name').on('focus', (e) => {
            // $('#input-name-pasien').on('focus', (e) => {
            // console.log("hallo" + e.target.data, e)
            if (e.target.data == undefined || e.target.data == "") {
                console.log('data', e.target.data),
                    // if (e.target.value == undefined || e.target.value == "") {
                    $('#sel_name').select2({
                        // $('#input-name-pasien').select2({
                        // allowClear: true,
                        ajax: {
                            url: "{{ route('author.getPasiens2') }}",
                            method: 'get',
                            dataType: 'json',
                            delay: 250,
                            processResults: function(response) {
                                return {
                                    results: $.map(response, function(pasien) {
                                        return {
                                            id: pasien.uuid,
                                            text: pasien.nama
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    })
            }
        })

        $('#sel_emp').select2({
            ajax: {
                url: "{{ route('author.getDrugs') }}",
                method: 'get',
                dataType: 'json',
                delay: 250,
                processResults: function(response) {
                    return {
                        results: $.map(response, function(data) {
                            return {
                                id: data.id,
                                text: data.nama_obat
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endpush
