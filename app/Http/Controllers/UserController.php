<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dasboard.user.index', compact('users'));
    }

    public function create()
    {
        return view('dasboard.user.create');
    }

    public function store(Request $request)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'username' => ['required'],
            'nama_pengguna' => ['required'],
            'alamat' => ['required'],
            'whatsapp' => ['required'],
            'password' => ['required'],
        ]);
    
        // Simpan data user ke database
        $data['password'] = Hash::make($request->password);
        $data['whatsapp'] = (int) $request->whatsapp;
    
        User::create([
            'username' => $request->username,
            'nama_pengguna' => $request->nama_pengguna,
            'alamat' => $request->alamat,
            'whatsapp' => $data['whatsapp'],
            'password' => $data['password'],
        ]);
    
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }
    

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($idPengguna)
    {
        $user = User::findOrFail($idPengguna);
        return view('dasboard.user.edit', compact('user'));
    }

    public function update(Request $request, $idPengguna)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'nama_pengguna' => 'required',
            'alamat' => 'required',
            'whatsapp' => 'required',
        ]);
    
        // Update data user ke database
        $user = User::findOrFail($idPengguna);
        $user->update([
            'nama_pengguna' => $request->nama_pengguna,
            'alamat' => $request->alamat,
            'whatsapp' => $request->whatsapp,
        ]);
    
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
