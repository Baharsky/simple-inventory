<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Jurusan;

class RuanganController extends Controller
{
    public function index(Request $request){

    	$ruangan = Ruangan::when($request->search, function($query) use($request){
            $query->where('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        $jurusan = Jurusan::all();

        return view('Ruangan.index', compact('ruangan', 'jurusan'));
    }

     public function create (){
        $jurusan = Jurusan::all();
        return view('ruangan.createru',compact('jurusan'));
    }
    
    public function store(Request $request)
    {
         $this->validate($request,[
            'id_jurusan' => 'required',
            'nama_ruangan' => 'required'            
         ]);

        Ruangan::create([
            'id_jurusan' => $request->id_jurusan,
            'nama_ruangan' => $request->nama_ruangan
        ]);
        return redirect('ruangan');
    }

    public function delete($id){
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        return redirect('/ruangan');
    }

     public function edit($id){
        $ruangan = Ruangan::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('Ruangan.editru', compact('ruangan', 'jurusan'));
    }

     public function update($id, Request $request){
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->id_jurusan = $request->id_jurusan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->save();
        return redirect('/ruangan');
    }

}
