<?php

namespace App\Livewire\Ruang;

use Livewire\Component;
use App\Models\Ruang;

class ListRuang extends Component
{
    public $deleteId = null;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete($id)
{
    $ruang = Ruang::findOrFail($id);
    $ruang->delete();

    session()->flash('message', 'Ruang berhasil dihapus.');
}


    public function render()
    {
        return view('livewire.ruang.list-ruang', [
            'ruangs' => Ruang::all()
        ]);
    }
}


