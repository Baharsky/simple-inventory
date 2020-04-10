<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\User;
use App\Barang;

class BarangController extends Controller
{
     public function index(Request $request){

    	$barang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%');
        })->paginate(5);
        $ruangan = Ruangan::all();
        $user = User::all();

        return view('Barang.index', compact('ruangan', 'barang', 'user'));
    }

    public function create (){
        $ruangan = Ruangan::all();
        return view('barang.createbar',compact('ruangan'));
    }
    
    public function store(Request $request)
    {
         $this->validate($request,[
            'id_ruangan' => 'required',
            'nama_barang' => 'required',
            'total' => 'required',
            'broken' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required'          
         ]);

        Barang::create([
            'id_ruangan' => $request->id_ruangan,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by  
        ]);
        return redirect('barang');
    }

    public function delete($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('barang');
    }

     public function edit($id){
        $barang = Barang::findOrFail($id);
        $ruangan = Ruangan::all();
        return view('Barang.editbar', compact('ruangan', 'barang'));
    }

     public function update($id, Request $request){
        $barang = Barang::findOrFail($id);
        $barang->id_ruangan = $request->id_ruangan;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        $barang->save();
        return redirect('/barang');
    }
}
