<?php

namespace App\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\Peminjaman;

class ListPeminjaman extends Component
{
    public $peminjamans;

    protected $listeners = ['peminjamanUpdated' => 'mount'];


    public function mount()
    {
        $this->muatUlangData();
    }

    public function muatUlangData()
    {
        $this->peminjamans = Peminjaman::with('ruang', 'pegawai')->get();
    }

    public function hapus($id)
    {
        $data = Peminjaman::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'Data berhasil dihapus.');
            $this->muatUlangData();
        }
    }
    public $showForm = false;

public function toggleForm()
{
    $this->showForm = !$this->showForm;
}

public function render()
{
    return view('livewire.peminjaman.list-peminjaman');
}

}
