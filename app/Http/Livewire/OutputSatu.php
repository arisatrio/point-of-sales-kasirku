<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OutputSatu extends Component
{
    public $output;

    protected $listeners = [
        'input' => 'prima'
    ];

    public function prima($input)
    {
        $this->output = $input;
    }

    public function render()
    {
        return view('livewire.output-satu');
    }
}
