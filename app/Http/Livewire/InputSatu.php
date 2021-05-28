<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputSatu extends Component
{
    public $input;

    public function input($input)
    {
        $this->input = $input;


        //$this->emit('input');
    }


    public function render()
    {
        dd($this->input);
        return view('livewire.input-satu');
    }
}
