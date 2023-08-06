<x-app-layout>

    <x-slot name="header">
        <div class="alert">
         <h5 class="text-muted">
            {{$module->course->name}}
         </h5>
        </div>
     </x-slot>

    <div class="py-5">
        <div class="container">

            <div class="row">

                <div class="col-md-4">
                    <h2 style="color:#5a0b4d;">{{$module->course->name}}
                     {{-- {{$module->course->module->count()}} --}}
                    </h2>

                 <div class="accordion" id="accordionExample">
                    @foreach ($module->course->module as $item)
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$item->id}}" aria-expanded="false" aria-controls="{{$item->id}}">
                          {{$item->title}}
                        </button>
                      </h2>
                      <div id="{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-decoration-none" href="{{$item->title}}">
                                <p class="fst-italic text-muted">{{$item->title}}<img src="{{asset('storage/icons/play.png')}}" height="20" alt="">
                                </p>
                              </a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>

                </div>

                <div class="col-md-8 text-center">
                    <div class="card">
                        <div id="trailer" class="section d-flex justify-content-center embed-responsive embed-responsive-4by3">
                            <video class="embed-responsive-item" width="800" height="350" controls>
                              <source src="/storage/videos/{{$module->video}}" type="video/mp4">
                              Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="card-body">
                          <blockquote class="blockquote mb-0">
                            <p>{{$module->title}}</p>
                            <footer class="blockquote-footer">
                                <strong>Creator:</strong> John Doe
                            </footer>
                          </blockquote>
                        </div>
                      </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
