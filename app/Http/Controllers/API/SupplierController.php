<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Supplier::latest()->paginate(10);
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
            'KodeSupplier' => 'required|string|unique:supplier',
            'NamaSupplier' => 'required|string',
            'Alamat' => 'required|string',
            'Telepon' => 'required|string',
            'Handphone' => 'required|string'
        ]);

        return Supplier::create([
            'KodeSupplier' => $request['KodeSupplier'],
            'NamaSupplier' => $request['NamaSupplier'],
            'Alamat' => $request['Alamat'],
            'Telepon' => $request['Telepon'],
            'Handphone' => $request['Handphone']
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
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
    }

    public function search() {
        if($filter = \Request::get('q')) {
            $supplier = Supplier::where(function($query) use ($filter) {
                $query->where('KodeSupplier','LIKE',"%$filter%")
                      ->orWhere('NamaSupplier','LIKE',"%$filter%")
                      ->orWhere('Alamat','LIKE',"%$filter%")
                      ->orWhere('Telepon','LIKE',"%$filter%")
                      ->orWhere('Handphone','LIKE',"%$filter%");
            })->paginate(10);
        }
        else {
            $supplier = Supplier::latest()->paginate(10);
        }
        return $supplier;
    }
}