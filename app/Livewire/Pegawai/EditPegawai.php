<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\UnitKerja;

class EditPegawai extends Component
{
    public $pegawaiId;
    public $nip, $nama, $unit_kerja_id;

    public function mount($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $this->pegawaiId = $pegawai->id;
        $this->nip = $pegawai->nip;
        $this->nama = $pegawai->nama;
        $this->unit_kerja_id = $pegawai->unit_kerja_id;
    }

    protected function rules()
    {
        return [
            'nip' => 'required|max:10|unique:pegawais,nip,' . $this->pegawaiId,
            'nama' => 'required|max:50',
            'unit_kerja_id' => 'nullable|exists:unit_kerja,id',
        ];
    }

    public function update()
    {
        $this->validate();

        $pegawai = Pegawai::findOrFail($this->pegawaiId);
        $pegawai->update([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'unit_kerja_id' => $this->unit_kerja_id,
        ]);

        session()->flash('message', 'Data pegawai berhasil diperbarui.');
        return redirect()->route('pegawai.index');
    }

    public function render()
    {
        return view('livewire.pegawai.edit-pegawai', [
            'unitKerjas' => UnitKerja::all(),
        ]);
    }
}
