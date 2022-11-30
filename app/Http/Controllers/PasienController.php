<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Requests\RequestPasien;
// use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;
use App\Models\RegistrasiPasien  as Pasien;

class PasienController extends Controller
{
    public function showDataPasien()
    {
        return view('content.admin.home.data-pasien', [
            // 'pasiens' => Pasien::get()
        ]);
    }
    public function getDataPasiens()
    {
        $pasiens = Pasien::get();
        return Datatables::of($pasiens)
            ->editColumn('created_at', function ($date) {
                if ($date) {
                    return Carbon::parse($date->created_at)->format('Y-m-d');
                }
            })
            ->addColumn('action', function ($data) {
                $url_edit = url('d/edit/' . $data->uuid);
                $url_hapus = url('d/delete-pasien/' . $data->uuid); //href="' . $url_hapus . '"
                $tdPasien = '<a href="' . $url_edit . '" class=""><img src="' . asset('assets/img/icons/edit.svg') . '" palt="img"></a>';
                $tdPasien .= '<button class="btn" onclick="deletePasien(this);" data-item="' . $data->uuid . '"><img src="' . asset("assets/img/icons/delete.svg") . '" alt="img"></button>';
                if (auth()->user()->role != 2) {
                    $tdPasien .=  '<a class="me-3" href="' . url('d/tambah-anamnesa/' . $data->uuid) . '">';
                    $tdPasien .=    '<img src="' . asset('assets/img/icons/plus.svg') . '" alt="img"></a>';
                }
                return $tdPasien;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function tambahPasien()
    {
        $this->authorize('notForDocter');

        return view('content.admin.home.tambah-pasien');
    }
    public function store(RequestPasien $req)
    {
        $this->authorize('notForDocter');
        $validator =  Validator::make($req->all(), $req->rules(), $req->messages());
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
    public function confirmationDelete($id)
    {
        return response()->json(
            [
                'success' => true,
                'title' => 'Apakah kamu yakin ingin menghapus data?',
                'icon' => 'warning',
                'message' => 'Berhasil menghapus data pasien!',
                'id' => $id,
            ],
            200
        );
    }
    public function delete(Pasien $pasien)
    {
        $pasien->delete();
        return response()->json(array(
            'success' => true,
            'title' => 'Delete data pasien',
            'icon' => 'warning',
            'message' => 'Berhasil menghapus data pasien!'
        ), 200);
    }
}
