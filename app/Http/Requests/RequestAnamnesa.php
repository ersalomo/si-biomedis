<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAnamnesa extends FormRequest
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
            'uuid_pasien' => ['required'],
            'id_obat' => ['nullable'],
            'anamnesa' => ['required', 'string'],
            'diagnosa' => ['required', 'string'],
            'pengobatan' => ['required', 'string'],

        ];
    }
    public function messages()
    {
        return [
            '*.required' => 'Masukkan keterangan untuk :attribute',
        ];
    }
}
