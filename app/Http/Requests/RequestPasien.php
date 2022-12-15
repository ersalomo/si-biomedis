<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPasien extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            // '*'             => ['required'],
            'nama'          => ['string'],
            'jenis_pasien'  => ['string'],
            // 'tanggal_lahir' => [],
            'umur'          => ['integer'],
            'jenis_kelamin' => ['in:pria,wanita'],
            'tanggal_lahir' => ['before:12/30/2022'],
            'alamat'        => ['string'],
            'pekerjaan'     => ['nullable']
        ];
    }
    public function messages()
    {
        return array(
            '*.required' => 'Kolom ini harus diisi',
            'jenis_pasien.string' => 'Tidak sesuai dengan kriteria',
            'jenis_kelamin.in' => 'Masukkan nilai yang sesuai',
            'tanggal_lahir.before' => 'Minimal satu tahun',
            'umur.between' => 'Nilai ini tidak sesuai',
            'alamat.string' => 'Hanya menerima alphanumeric',
            // 'pekerjaan.string' => 'Tidak boleh memasukkan karakter khusus'
        );
    }
}
