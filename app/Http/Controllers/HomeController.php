<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show dashboard
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Cetak laporan transaksi
     */
    public function cetak()
    {
        $semuaTransaksi = Transaksi::where('status', 'selesai')->get();

        return view('cetak')->with([
            'semuaTransaksi' => $semuaTransaksi
        ]);
    }
}
