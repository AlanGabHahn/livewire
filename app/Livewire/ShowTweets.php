<?php

namespace App\Livewire;

use Livewire\Component;

class ShowTweets extends Component
{

    public $message = 'um teste';

    public function render()
    {
        return view('livewire.show-tweets');
    }
}
