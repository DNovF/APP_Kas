<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as ModelUser;

class User extends Component
{
    public $pilihanMenu = 'lihat';
    public $nama = '';
    public $email = '';
    public $password = '';
    public $peran = '';
    public $penggunaTerpilih = null;

    public function pilihHapus($id){
        $this->penggunaTerpilih = ModelUser::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function pilihEdit($id)
    {
        $pengguna = ModelUser::findOrFail($id);
        $this->nama = $pengguna->name;
        $this->email = $pengguna->email;
        $this->peran = $pengguna->peran;
        $this->penggunaTerpilih = $pengguna;
        $this->pilihanMenu = 'edit';
    }

    public function hapus()
    {
        if (! $this->penggunaTerpilih || ! $this->penggunaTerpilih instanceof ModelUser) {
            session()->flash('error', 'Tidak ada pengguna yang dipilih.');
            $this->pilihanMenu = 'lihat';
            return;
        }

        $this->penggunaTerpilih->delete();

        $this->reset(['nama', 'email', 'password', 'peran', 'penggunaTerpilih']);
        $this->pilihanMenu = 'lihat';
        session()->flash('success', 'Pengguna berhasil dihapus.');
    }

    public function batal()
    {
        $this->reset();
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'peran' => 'required',
            'password' => 'required',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Format mesti Email',
            'email.unique' => 'Email sudah digunakan',
            'peran.required' => 'Peran Harus Diisi',
            'password.required' => 'Password harus Diisi',
        ]);

        $simpan = new ModelUser();
        $simpan->name = $this->nama;
        $simpan->email = $this->email;
        $simpan->password = bcrypt($this->password);
        $simpan->peran = $this->peran;
        $simpan->save();

        $this->reset('nama', 'email', 'password', 'peran');
        $this->pilihanMenu = 'lihat';
    }

    public function render()
    {z
        return view('livewire.user')->with([
            'semuaPengguna' => ModelUser::all()
        ]);
    }
}
