<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $transaksi = Transaksi::with('barang:id,nama')->get();
        return $transaksi->toJson();
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
            'nama_pembeli' => 'required',
            'jumlah_beli' => 'required'
        ]);

        $transaksi = Transaksi::create($request->all());

        $msg = [
            'success' => true,
            'message' => 'Transaksi created successfully!',
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
        $transaksi = Transaksi::with('barang:id,nama')->find($id);
        return response()->json($transaksi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::with('barang:id,nama')->find($id);
        return $transaksi->toJson();
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
            'nama_pembeli' => 'required',
            'jumlah_beli' => 'required'
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->update($request->except('barang'));

        $msg = [
            'success' => true,
            'message' => 'Transaksi updated successfully!'
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
        $transaksi = Transaksi::find($id);
        if(empty($transaksi)){
            $msg = [
                'success' => false,
                'message' => 'Transaksi not found!'
            ];
            return response()->json($msg);
        }

        $transaksi->delete();
        $msg = [
                'success' => true,
                'message' => 'Transaksi deleted successfully!'
            ];
        return response()->json($msg);
    }
}
