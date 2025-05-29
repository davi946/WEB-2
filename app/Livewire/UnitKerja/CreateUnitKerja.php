<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class CreateUnitKerja extends Component
{
    public $kode = '';
    public $nama = '';

    protected $rules = [
        'kode' => 'required|string|max:10|unique:unit_kerjas,kode',
        'nama' => 'required|string|max:100',
    ];

    public function save()
    {
        $this->validate();

        UnitKerja::create([
            'kode' => $this->kode,
            'nama' => $this->nama,
        ]);

        session()->flash('message', 'Unit Kerja berhasil ditambahkan.');

        return redirect()->route('unit-kerja.index');
    }

    public function render()
    {
        return view('livewire.unit-kerja.create-unit-kerja');
    }
}
