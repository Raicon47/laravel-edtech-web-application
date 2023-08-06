<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class Courses extends Component
{

    public $courses;
    public $module;

    public function render()
    {
        $this->courses = Course::orderBy('created_at', 'DESC')->get();

        return view('livewire.courses');
    }
}
