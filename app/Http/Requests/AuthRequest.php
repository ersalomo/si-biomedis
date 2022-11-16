<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            '*' => ['required'],
            'email' => ['email'],
            'password' => ['min:8', 'max:16']
        ];
    }
    public function messages()
    {
        return [
            '*.required' => 'Kolom ini harus diisi!',
            'email.email' => 'Masukkan alamat email yang sesuia!',
            'password.min' => 'Minimal 8 karakter!',
            'password.max' => 'Maximal 16 karakter!'
        ];
    }
}
