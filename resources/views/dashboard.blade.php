<x-app-layout>

    <x-slot name="header">
       <div class="alert">
        <h5 class="">
            {{ __('Dashboard') }}
        </h5>
       </div>
    </x-slot>

    <div class="container my-5">
        <div class="row">

            <div class="col-md-4" my-2>
                <div class="accordion" id="accordionExample">

                    @livewire('courses')

                  </div>
            </div>

            <div class="col-md-8 text-center my-2">
                    <h3 class="mb-5 text-muted">Welcome to Krator</h3>
                    <video width="600" height="300" controls>
                        <source src="/storage/videos/introduction.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
            </div>

        </div>
    </div>

    <div class="container">

    </div>
</x-app-layout>
