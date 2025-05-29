<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class ListUnitKerja extends Component
{
    public $unitKerjas;

    public function mount()
    {
        $this->loadUnitKerjas();
    }

    public function loadUnitKerjas()
    {
        $this->unitKerjas = UnitKerja::all();
    }

    public function deleteUnitKerja($id)
    {
        $unit = UnitKerja::find($id);
        if ($unit) {
            $unit->delete();
            session()->flash('message', 'Unit Kerja berhasil dihapus!');
            $this->loadUnitKerjas();  // refresh data setelah hapus
        } else {
            session()->flash('message', 'Unit Kerja tidak ditemukan.');
        }
    }

    public function render()
    {
        return view('livewire.unit-kerja.list-unit-kerja');
    }
}
