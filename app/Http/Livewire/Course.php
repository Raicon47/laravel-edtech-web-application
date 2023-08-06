<?php

namespace App\Http\Livewire;

use App\Models\Course as Couse;
use Livewire\Component;

class Course extends Component
{
    public $course;
    public $i_d;

    public function course() {

    }

    public function render()
    {
        $this->course = Couse::where('id', 2)->first();
        return view('livewire.course');
    }
}
