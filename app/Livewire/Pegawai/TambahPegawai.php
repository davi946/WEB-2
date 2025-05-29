<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\UnitKerja;

class TambahPegawai extends Component
{
    public $pegawaiId;
    public $nip, $nama, $unit_kerja_id;
    public $isEdit = false;

    public function mount($id = null)
    {
        if ($id) {
            $pegawai = Pegawai::findOrFail($id);
            $this->pegawaiId = $id;
            $this->nip = $pegawai->nip;
            $this->nama = $pegawai->nama;
            $this->unit_kerja_id = $pegawai->unit_kerja_id;
            $this->isEdit = true;
        }
    }

    protected $rules = [
        'nip' => 'required|string|max:10',
        'nama' => 'required|string|max:50',
        'unit_kerja_id' => 'nullable|exists:unit_kerjas,id'
    ];

    public function simpan()
    {
        $this->validate();

        Pegawai::updateOrCreate(
            ['id' => $this->pegawaiId],
            [
                'nip' => $this->nip,
                'nama' => $this->nama,
                'unit_kerja_id' => $this->unit_kerja_id
            ]
        );

        session()->flash('message', $this->isEdit ? 'Data pegawai berhasil diupdate.' : 'Data pegawai berhasil ditambahkan.');

        return redirect()->to('/pegawai');
    }

    public function render()
    {
        return view('livewire.pegawai.tambah-pegawai', [
            'unitKerjas' => UnitKerja::all()
        ]);
    }
}
