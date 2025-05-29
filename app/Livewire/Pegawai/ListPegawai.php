<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;

class ListPegawai extends Component
{
    public function render()
    {
        $pegawais = Pegawai::with('unitKerja')->get();

        return view('livewire.pegawai.list-pegawai', compact('pegawais'));
    }

    public function hapus($id)
    {
        Pegawai::find($id)?->delete();
        session()->flash('message', 'Data pegawai berhasil dihapus.');
    }
}
