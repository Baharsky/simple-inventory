<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use App\Imports\FakultasImport;
use Maatwebsite\Excel\Facades\Excel;


class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        // numbering
        $data = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search);
        })->paginate(5);

        return view('fakultas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('fakultas.create');
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
            'nama_fakultas' => 'required'
         ]);

        Fakultas::create([
            'nama_fakultas' => $request->nama_fakultas
        ]);
        return redirect('fakultas');
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
        $fakultas = Fakultas::findOrFail($id);

        return view('fakultas.edit', compact('fakultas'));
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
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->nama_fakultas = $request->nama_fakultas;
        $fakultas->save();

        return redirect('fakultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete($fakultas);

        return redirect('fakultas');
    }

    public function import(Request $request){
        $this->validate($request, [
            'excel' => 'required'
        ]);

        $file = $request->file('excel');
        $filename = date('dmYhis').'-'.$file->getClientOriginalName();
        $file->move('excel/fakultas', $filename);

        Excel::import(new FakultasImport, public_path('/excel/fakultas/').$filename);

        return redirect()-> route('fakultas.index');
    }
}
