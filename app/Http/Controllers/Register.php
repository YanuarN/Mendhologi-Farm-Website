<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function index(){
        return view('login.register');
    }

    public function Create(Request $request){
        $data = $request->validate([
            'username' => ['required'],
            'nama_pengguna' => ['required'],
            'alamat' => ['required'],
            'whatsapp' => ['required'],
            'password' => ['required'],
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['whatsapp'] = (int) $data['whatsapp'];
        User::create($data);
        return redirect()->intended('/login');
    }
}
