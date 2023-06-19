<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Http\Resources\GuruResource;
use App\Http\Requests\GuruStoreRequest;
use Illuminate\Support\Facades\Storage;


class GuruController extends Controller
{
    
    public function index (Request $request){
        // return 'disini';
        $keyword = $request->input('keyword');
        $guru = Guru::query();

        if ($keyword) {
            $guru->where(function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%')
                  ->orWhere('alamat', 'like', '%' . $keyword . '%');
            });
        }
        $result = $guru->get();
        return new GuruResource(true, 'List Data Post', $result);
        
    }

    public function store( Request $request){
        // dd($request);

        $guru = new Guru();
        $foto = $request->file('foto');
        $foto->storeAs('public/guru', $foto->hashName());

        $guru->nama = $request->nama;
        $guru->wali_kelas = $request->wali_kelas;
        $guru->alamat = $request->alamat;
        $guru->telepon = $request->telepon;
        $guru->foto = $foto->hashName();
        $guru->save();

        return new GuruResource(true,'data berhasil disimpan!',$guru);
    }

    public function update(Guru $guru, Request $request){
        // dd($guru);
        // $guru = new Guru();

        if($request->file('foto'))
        {
            dd('disini');
            $foto = $request->file('foto');
            $foto->storeAs('public/guru', $foto->hashName());   

            storage::delete('public/guru'. basename($guru->foto));

            $guru->foto = $foto->hashName();
            $guru->nama = $request->nama;
            $guru->wali_kelas = $request->wali_kelas;
            $guru->alamat = $request->alamat;
            $guru->telepon = $request->telepon;
            $guru->update();
        }else{
            // $guru->fill($request->all());
            $guru->nama = $request->nama;
            $guru->wali_kelas = $request->wali_kelas;
            $guru->alamat = $request->alamat;
            $guru->telepon = $request->telepon;
            $guru->update();
        }

        return new GuruResource(true,'berhasil Update!',$guru);

    }

    public function destroy(Guru $guru){
        storage::delete('public/guru'. basename($guru->foto));
        $guru->delete();

        return new GuruResource(true,'data di hapus',null);
    }
    

    public function show(Guru $guru){
        
        return new GuruResource(true,'Detail Data Post',$guru);
    }
}
