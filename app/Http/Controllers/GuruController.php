<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruStoreRequest;
use App\Http\Resources\GuruResource;
use App\Models\Guru;
use Illuminate\Http\Request;


class GuruController extends Controller
{
    public function index(){
        return redirect('http://localhost:5173/vue');
    }

    
}
