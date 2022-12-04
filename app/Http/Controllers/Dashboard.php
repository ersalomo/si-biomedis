<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    RegistrasiPasien as Pasien,
    AnamnesaPasien,
    ObatModel
};
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class Dashboard extends Controller
{

    public function index(Request $request)
    {

        $chart_options = [
            'chart_title' => 'Kunjungan pasien bulanan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\RegistrasiPasien',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('content.admin.index', [
            'pasiens' => Pasien::all()->count(),
            'anamnesa' => AnamnesaPasien::all()->count(),
            'drugs' => ObatModel::all()->count(),
            'chart1' => $chart1,
        ]);
    }
    public function userChart(Request $req)
    {
    }
}
