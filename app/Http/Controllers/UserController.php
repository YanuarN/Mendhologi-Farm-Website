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
        $data['password'] = Hash::make(['password']);
        $data['whatsapp'] = (int)['whatsapp'];
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('dasboard.user.index')->with('success', 'User berhasil ditambahkan.');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'nullable|min:8',
        ]);

        // Update data user ke database
        $user = User::findOrFail($idPengguna);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
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
