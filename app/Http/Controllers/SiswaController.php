<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index (){

        $siswa = siswa::all();
        return view('siswa/index')->with('siswa', $siswa);

    }

    public function create(){
        
        return view('siswa/create');
    }
}
