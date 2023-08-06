<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $courses = Course::orderBy('created_at', 'ASC')->get();
        $modular = Module::where('id', 1)->first();

        return view('dashboard', compact('courses', 'modular'));
    }

    public function course($title) {
        $module = Module::where('title', $title)->first();

        return view('course', compact('module'));
    }

    public function topic($slug) {
        $topic = Topic::where('slug', $slug)->first();

        return view('pages.topic', compact('topic'));
    }

    public function order_course($name) {
        $order = Course::where('name', $name)->first();

        return view('pages.order_course', compact('order'));
    }
}
