<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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
        // dd(Siswa::all());
        $perPage = $request->input('per_page', 5);
        $keyword = $request->input('keyword');
        $siswa = Siswa::query();

        if ($keyword) {
            $siswa->where('nama', 'like', "%{$keyword}%")
                ->orWhere('jurusan', 'like', "%{$keyword}%")
                ->orWhere('alamat', 'like', "%{$keyword}%")
                ->orWhere('id', 'like', "%{$keyword}%");
        }

        $siswa = $siswa->latest()->paginate($perPage);

        return view('siswa.index', compact('siswa', 'keyword', 'perPage'));

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
            // dd($request->all());

                if (is_array($request->linkSosmed)) 
                {
                    foreach ($request->linkSosmed as $namaSosmed) 
                    {
                      $sosmed = sosmed::where('id', $namaSosmed['id'])->update([
                                'link' => $namaSosmed['link'],
                                'nama' => $namaSosmed['nama']
                        ]);
                    };
                }
                
                // dd($request);
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
                
               $sosmed = new Sosmed();
               $sosmed->name = $request->twiter;

                if (is_array($request->tambahSosmed)) {
                    // dd('here is sosmed available');
                    foreach ($request->tambahSosmed as $tambah) 
                                {
                                    $sosmed = new sosmed();

                                    $sosmed->siswa_id = $siswa->id;
                                    $sosmed->nama = $tambah['nama'];
                                    $sosmed->link = $tambah['link'];
                                    $sosmed->save();
                                }
                }
                    return redirect()->route('siswa.profile',['siswa'=> $siswa->id])->with('success','siswa berhasil di tambahkan!');
    }

    public function delete(Siswa $siswa){
        // dd($siswa->id);
        $sosmed = Sosmed::where('siswa_id',$siswa->id)->delete();
        Storage::delete('public/foto/'.$siswa->foto);
        
        $siswa->delete();
        
        // dd($sosmed);
        return redirect()->route('siswa')->with(['success'=>'Siswa Berhasil di Hapus!']);
    } 

    public function search (){
    
    }

}
