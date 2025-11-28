<?php

namespace App\Livewire;

use App\Models\Produk as ModelProduk;
use Livewire\Component;

class Produk extends Component
{
    public $pilihanMenu = 'lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $produkTerpilih;

    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);

        $this->nama  = $this->produkTerpilih->nama;
        $this->kode  = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok  = $this->produkTerpilih->stok;

        $this->pilihanMenu = "edit";
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => ['required', 'unique:produks,kode,' . $this->produkTerpilih->id],
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'kode.required' => 'Kode Harus Diisi',
            'kode.unique' => 'Kode sudah digunakan',
            'harga.required' => 'Harga Harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
        ]);

        $this->produkTerpilih->update([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'harga' => $this->harga,
            'stok' => $this->stok,
        ]);

        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->pilihanMenu = "hapus";
    }

    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function batal()
    {
        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => 'required|unique:produks,kode',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'kode.required' => 'Kode Harus Diisi',
            'kode.unique' => 'Kode sudah digunakan',
            'harga.required' => 'Harga Harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
        ]);

        ModelProduk::create([
            'nama'  => $this->nama,
            'kode'  => $this->kode,
            'harga' => $this->harga,
            'stok'  => $this->stok,
        ]);

        $this->reset('nama', 'kode', 'harga', 'stok');
        $this->pilihanMenu = 'lihat';
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function render()
    {
        return view('livewire.produk', [
            'semuaProduk' => ModelProduk::all()
        ]);
    }
}