<x-guest-layout>

    <div class="col-md-6 mx-auto my-5">
    <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST" action="{{ route('register') }}">
        @csrf

         <!-- Name -->
         <div class="form-floating mb-3">
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="name@example.com"/>
            <x-input-label for="name" :value="__('Name')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com"/>
            <x-input-label for="email" :value="__('Email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="name@example.com"/>

            <x-input-label for="password" :value="__('Password')" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-floating mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="name@example.com"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


          {{-- <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
        {{-- <button class="w-100 btn btn-lg text-light" style="background:#5a0b4d;" type="submit">Sign up</button> --}}
        <hr class="my-4">


        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="btn btn-lg text-light" style="background:#5a0b4d;">
            {{ __('Register') }}
        </x-primary-button>

      </form>
    </div>

</x-guest-layout>
