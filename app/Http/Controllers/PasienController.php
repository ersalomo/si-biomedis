<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Requests\RequestPasien;
// use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;
use App\Models\RegistrasiPasien  as Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return view('author.content.pasien.data-pasien', []);
    }

    public function getDataPasiens(Request $request)
    {
        if ($request->has('q')) {
            $pasiens = Pasien::search(trim($request->q))->get();
        } else {
            $pasiens = Pasien::get();
        }
        return Datatables::of($pasiens)
            ->editColumn('created_at', function ($date) {
                if ($date) {
                    return Carbon::parse($date->created_at)->format('Y-m-d');
                }
            })
            ->addColumn('action', function ($data) {
                $url_edit = url('author/edit-pasien/' . $data->uuid);
                $url_hapus = url('author/delete-pasien/' . $data->uuid); //href="' . $url_hapus . '"
                $tdPasien = '<a href="' . $url_edit . '" class=""><i class="fa fa-pen"></i></a>';
                $tdPasien .= '<button class="btn" onclick="deletePasien(this);" data-item="' . $data->uuid . '"><i class="fa fa-trash"></i></button>';
                if (auth()->user()->role != 2) {
                    $tdPasien .=  '<a class="me-3" href="' . url('author/tambah-anamnesa/' . $data->uuid) . '">';
                    $tdPasien .=    '<i class="fa fa-plus"></i></a>';
                }
                return $tdPasien;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function tambahPasien()
    {
        $this->authorize('notForDocter');
        return view('author.content.pasien.add-pasien');
    }

    public function edit($id = null)
    {
        $this->authorize('notForDocter');
        return view('author.content.pasien.edit-pasien', [
            'pasien' => $id ? Pasien::find($id) : [],
        ]);
    }

    public function detailPasiens($id)
    {
        $pasien = Pasien::findOFail($id);
        if ($pasien) {
            return response()->json([
                'status' => true,
                'data' => $pasien
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function update($id = null, RequestPasien $request)
    {

        $validator =  Validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );
        if (!$validator->passes()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages()->toArray(),
            ]);
        } else {
            $pasien = Pasien::findOrFail($id);
            // ->update($request->all());
            $pasien->nama = $request->nama;
            $pasien->umur = $request->umur;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->alamat = $request->alamat;
            $pasien->jenis_pasien = $request->jenis_pasien;
            $pasien->pekerjaan = $request->pekerjaan;
            $pasien->updated_at = now()->format('Y-m-d');
            $save = $pasien->save();
            if ($save) {
                return response()->json([
                    'status' => 1,
                    'title' => 'Successfully Added',
                    'msg' => 'New data pasien has been successfully added'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => 'There something went wrong',
                ]);
            }
        }
    }

    public function store(RequestPasien $req)
    {
        $this->authorize('notForDocter');
        // $data = Pasien::create($req->all());
        $validator =  Validator::make($req->all(), $req->rules(), $req->messages());
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 0,
        //         'error' => $validator->errors()->toArray(),
        //     ], 422);
        // } else {
        $data = Pasien::create($req->all());
        if ($data) {
            return response()->json([
                'status' => 1,
                'title' => 'Successfully Added',
                'msg' => 'New data pasien has been successfully added'
            ], 200);
        }
        // }
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
