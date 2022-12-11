<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    RegistrasiPasien as Pasien,
    AnamnesaPasien,
    ObatModel
};

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('author.content.dashboard', [
            'pasiens' => Pasien::all(),
            'anamnesa' => AnamnesaPasien::all()->count(),
            'drugs' => ObatModel::all()->count(),
        ]);
    }
    public function getVisitAllPasien()
    {
        $groupPasiens = Pasien::orderBy('created_at', 'asc')->get()->groupBy(function ($value) {
            return \Carbon\Carbon::parse($value->created_at)->format('Y-m');
        })->toArray();
        return [$groupPasiens];
    }
}
