
@extends('layouts.master')
@section('content')


idUsager = {{$id_usager}}
<a href="/SAQ">Importer le catalogue</a>
<h1>Espace cellier {{ __('cellier.index') }}</h1>

<!-- <a href="/SAQ">Importer le catalogue</a><br> -->
idUsager = {{$id_usager}} <br>




@if (session()->has('success'))
<span style="color:green">{{ session('success') }}</span>
@endif

<div class="py-5 font-bold text-5xl text-center">
  <h1>Espace cellier</h1>
</div>

@if (!$celliers)
  <div class="py-3 font-bold text-2xl text-center">
      <h3>Veuillez ajouter votre cellier</h3>
  </div>
  @else
  <div class="py-3 font-bold text-2xl text-center">
    <h3>Vos celliers</h3>
</div>
  @endif
  <div class="px-2 py-4  m-2 mx-auto bg-white rounded-lg ">
      <a class="inline-block bg-red-800 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2" href='cellier/nouveau'>Ajouter un cellier</a>
  </div>


<div class='max-w-md mx-auto'>
    <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
       <!--
      <div class="grid place-items-center h-full w-12 text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>


 Recherche de cellier TODO if TIME
<input class="peer h-full w-full border-none text-sm text-gray-700 pr-2" type="text" placeholder="Recherche Cellier.." />
-->


    {{-- Section Carte Cellier --}}
    @if ($celliers)
    @foreach ($celliers as  $info)

      <div class="px-2 m-2 mx-auto max-w-3xl bg-white rounded-lg shadow-xl">
        <div class="p-4 flex flex-col justify-between leading-normal">
          <div class="mb-3">
            {{-- Nom Cellier --}}
            <div class="">{{$info->nom_cellier}} </div>
            <small class="inline-block   py-1 pb-2 mt-1 text-sm font-semibold  mr-2"><p>Description :</p></small>
            <p class="py-1 text-gray-700 text-base">Manque Description</p>
          </div>
          <div>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Détail</span>
            <!-- zone edit cellier-->
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"><a href=""{{ route('cellier.edit', ['id' => $info->id ]) }}">Modifier</a></span>
              <!-- zone delete cellier-->
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                <form action="{{ route('cellier.supprime', ['id' => $info->id]) }}" method="POST">
                    @csrf
                    <button>Supprimer</button>
                </form>

            </span>
          </div>
        </div>
      </div>
    @endforeach
    @endif
  </div>
</div>


@endsection
