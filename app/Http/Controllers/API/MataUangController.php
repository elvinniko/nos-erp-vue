<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MataUang;

class MataUangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MataUang::latest()->paginate(10);
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
            'KodeMataUang' => 'required|string|unique:matauang',
            'NamaMataUang' => 'required|string',
            'Nilai' => 'required|int'
        ]);

        return MataUang::create([
            'KodeMataUang' => $request['KodeMataUang'],
            'NamaMataUang' => $request['NamaMataUang'],
            'Nilai' => $request['Nilai']
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
        $matauang = MataUang::findOrFail($id);
        $matauang->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matauang = MataUang::findOrFail($id);
        $matauang->delete();
    }

    public function search() {
        if($filter = \Request::get('q')) {
            $matauang = MataUang::where(function($query) use ($filter) {
                $query->where('KodeMataUang','LIKE',"%$filter%")
                      ->orWhere('NamaMataUang','LIKE',"%$filter%")
                      ->orWhere('Nilai','LIKE',"%$filter%");
            })->paginate(10);
        }
        else {
            $matauang = MataUang::latest()->paginate(10);
        }
        return $matauang;
    }
}