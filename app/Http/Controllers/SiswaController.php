<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSiswaRequest;
use Database\Seeders\SiswaSeeder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index (Request $request){

        $perPage = $request->input('per_page', 10);
        $siswa = siswa::paginate($perPage);
        
        return view('siswa/index')->with('siswa', $siswa);

    }

    public function create(){
        
        return view('siswa/create');
    }

    public function storage(StoreSiswaRequest $request){

        // $validator = Validator::make($request->all(), [
        //     'nama' => 'required',
        //     'jenis_kelamin'  => 'required',
        //     'tanggal_lahir' => 'required',
        //     'alamat' => 'required',
        //     'telepon' => 'required',
        //     'email' => 'required',
        //     'agama' => 'required',
        //     'kewarganegaraan' => 'required',
        //     'kelas' => 'required',
        //     'jurusan' => 'required',
        //     'foto' => 'required',
        //     'catatan'=> 'required',
        // ]);

        // $validator = Validator::make($request->all());
        
        // if($request->fails()){
        //     return redirect()->back()->withErrors($request)->withInput($request->all);
        // }
        // return redirect()->route('success')->with('success', 'Data berhasil disimpan');

        // dd($request);
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->telepon = $request->telepon;
        $siswa->email = $request->email;
        $siswa->agama = $request->agama;
        $siswa->kewarganegaraan = $request->kewarganegaraan;
        $siswa->kelas = $request->kelas;
        $siswa->jurusan = $request->jurusan;
        $simpan = $siswa->save();

        if($simpan){
            return redirect()->route('siswa.create')->with('success','siswa berhasil di tambahkan!');
        }
        else{
            return redirect()->route('siswa.create')->with('error','siswa gagal di tambahkan!');
        }
        // dd($siswa);

        
            
    
    }
}
