<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    RegistrasiPasien as Pasien,
    AnamnesaPasien,
    ObatModel
};

class Dashboard extends Controller
{
    public function index(Request $request)
    {
        return view('content.admin.index', [
            'pasiens' => Pasien::all()->count(),
            'anamnesa' => AnamnesaPasien::all()->count(),
            'drugs' => ObatModel::all()->count(),
        ]);
    }
}
