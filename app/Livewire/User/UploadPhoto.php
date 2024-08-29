<?php

namespace App\Livewire\User;

use Livewire\{ Component, WithFileUploads };

class UploadPhoto extends Component
{

    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function storagePhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:1024'
        ]);
    }
}