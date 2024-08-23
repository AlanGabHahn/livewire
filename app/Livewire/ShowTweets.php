<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweet;

class ShowTweets extends Component
{

    public $content = 'um teste';

    protected $rules = [
        'content' => 'required|min:3|max:255',
        
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->get();
        return view('livewire.show-tweets',
            ['tweets' => $tweets]
        );
    }

    public function create() {

        $this->validate();

        Tweet::create([
            'content' => $this->content,
            'user_id' => 1
        ]);

        $this->content = '';
    }
}
