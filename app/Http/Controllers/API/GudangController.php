<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gudang;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gudang::latest()->paginate(10);
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
            'KodeLokasi' => 'required|string|unique:lokasi',
            'NamaLokasi' => 'required|string',
            'Tipe' => 'required|string'
        ]);

        return Gudang::create([
            'KodeLokasi' => $request['KodeLokasi'],
            'NamaLokasi' => $request['NamaLokasi'],
            'Tipe' => $request['Tipe']
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
        $gudang = Gudang::findOrFail($id);
        $this->validate($request,[
            'KodeLokasi' => 'required|string|unique:lokasi',
            'NamaLokasi' => 'required|string',
            'Tipe' => 'required|string'
        ]);
        $gudang->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudang = Gudang::findOrFail($id);
        $gudang->delete();
    }

    public function search() {
        if($filter = \Request::get('q')) {
            $gudang = Gudang::where(function($query) use ($filter) {
                $query->where('KodeLokasi','LIKE',"%$filter%")
                      ->orWhere('NamaLokasi','LIKE',"%$filter%")
                      ->orWhere('Tipe','LIKE',"%$filter%");
            })->paginate(10);
        }
        else {
            $gudang = Gudang::latest()->paginate(10);
        }
        return $gudang;
    }
}