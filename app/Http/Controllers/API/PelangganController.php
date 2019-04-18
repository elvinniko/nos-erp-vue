<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pelanggan::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'KodePelanggan' => 'required|string|unique:pelanggan',
            'NamaPelanggan' => 'required|string'
        ]);

        return Pelanggan::create([
            'KodePelanggan' => $request['KodePelanggan'],
            'NamaPelanggan' => $request['NamaPelanggan'],
            'Kontak' => $request['Kontak'],
            'Handphone' => $request['Handphone'],
            'Email' => $request['Email']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $alamat = Alamat::findOrFail($id);
        // return $alamat->show();
        return Pelanggan::findOrFail($id);
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
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
    }

    public function search() {
        if($filter = \Request::get('q')) {
            $pelanggan = Pelanggan::where(function($query) use ($filter) {
                $query->where('KodePelanggan','LIKE',"%$filter%")
                      ->orWhere('NamaPelanggan','LIKE',"%$filter%")
                      ->orWhere('Kontak','LIKE',"%$filter%")
                      ->orWhere('Handphone','LIKE',"%$filter%")
                      ->orWhere('Email','LIKE',"%$filter%");
            })->paginate(10);
        }
        else {
            $pelanggan = Pelanggan::latest()->paginate(10);
        }
        return $pelanggan;
    }
}