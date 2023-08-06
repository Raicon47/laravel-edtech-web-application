<x-guest-layout>

<section style="background:#5a0b4d;">
    <div class="px-4 py-5 text-center">
      <h1 class="display-5 fw-bold text-light">Welcome to Krator</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4 text-light">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-light btn-lg px-4 gap-3">Learn More</button>
        </div>
      </div>
    </div>
</section>

<section>
    <div class="b-example-divider"></div>

    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="{{asset('storage/img/creators.jpg')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Where Course Creators Earn Better and are Valued</h1>
          <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          </div>
        </div>
      </div>
    </div>
</section>

<section class="">
    <div class="container">
        <h3>Courses</h3>
        <hr>
        <div class="row">

            <div class="col-md-3">
                <h5>Topics</h5>
                <ol class="list-group list-group-flush">
                    @foreach ($topics as $topic)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="">
                              <a href="{{route('topic', $topic->slug)}}" class="text-muted">{{$topic->slug}}</a>
                          </div>
                        </div>
                        <span class="badge bg-dark rounded-pill">{{$topic->course->count()}}</span>
                      </li>
                    @endforeach
                  </ol>
            </div>

            <div class="col-md-9 row mx-auto">
                @foreach ($courses->take(3); as $course)

                <div class="col-md-4">
                    <div class="card" style="width: auto;">
                        <img src="storage/courses_img/{{$course->course_image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$course->name}}</h5>
                          <strong class="card-link">N{{number_format($course->price, 2)}}</strong>
                          <a href="{{route('order_course', $course->name)}}" class="btn text-light" style="background:#5a0b4d;">Enroll Now</a>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

<section>
   <footer>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 Property of Krator, Inc</span>
          </div>

          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
          </ul>
        </footer>
      </div>
   </footer>
</section>




</x-guest-layout>
