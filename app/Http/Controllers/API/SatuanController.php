<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Satuan;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Satuan::latest()->paginate(10);
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
            'KodeSatuan' => 'required|string|unique:satuan',
            'NamaSatuan' => 'required|string'
        ]);

        return Satuan::create([
            'KodeSatuan' => $request['KodeSatuan'],
            'NamaSatuan' => $request['NamaSatuan']
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
        $satuan = Satuan::findOrFail($id);
        $satuan->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
    }

    public function search() {
        if($filter = \Request::get('q')) {
            $satuan = Satuan::where(function($query) use ($filter) {
                $query->where('KodeSatuan','LIKE',"%$filter%")
                      ->orWhere('NamaSatuan','LIKE',"%$filter%");
            })->paginate(10);
        }
        else {
            $satuan = Satuan::latest()->paginate(10);
        }
        return $satuan;
    }
}