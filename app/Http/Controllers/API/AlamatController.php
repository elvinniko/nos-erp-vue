<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alamat;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alamat::latest()->paginate(10);
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
            'KodePelanggan' => 'required|string|unique:alamat',
            'Alamat' => 'required|string'
        ]);

        return Alamat::create([
            'KodePelanggan' => $request['KodePelanggan'],
            'Alamat' => $request['NamaPelanggan'],
            'Kota' => $request['Kontak'],
            'Provinsi' => $request['Handphone'],
            'Faks' => $request['Email'],
            'Telepon' => $request['Telepon']
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
        return Alamat::findOrFail($id);
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
        $alamat = Alamat::findOrFail($id);
        $alamat->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alamat = Alamat::findOrFail($id);
        $alamat->delete();
    }

    public function search() {
        if($filter = \Request::get('q')) {
            $alamat = Alamat::where(function($query) use ($filter) {
                $query->where('KodePelanggan','LIKE',"%$filter%")
                      ->orWhere('Alamat','LIKE',"%$filter%")
                      ->orWhere('Kota','LIKE',"%$filter%")
                      ->orWhere('Provinsi','LIKE',"%$filter%")
                      ->orWhere('Faks','LIKE',"%$filter%")
                      ->orWhere('Telepon','LIKE',"%$filter%");
            })->paginate(10);
        }
        else {
            $alamat = Alamat::latest()->paginate(10);
        }
        return $alamat;
    }
}