<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\siswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::with(['roles' => function ($query) {
        //     $query->where('name', 'admin');
        // }])->get();
        // $siswa = siswa::all();

        // return view('index')->with('siswa', $siswa);
        return view('home');
        
    }
}
