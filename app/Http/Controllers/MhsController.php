<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mahasiswa;

class MhsController extends Controller
{
    public function login(){
        return view('layoutmhs.login');
    }
}
