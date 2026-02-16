<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Daftar Aspirasi';
        $query = Aspirasi::query();

        if(Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }

        if($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        if($request->status) {
            $query->where('status', $request->status);
        }

        $query->orderByRaw('FIELD(status, "diajukan", "diproses", "ditolak", "diterima", "selesai") ASC');

        $aspirasi = $query->latest()->get();
        $kategori = Kategori::all();

        return view('aspirasi.index', compact('title', 'aspirasi'));
    }

    public function create()
    {
        $title = 'Buat Aspirasi Baru';
        $kategori = Kategori::all();

        return view('aspirasi.create', compact('title', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('aspirasi', 'public');
        }

        Aspirasi::create([
            'user_id' => Auth::id(),
            'kategori_id' => $request->kategori_id,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath,
            // status otomatis = 'diajukan' dari migration
        ]);

        return redirect()
            ->route('aspirasi.index')
            ->with('success', 'Aspirasi berhasil dibuat.');
    }

    public function show(string $id)
    {
        $title = 'Detail Aspirasi';
        $aspirasi = Aspirasi::findOrFail($id);

        if (Auth::user()->role === 'user' && $aspirasi->user_id !== Auth::id()) {
            abort(403);
        }

        return view('aspirasi.show', compact('title', 'aspirasi'));
    }

    public function updateStatus(Request $request, Aspirasi $aspirasi) {
    $request->validate([
        'status' => 'required|in:diajukan,diproses,ditolak,diterima,selesai',
    ]);

    $aspirasi->update([
        'status' => $request->status,
    ]);

    $aspirasi->refresh();

    return redirect()
        ->route('aspirasi.index')
        ->with('success', 'Status aspirasi diperbarui.');
    }
}