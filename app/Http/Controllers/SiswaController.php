<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSiswaRequest;
use Database\Seeders\SiswaSeeder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index (Request $request){

        $perPage = $request->input('per_page', 10);
        $siswa = siswa::paginate($perPage);
        
        return view('siswa/index',compact('siswa'));

    }

    public function create(){
        
        return view('siswa/create');
    }

    public function storage(StoreSiswaRequest $request){


        // dd($request);
        // input gambar
        $foto = $request->file('foto');
        $foto->storeAs('public/foto',$foto->hashName());
        // $file = $foto->hashName();
        // dd($file);
        

        $siswa = new Siswa();
        $siswa->foto = $foto->hashName();
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

        // 
        $simpan = $siswa->save();

        if($simpan){
            return redirect()->route('siswa.create')->with('success','siswa berhasil di tambahkan!');
        }
        else{
            return redirect()->route('siswa.create')->with('error','siswa gagal di tambahkan!');
        }
        // dd($siswa);

        
            
    
    }
    public function profile (Siswa $siswa){
        
            // $siswa = siswa::find($id);
            // dd($siswa);
            // return view('siswa/profile')->with('siswa', $siswa);
            return view('siswa/profile', compact('siswa'));
    }

    public function update(UpdateRequest $request, Siswa $siswa){
            
                if( $request->hasFile('foto')){
                    // simpan foto baru
                    $foto = $request->file('foto');
                    // dd($foto);
                    $foto->storeAs('public/foto',$foto->hashName());
                    // delete foto
                    Storage::delete('public/foto'.$siswa->foto);

                    $siswa->foto = $foto->hashName();
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
                    $simpan = $siswa->update();
                }
                else {
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
                $simpan = $siswa->update();    
                // dd($siswa);
                }

                    return redirect()->route('siswa')->with('success','siswa berhasil di tambahkan!');
    }
}
