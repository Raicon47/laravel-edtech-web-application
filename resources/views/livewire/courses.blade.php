<div>
 {{-- {{$name}} @if($loud) ! @endif --}}
 <h2  style="color:#5a0b4d;">Courses</h2>
 <hr>

 <div class="accordion" id="accordionExample">
    @forelse (auth()->user()->courses as $course)
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$course->id}}" aria-expanded="false" aria-controls="{{$course->id}}">
            {{$course->name}}
        </button>
      </h2>
      <div id="{{$course->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            @foreach ($course->module as $module)
         <a href="{{route('course', $module->title)}}">
            <p>{{$module->title}}</p>
         </a>
       @endforeach
       <small class="fw-bold">topic: {{$course->topic->name}}</small>
        </div>
      </div>
    </div>

    @empty

    <div class="alert alert-warning">
        Buy a course and start learning
    </div>

    @endforelse
  </div>



</div>
