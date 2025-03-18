<?php

namespace App\Http\Controllers;

use App\Models\Lis_Denda;
use Illuminate\Http\Request;

class LisDendaController extends Controller
{
    public function index()
    {
        $denda = Lis_Denda::with('peminjaman')->where('status', 'belum_dibayar')->get();
        return view('petugas.denda', compact('denda'));
    }

    public function bayarDenda($id)
    {
        $denda = Lis_Denda::findOrFail($id);
        $denda->update([
            'dibayar' => 1,
            'status' => 'sudah_dibayar',
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Denda berhasil dibayar!');
    }
}
