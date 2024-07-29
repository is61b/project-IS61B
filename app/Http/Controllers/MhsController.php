<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class MhsController extends Controller
{
    public function login(){
        return view('layoutmhs.login');
    }

    public function ceklogin(Request $request){
        $input = $request->all();

        $this->validate($request,[
            'nim' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('mahasiswa')->attempt(['nim' => $input['nim'], 'password' => $input['password']])){
            return redirect('/db-mahasiswa');
        }else{
            return redirect()->back()->with('error','NIM atau Password Salah!!');
        }
    }

    public function index(){
        return view('layoutmhs.master');
    }
}
