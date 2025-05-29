<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\UnitKerja;

class CreatePegawai extends Component
{
    public $nip, $nama, $unit_kerja_id;

    protected $rules = [
        'nip' => 'required|max:10|unique:pegawais,nip',
        'nama' => 'required|max:50',
        'unit_kerja_id' => 'nullable|exists:unit_kerja,id', // diperbaiki di sini
    ];
    

    public function submit()
    {
        $this->validate();

        Pegawai::create([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'unit_kerja_id' => $this->unit_kerja_id,
        ]);

        session()->flash('message', 'Pegawai berhasil ditambahkan.');

        return redirect()->route('pegawai.index');
    }

    public function render()
    {
        return view('livewire.pegawai.create-pegawai', [
            'unitKerjas' => UnitKerja::all(),
        ]);
    }
}
