@extends('layouts.master')
@section('content')

@if (session()->has('success'))
<span style="color:green">{{ session('success') }}</span>
@endif
<form action="{{ route('cellier.creer')}}" method="POST">
    {{-- Token pour la securiter du formulaire --}}
    @csrf
    <h1></h1>
    <div class="bg-gray-100  flex flex-col justify-center ">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="h-12 w-12 rounded-full justify-center items-center text-yellow-500 text-2xl font-mono">
                            <img src="https://static.thenounproject.com/png/5003274-200.png" alt="">
                        </div>
                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                        <h2 class="leading-relaxed">Ajouter votre cellier</h2>
                        <p class="text-sm text-gray-500 font-normal leading-relaxed">Veuillez entrer vos informations</p>
                        </div>

                    </div>
                    @if (session()->has('success'))
                    <span style="color:green">{{ session('success') }}</span>
                    @endif
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <div class="flex flex-col">
                            <label class="leading-loose">Nom Cellier</label>
                            {{-- Section pour le nom du cellier --}}
                            <input class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" name="nom_cellier" type="text" value="{{ old('nom_cellier')}}" />
                            @error('nom_cellier')
                            <span style="color:red"> {{ $message }}</span>
                            @enderror
                            <!--TODO ajout de l'id de l'usager -->
                            <input name="id_usager" type="hidden" value="{{Auth::id()}}" />
                        </div>
                        <!--
                        <div class="flex flex-col">
                            <label class="leading-loose">Description</label>
                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
                        </div>
                    -->
                        </div>
                        <div class="pt-4 flex items-center space-x-4">
                            <button class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none" href='/cellier'>
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Canceler
                            </button>
                            {{-- Section pour le bouton ajouter --}}
                            <form action="{{ route('cellier.creer')}}" method="POST">
                                @csrf
                            <button class="bg-red-800 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
    <span style="color:green">{{ session('success') }}</span>
    @endif
</form>
@endsection
