<?php

namespace App\Http\Controllers;

use App\Fakultas;
use App\Jurusan;
use App\Ruangan;
use App\Barang;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function dashboard() {

	$userAdmin = User::where(['role' => 'admin'])->count();
    $userStaff = User::where(['role' => 'staff'])->count();
    $fakultas = Fakultas::count();
    $jurusan = Jurusan::count();
    $ruangan = Ruangan::count();
    $barang = Barang::count();
	return view('dashboard', compact('userAdmin','userStaff','fakultas','jurusan','ruangan','barang'));

	}

}
