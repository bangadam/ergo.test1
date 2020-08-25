<?php

namespace App\Http\Controllers;

use App\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pemilik::with('barang:id,nama')->get()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $pemilik = Pemilik::create($request->all());

        $msg = [
            'success' => true,
            'message' => 'Pemilik created successfully!',
        ];

        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemilik = Pemilik::with('barang:id,nama')->find($id);
        return response()->json($pemilik);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemilik = Pemilik::find($id);
        return $pemilik->toJson();
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
        $this->validate($request, [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'barang_id' => 'required',
            'alamat' => 'required',
        ]);

        $pemilik = Pemilik::find($id);
        $pemilik->update($request->except('barang'));

        $msg = [
            'success' => true,
            'message' => 'Barang created successfully!'
        ];

        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $pemilik = Pemilik::find($id);
        if(empty($pemilik)){
            $msg = [
                'success' => false,
                'message' => 'Pemilik not found!'
            ];
            return response()->json($msg);
        }

        $pemilik->delete();
        $msg = [
                'success' => false,
                'message' => 'Pemilik deleted successfully!'
            ];
        return response()->json($msg);
    }
}
