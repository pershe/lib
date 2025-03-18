<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriPeminjaman;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $histori = HistoriPeminjaman::with(['user', 'book'])->get();
        return view('petugas.histori', compact('histori'));
    }

    public function generatePDF()
    {
        $histori = HistoriPeminjaman::with(['user', 'book'])->get();

        $pdf = Pdf::loadView('petugas.laporan_pdf', compact('histori'));

        return $pdf->download('laporan_peminjaman.pdf');
    }
}
