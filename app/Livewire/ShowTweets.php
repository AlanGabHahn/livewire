<?php

namespace App\Livewire;

use Livewire\{ Component, WithPagination };
use App\Models\Tweet;

class ShowTweets extends Component
{

    use WithPagination;

    public $content = 'um teste';

    protected $rules = [
        'content' => 'required|min:3|max:255',
        
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->paginate(5);
        return view('livewire.show-tweets',
            ['tweets' => $tweets]
        );
    }

    public function create() {

        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function like($tweetId)
    {
        $tweet = Tweet::find($tweetId);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id,
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
