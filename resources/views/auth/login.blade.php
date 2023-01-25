@extends('layouts.master')
@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        {{-- <div class="flex items-center justify-end mt-4"> --}}
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            {{-- <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button> --}}
        {{-- </div> --}}
    </form>







{{-- Section Front-End refait avec TailwindCSS --}}
<div class=" h-screen overflow-hidden flex items-center justify-center ">
    <div class="w-9/12   flex rounded-lg shadow-xl" >
        <div class="w-full h-auto hidden lg:block lg:w-1/2 bg-cover rounded-lg lg:rounded-r-none"
            style="background-image: url('https://images.pexels.com/photos/2909085/pexels-photo-2909085.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
        </div>
        <div class="w-full lg:w-1/2 bg-white rounded-lg lg:rounded-l-none py-24 px-12">
            <h3 class="font-bold text-3xl text-red-600 text-center tracking-widest uppercase mb-4">Connexion</h3>
            <form class="bg-white">
                <div class="mb-4">

                     <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    {{-- <input type="text" id="username" class="w-full p-3 text-md border rounded shadow focus:outline-none focus:shadow-outline" placeholder="Username" /> --}}
                </div>

                <div class="mb-4">

                         <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    {{-- <input type="password" id="password" class="w-full p-3 text-md border rounded shadow focus:outline-none focus:shadow-outline" placeholder="***********" /> --}}
                </div>

                <div class="mb-4">
                    {{-- Section Login --}}
                    <button class="w-full p-3 font-bold text-white bg-red-800 rounded-full focus:outline-none" type="button">
                        {{ __('Log in') }}
                    </button>
                </div>

                <hr class="mb-4 border-t" />
                <div class="text-sm text-center">
                    <a href="/register">Inscrivez-vous</a>
                    <a href="/register" class="text-blue-500 pl-2">Cliquez-ici !</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
