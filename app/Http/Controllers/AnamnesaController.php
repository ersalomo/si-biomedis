<?php

namespace App\Http\Controllers;

use App\Models\AnamnesaPasien as Anamnesa;
use App\Models\RegistrasiPasien as Pasien;
use App\Http\Requests\RequestAnamnesa;
use RealRashid\SweetAlert\Facades\Alert;

class AnamnesaController extends Controller
{
    public function showDataAnamnesa()
    {
        return view('content.admin.home.data-anamnesa', [
            'anamnesas' => Anamnesa::get(),
        ]);
    }

    public function tambahAnamnesa(Pasien $pasien)
    {

        $name = '';
        if ($pasien) $name = $pasien;
        return view('content.admin.home.tambah-anamnesa', [
            'name' => $name
        ]);
    }


    public function create(RequestAnamnesa $req)
    {
        Anamnesa::create($req->all());
        Alert::success('Berhasil ditambahkan', 'database');
        return back();
    }
}
