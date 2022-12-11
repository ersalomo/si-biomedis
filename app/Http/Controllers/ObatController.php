<?php

namespace App\Http\Controllers;

use App\Models\ObatModel;
use Illuminate\Support\Facades\{Validator, Response};
use Illuminate\Http\{
    Request,
    JsonResponse
};

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.content.obat.data-obat', [
            'drugs' => ObatModel::get(),
        ]);
        // return view('content.admin.home.obat.data-obat', [
        //     'drugs' => ObatModel::get(),
        // ]);
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
        $search = $request->search;
        if ($search == '') {
            $drugs = ObatModel::orderBy('nama_obat', 'ASC')->limit(5)->get();
        } else {
            $drugs = ObatModel::orderBy('nama_obat', 'ASC')->where('nama_obat', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }
        // $response = array();
        // foreach ($drugs as $drug) {
        //     $response[] = array(
        //         "id" => $drug->id,
        //         "text" => $drug->name
        //     );
        // }
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
        $obat->deleteOrFail();
        return response()->json(array(
            'success' => true,
            'title' => 'Delete data Obat',
            'icon' => 'success',
            'message' => 'Berhasil menghapus data obat!'
        ), 200);
    }
}
