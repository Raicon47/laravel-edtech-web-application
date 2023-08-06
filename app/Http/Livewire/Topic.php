<?php

namespace App\Http\Livewire;

use App\Models\Topic as Topics;
use Livewire\Component;

class Topic extends Component
{
    public $topics;

    public function render()
    {
        $this->topics = Topics::orderBy('created_at', 'DESC')->get();

        return view('livewire.topic');
    }
}
