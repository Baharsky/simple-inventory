<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use DB;

class JurusanController extends Controller
{

	public function search(Request $request){
        $datafakultas = Fakultas::all();
        $search = $request->search;
        $searchFakultas = DB::table('Fakultas')
                            ->select('id')
                            ->where('nama_fakultas', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $data = DB::table('jurusan')->where('fakultas_id', '=', $src)->paginate(10);

            return view('jurusan.index', compact('data','datafakultas'));
        }
        else{
            $data = DB::table('jurusan')
                            ->where('fakultas_id', '=', null)
                            ->paginate(10);
            return view('jurusan.index', compact('data', 'datafakultas'));
        }
    }


    public function index(Request $request){
        $data = Jurusan::paginate(10);
        $datafakultas = Fakultas::all();

        return view('jurusan.index', compact('data','datafakultas'));
    }


     public function create()
    {
    	$datafakultas = Fakultas::all();
        return view('jurusan.createjur',compact('datafakultas'));
    }


    public function store(Request $request)
    {
         $this->validate($request,[
            'nama_jurusan' => 'required',
            'fakultas_id' => 'required'
         ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'fakultas_id' => $request->fakultas_id
        ]);
        return redirect('jurusan');
    }


    public function edit($id)
    {
    	$datafakultas = Fakultas::all();
        $jurusan = Jurusan::findOrFail($id);

        return view('jurusan.editjur', compact('jurusan','datafakultas'));
    }


    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect('jurusan');
    }


     public function delete($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete($jurusan);

        return redirect('jurusan');
    }

}
