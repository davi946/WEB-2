<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class EditUnitKerja extends Component
{
    public $unitKerjaId;
    public $kode;
    public $nama;

    protected $rules = [
        'kode' => 'required|string|max:10',
        'nama' => 'required|string|max:100',
    ];

    public function mount($id)
    {
        $unit = UnitKerja::findOrFail($id);
        $this->unitKerjaId = $unit->id;
        $this->kode = $unit->kode;
        $this->nama = $unit->nama;
    }

    public function save()
    {
        $this->validate();

        $unit = UnitKerja::findOrFail($this->unitKerjaId);
        $unit->kode = $this->kode;
        $unit->nama = $this->nama;
        $unit->save();

        session()->flash('message', 'Unit Kerja berhasil diperbarui.');
        return redirect()->route('unit-kerja.index');
    }

    public function render()
    {
        return view('livewire.unit-kerja.edit-unit-kerja');
    }
}
