<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="col-md-6 mx-auto my-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="w-100 btn btn-lg text-light" style="background:#5a0b4d;" type="submit">Login</button>
            <hr class="my-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

            <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
          </form>
    </div>

</x-guest-layout>
