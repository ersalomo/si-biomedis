<?php

namespace App\Http\Controllers;

use App\Models\RegistrasiPasien  as Pasien;
use App\Http\Requests\RequestPasien;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function showDataPasien()
    {
        return view('content.admin.home.data-pasien', [
            'pasiens' => Pasien::get()
        ]);
    }
    public function tambahPasien()
    {
        return view('content.admin.home.tambah-pasien');
    }
    public function store(RequestPasien $req)
    {
        $validator =  Validator::make($req->all(), $req->rules());
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray(),
            ]);
        } else {
            $data = Pasien::create($req->all());
            if ($data) {
                return response()->json([
                    'status' => 1,
                    'title' => 'Successfully Added',
                    'msg' => 'New data pasien has been successfully added'
                ]);
            }
        }
    }
}
