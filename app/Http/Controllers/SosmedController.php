<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Sosmed;

class SosmedController extends Controller
{
    public function delete(Sosmed $sosmed){
        dd($sosmed);
        $data = Sosmed::where('id', $sosmed->id)->delete();
        dd($data);

        return redirect()->route('siswa.profile',$sosmed->id)->with(['success'=>'data sosmed berhasil dihapus!']);
    }
}
