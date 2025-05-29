<?php

namespace App\Livewire\Peminjaman;

use App\Models\Peminjaman;
use App\Models\Ruang;
use App\Models\Pegawai;
use Livewire\Component;

class CreatePeminjaman extends Component
{
    public $ruang_id, $pegawai_id, $tanggal, $jam_mulai, $jam_akhir, $keterangan;

    public $ruangs;
    public $pegawais;

    protected $rules = [
        'ruang_id' => 'required',
        'pegawai_id' => 'required',
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'jam_akhir' => 'required|after:jam_mulai',
        'keterangan' => 'nullable|string',
    ];

    public function mount()
    {
        $this->ruangs = Ruang::all();
        $this->pegawais = Pegawai::all();
    }

    public function simpan()
    {
        $this->validate([
            'ruang_id' => 'required|exists:ruang,id',
            'pegawai_id' => 'required|exists:pegawai,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
            'keterangan' => 'nullable|string',
        ]);
    
        \App\Models\Peminjaman::create([
            'ruang_id' => $this->ruang_id,
            'pegawai_id' => $this->pegawai_id,
            'tanggal' => $this->tanggal,
            'jam_mulai' => $this->jam_mulai,
            'jam_akhir' => $this->jam_akhir,
            'keterangan' => $this->keterangan,
        ]);
    
        // ✅ Redirect setelah simpan ke halaman list
        return redirect('/peminjaman')->with('success', 'Peminjaman berhasil ditambahkan.');
    }
    

    public function render()
    {
        return view('livewire.peminjaman.create-peminjaman');
    }
}
