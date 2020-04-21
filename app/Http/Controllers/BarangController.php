<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\User;
use App\Barang;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;


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
            'foto_bar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'created_by' => 'required',
            'updated_by' => 'required'          
         ]);

        $files = $request->file('foto_bar');
        $imagebar = 'BRG-' . $request->nama_barang . '.' . $files->getClientOriginalExtension();
        $files->move(public_path("img\Bar "), $imagebar);

        Barang::create([
            'id_ruangan' => $request->id_ruangan,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            'foto_bar' => $insert['foto_bar'] = "$imagebar",
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

        $this->validate($request,[
            'id_ruangan' => 'required',
            'nama_barang' => 'required',
            'total' => 'required',
            'broken' => 'required',
            'foto_bar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'created_by' => 'required',
            'updated_by' => 'required'          
         ]);

        $barang->id_ruangan = $request->id_ruangan;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        if( $request->foto_bar){
            $picture = 'BRG-'.date('Ymdhis').'.'.$request->foto_bar->getClientOriginalExtension();
            $request->foto_bar->move('img\Bar', $picture);
            $barang->foto_bar = $picture;
        }
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        $barang->save();
        return redirect('/barang');
    }
    public function export(Request $request){

        return Excel::download(new BarangExport, 'barang-'.date("Y-m-d").'.xlsx');
    }
}
