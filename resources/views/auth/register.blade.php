@extends('layouts.master')
@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        {{-- <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}






{{-- Section Front-End Tailwind --}}
{{-- Section Front-End refait avec TailwindCSS --}}
<div class=" h-screen overflow-hidden flex items-center justify-center ">
    <div class="logZone w-9/12   flex rounded-lg shadow-xl" >
        <div class="w-full h-auto hidden lg:block lg:w-1/2 bg-cover rounded-lg lg:rounded-r-none"
            style="background-image: url('https://images.pexels.com/photos/2909085/pexels-photo-2909085.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
        </div>
        <div class="w-full lg:w-1/2 bg-white rounded-lg lg:rounded-l-none py-24 px-12">
            <h3 class="titleLog font-bold text-3xl text-red-600 text-center tracking-widest uppercase mb-4">Inscription</h3>
            <form class="bg-white">
                <div class="mb-4">

                     <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    </div>

                    <div class="mb-4">

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                </div>

                <div class="mb-4">
                    {{-- Section Register --}}
                    <button class="w-full p-3 font-bold text-white bg-red-800 rounded-full focus:outline-none" type="button">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
                <hr class="mb-4 border-t" />
                <div class="text-sm text-center">
                    Déjà un compte ?
                    <a href="/login" class="text-blue-500 pl-2">Cliquez-ici !</a>
                </div>
           
        </div>
    </div>
</div>

@endsection
