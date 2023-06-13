<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSiswaRequest;
use Database\Seeders\SiswaSeeder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateRequest;
use App\Models\sosmed;
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
        // inisialisasi tabel siswa dan sosmed
        $siswa = new Siswa();
        $sosmed = new sosmed();

        // simpan inisialisasi request file 'foto'
        $foto = $request->file('foto');
        $foto->storeAs('public/foto',$foto->hashName());
        // simpan ke tabel siswa
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
        $simpan = $siswa->save();
        

        foreach ($request['nama_sosmed'] as $index => $nama) {
            $sosmed = new sosmed();
            $sosmed->siswa_id = $siswa->id;
            $sosmed->nama = $nama;
            $sosmed->link = $request['link'][$index];
            $sosmed->save();
        }

        
        return redirect()->route('siswa.create')->with('success','siswa berhasil di tambahkan!');
        
    }
    public function profile (siswa $siswa){
        
            $siswa = siswa::with('sosmed')->find($siswa->id);
            // dd($siswa);
            return view('siswa/profile', compact('siswa'));
    }

    public function update(UpdateRequest $request, Siswa $siswa){

                dd($request);
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
