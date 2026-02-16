<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampilkan hanya user (bukan admin)
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Form tambah user
    public function create()
    {
        return view('users.create');
    }

    // Simpan user baru (role otomatis = user)
    public function store(Request $request){
    $request->validate([
        'username' => 'required|unique:users',
        'name' => 'required',
        'password' => 'required|confirmed|min:6',
        'nis' => 'nullable|max:5',
        'kelas' => 'nullable|max:10',
    ]);

    User::create([
        'username' => $request->username,
        'name' => $request->name,
        'nis' => $request->nis,
        'kelas' => $request->kelas,
        'password' => bcrypt($request->password),
        'role' => 'user', // default role
    ]);

    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
}


    // Form edit user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => "required|string|max:255|unique:users,username,{$user->id}",
            'name' => 'required|string|max:255',
            'nis' => 'nullable|string|max:10',
            'kelas' => 'nullable|string|max:50',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
}
}