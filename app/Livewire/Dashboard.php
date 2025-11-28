<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;

class Dashboard extends Component
{
    public $grafikBulan = [];
    public $grafikTransaksi = [];
    public $grafikPendapatan = [];

    public $totalProduk;
    public $totalTransaksi;
    public $totalPendapatan;
    public $totalUser;

    public function mount()
    {
        $this->totalProduk = Produk::count();
        $this->totalTransaksi = Transaksi::count();
        $this->totalPendapatan = Transaksi::where('status', 'selesai')->sum('total');
        $this->totalUser = User::count();

        for ($i = 1; $i <= 12; $i++) {
            $this->grafikBulan[] = date("M", mktime(0, 0, 0, $i, 1));

            $this->grafikTransaksi[] = Transaksi::whereMonth('created_at', $i)
                ->where('status', 'selesai')
                ->count();

            $this->grafikPendapatan[] = Transaksi::whereMonth('created_at', $i)
                ->where('status', 'selesai')
                ->sum('total');
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
