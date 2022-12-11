<?php

namespace App\Http\Controllers;

use App\Models\AnamnesaPasien as Anamnesa;
use App\Models\RegistrasiPasien as Pasien;
use App\Http\Requests\RequestAnamnesa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AnamnesaController extends Controller
{
    public function showDataAnamnesa()
    {
        return view('author.content.anamnesa.data-anamnesa', [
            'anamnesas' => Anamnesa::get(),
        ]);
    }

    public function tambahAnamnesa(Pasien $pasien)
    {
        $this->authorize('notForAdmin');
        $name = '';
        if ($pasien) $name = $pasien;
        return view('author.content.anamnesa.add-anamnesa', [
            'name' => $name
        ]);
    }

    public function create(RequestAnamnesa $req)
    {
        $this->authorize('notForAdmin');
        //  --- stok obat
        Anamnesa::create($req->all());
        return back();
    }
}
