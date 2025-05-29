<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    // Properti publik untuk menyimpan nilai counter
    public $count = 1;

    // Method untuk menambah nilai count
    public function increment()
    {
        $this->count++;
    }

    // Render view-nya
    public function render()
    {
        return view('livewire.counter');
    }
}
