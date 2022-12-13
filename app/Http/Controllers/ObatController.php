<?php

namespace App\Http\Controllers;

use App\Models\ObatModel;
use Illuminate\Support\Facades\{Validator, Response};
use Illuminate\Http\{
    Request,
    JsonResponse
};
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $listerner = [
        'index' => '$refresh'
    ];
    public function index()
    {
        return view('author.content.obat.data-obat', [
            'drugs' => ObatModel::get(),
        ]);
    }

    public function dataObat(Request $reqeust)
    {
        $drugs = ObatModel::get();
        return Datatables::of($drugs)
            ->editColumn('created_at', function ($date) {
                if ($date) {
                    return Carbon::parse($date->created_at)->format('Y-m-d');
                }
            })
            ->addColumn('action', function ($data) {

                $url_edit = url('author/edit/' . $data->id);
                $url_hapus = url('author/obat/' . $data->id); //href="' . $url_hapus . '"
                $tdObat = '<a href="' . $url_edit . '" class="me-2"><i class="fa fa-pen"></i></a>';
                $tdObat .= '<a class="me-3" href="javascript:void(0);" data-item="{{ $drug->id }}"
                                            data-url="' . $url_hapus . '"
                                            data-name="' . $data->nama_obat . '" onclick="deleteObat(this)">
                                            <i class="fa fa-trash"></i>
                            </a>
                ';
                return $tdObat;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
            'nama_obat' => ['string'],
            'jenis_obat' => ['string'],
            'jumlah_obat' => ['numeric'],
            'satuan_obat' => ['string'],
            'desc' => ['string'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'statusCode' => 422,
                'errors' => $validator->errors()->toArray(),
            ], 422);
        } else {
            $save = ObatModel::create($request->all());
            if ($save) {
                return response()->json([
                    'status' => true,
                    'statusCode' => 201,
                    'title' => 'Successfully Added',
                    'message' => 'Success menambah obat'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'statusCode' => 500,
                    'error' => 'error while processing add data'
                ], 500);
            }
        }
    }

    public function getDrugs(Request $request)
    {
        if ($request->has('q')) {
            $drugs = ObatModel::orderBy('nama_obat', 'ASC')->where('nama_obat', 'like', '%' . $request->q . '%')
                ->limit(5)->get();
        } else {
            $drugs = ObatModel::orderBy('nama_obat', 'ASC')->limit(5)->get();
        }
        return response()->json($drugs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_obat = ObatModel::findOrFail($id);
        $data_obat->nama_obat = $request->nama_obat;
        $data_obat->jenis_obat = $request->jenis_obat;
        $data_obat->jumlah_obat = $request->jumlah_obat;
        $data_obat->satuan_obat = $request->satuan_obat;
        $data_obat->desc = $request->desc;
        $save = $data_obat->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObatModel $obat): JsonResponse
    {
        $query = $obat->deleteOrFail();
        if ($query) {
            return response()->json(array(
                'success' => true,
                'title' => 'Delete data Obat',
                'icon' => 'success',
                'message' => 'Berhasil menghapus data obat!'
            ), 200);
        } else {
            return response()->json([
                'success' => true,
                'status' => false,
                'message' => 'There something went wrong!'
            ], 400);
        }
    }
}
