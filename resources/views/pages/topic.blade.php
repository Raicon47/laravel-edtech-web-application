<x-guest-layout>

    <div class="container col-md-8 mx-auto my-5">
        <h3>{{$topic->name}}</h3>
        <div class="row">

        @forelse ($topic->course as $course)
        <div class="col-md-4 my-3">
            <div class="card" style="width: auto;">
                <img src="/storage/courses_img/{{$course->course_image}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$course->name}}</h5>
                  <strong class="card-link">N{{number_format($course->price, 2)}}</strong>
                  <a href="{{route('order_course', $course->name)}}" class="btn text-light" style="background:#5a0b4d;">Enroll Now</a>
                </div>
              </div>
        </div>
        @empty
          <div class="alert alert-warning my-3">
            There are no courses for <span class="fst-italic fw-bold">{{$topic->name}}</span> yet
          </div>
        @endforelse

    </div>
    </div>

</x-guest-layout>
