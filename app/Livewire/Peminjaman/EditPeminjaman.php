<?php

namespace App\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Ruang;
use App\Models\Pegawai;

class EditPeminjaman extends Component
{
    public $peminjamanId;
    public $ruang_id, $pegawai_id, $tanggal, $jam_mulai, $jam_akhir, $keterangan;

    public $ruangs = [];
    public $pegawais = [];

    public function mount($id)
    {
        $this->peminjamanId = $id;
        $peminjaman = Peminjaman::findOrFail($id);

        $this->ruang_id = $peminjaman->ruang_id;
        $this->pegawai_id = $peminjaman->pegawai_id;
        $this->tanggal = $peminjaman->tanggal;
        $this->jam_mulai = $peminjaman->jam_mulai;
        $this->jam_akhir = $peminjaman->jam_akhir;
        $this->keterangan = $peminjaman->keterangan;

        // Ambil data ruang dan pegawai untuk dropdown
        $this->ruangs = Ruang::all();
        $this->pegawais = Pegawai::all();
    }

    protected $rules = [
        'ruang_id' => 'required|exists:ruang,id',
        'pegawai_id' => 'required|exists:pegawai,id',
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'jam_akhir' => 'required',
        'keterangan' => 'nullable|string',
    ];

    public function update()
    {
        $this->validate();

        $peminjaman = Peminjaman::findOrFail($this->peminjamanId);
        $peminjaman->update([
            'ruang_id' => $this->ruang_id,
            'pegawai_id' => $this->pegawai_id,
            'tanggal' => $this->tanggal,
            'jam_mulai' => $this->jam_mulai,
            'jam_akhir' => $this->jam_akhir,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('success', 'Data peminjaman berhasil diupdate.');

        return redirect('/peminjaman');
    }

    public function render()
    {
        return view('livewire.peminjaman.edit-peminjaman');
    }
}
