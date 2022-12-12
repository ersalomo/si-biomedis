<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestAnamnesa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\AnamnesaPasien as Anamnesa;
use App\Models\RegistrasiPasien as Pasien;

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

    public function getPasiens(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $drugs = Pasien::orderBy('nama', 'ASC')->limit(5)->get();
        } else {
            $drugs = Pasien::orderBy('nama', 'ASC')->where('nama', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }
        return response()->json($drugs);
    }

    public function create(RequestAnamnesa $req)
    {
        $this->authorize('notForAdmin');
        //  --- stok obat
        $validator = Validator::make($req->all(), $req->rules(), $req->messages());
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'statusCode' => 422,
                'error' => $validator->errors()->toArray(),
            ], 422);
        }
        $anamnesa = Anamnesa::create($req->all());
        if ($anamnesa) {
            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'message' => 'Berhasil menambah anamnesa pasien',
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => 'There are something went wrong!',
            ], 500);
        }
    }
}
