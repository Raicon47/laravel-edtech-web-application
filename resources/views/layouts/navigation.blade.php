<section>
    <nav class="navbar navbar-expand-lg bg-white shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/" style="color:#5a0b4d;">Krator</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <form class="d-flex" role="search">
                <div class="dropdown">
                        <img class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" />
                    <ul class="dropdown-menu">
                        <x-dropdown-link  class="dropdown-item" :href="route('dashboard')">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                        <x-dropdown-link  class="dropdown-item" :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link  class="dropdown-item" href="route('logout')"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </x-dropdown-link>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"></a>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                              @csrf
                        </form>

                    </form>
                    </ul>
                  </div>

            </form>
          </div>
        </div>
      </nav>
</section>



