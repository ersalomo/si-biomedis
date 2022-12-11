@extends('layout.app')
@section('title', 'Tambah Anemnesa')
@section('title-page')
    <div class="page-title">
        <h4>Create new Data Anamnesa</h4>
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
                                <input type="text" class="form-control" placeholder="nama pasien"
                                    value="{{ $name->nama ?? '' }}">
                                <input type="hidden" name="uuid_pasien" value="{{ $name->uuid ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Anamnesa</label>
                                <textarea name="anamnesa" placeholder="anamnesa..."
                                    class="form-control @error('anamnesa')
                                    is-invalid
                                @enderror"
                                    style="height: 60px;"></textarea>
                                @error('anamnesa')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Diagnosa</label>
                                <textarea name="diagnosa" placeholder="diagnosa..."
                                    class="form-control @error('diagnosa')
                                is-invalid
                            @enderror"
                                    style="height: 60px;"></textarea>
                                @error('diagnosa')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Obat Yang Dipakai</label>
                                <select id='sel_emp' name="id_obat"
                                    class="form-control @error('id_obat')
                                is-invalid
                            @enderror"
                                    value="{{ old('id_obat') }}">
                                    <option value='0'>-- Select nama obat --</option>
                                </select>
                            </div>
                            @error('id_obat')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Pengobatan</label>
                                <textarea name="pengobatan" placeholder="pengobatan..."
                                    class="form-control @error('pengobatan')
                                is-invalid
                            @enderror"
                                    style="height: 60px;"></textarea>
                                @error('pengobatan')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
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
    <script>
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
