<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function store(Request $request, Aspirasi $aspirasi) {
        $request->validate(['message' => 'required']);

        if (Auth::user()->role == 'user' && $aspirasi->user_id != Auth::id()) {
            abort(403);
        }

        Response::create([
            'aspirasi_id' => $aspirasi->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('aspirasi.show', $aspirasi)->with('success', 'Balasan Dikirim');
    }
}
