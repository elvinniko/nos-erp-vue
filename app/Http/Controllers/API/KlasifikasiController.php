<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Klasifikasi;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Klasifikasi::latest()->paginate(10);
        // return Klasifikasi::latest()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'KodeKategori' => 'required|string|unique:kategori',
            'NamaKategori' => 'required|string',
            'KodeItemAwal' => 'required|string|unique:kategori'
        ]);

        return Klasifikasi::create([
            'KodeKategori' => $request['KodeKategori'],
            'NamaKategori' => $request['NamaKategori'],
            'KodeItem' => $request['KodeItemAwal']
        ]);
        */
        $klasifikasi = new Klasifikasi;
        $klasifikasi->KodeKategori = $request['KodeKategori'];
        $klasifikasi->NamaKategori = $request['NamaKategori'];
        $klasifikasi->KodeItem = $request['KodeItem'];
        $klasifikasi->save();
        return response()->json($klasifikasi);
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
        $klasifikasi = Klasifikasi::findOrFail($id);
        // $this->validate($request,[
        //     'KodeKategori' => 'required|string|unique:kategori',
        //     'NamaKategori' => 'required|string',
        //     'KodeItem' => 'required|string|unique:kategori'
        // ]);
        $klasifikasi->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klasifikasi = Klasifikasi::findOrFail($id);
        $klasifikasi->delete();
    }

    public function search()
    {
        if ($filter = \Request::get('q')) {
            $klasifikasi = Klasifikasi::where(function ($query) use ($filter) {
                $query->where('KodeKategori', 'LIKE', "%$filter%")
                    ->orWhere('NamaKategori', 'LIKE', "%$filter%")
                    ->orWhere('KodeItem', 'LIKE', "%$filter%");
            })->paginate(10);
        } else {
            $klasifikasi = Klasifikasi::latest()->paginate(10);
        }
        return $klasifikasi;
    }
}
