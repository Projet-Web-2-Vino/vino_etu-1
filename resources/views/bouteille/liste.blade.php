@extends('layouts.master')
@section('content')

<x-slot name="header">

@if ($msg)
<p>{{ $msg }}</p>
@endif


<h1>Vue : Liste Bouteilles du catalogue</h1>
@if (session('success'))
<p style="font-size:1.3em; color: green;">{{ session('success') }}</p>

@endif
</x-slot>

    <x-slot name="header">

    @if ($msg)
    <p>{{ $msg }}</p>
    @endif


    <h1>Vue : Liste Bouteilles du catalogue</h1>
    @if (session('success'))
    <p style="font-size:1.3em; color: green;">{{ session('success') }}</p>

    @endif
    </x-slot>
    {{-- Section Boutton pour Importer et Cellier --}}
    <div class="py-8  grid place-items-center  border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="mr-2">
                {{-- Section pour Importer les produits de la saq --}}
                <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
                    <span> <a class="btnModifier" href='/SAQ'>Importer le catalogue</a></span>
                </button>
            </li>

            <li class="mr-2">
                {{-- Section Espace Cellier--}}
                <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
                    <span> <a class="btnModifier" href='/cellier'>Cellier</a></span>
                </button>
            </li>
        </ul>
    </div>

{{-- Section pour carte des vins --}}
    <?php
        foreach ($data as $cle => $bouteille) {
    ?>

  <div class=" py-3 mt-6 m-2 flex items-center bg-white shadow-md hover:shadow-xl rounded-lg">
    <img class="h-300 w-300" src="https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166">
    <div>
        <div class="px-3">
        {{-- Section pour inserer NOM de la bouteille --}}
        <strong><?php echo $bouteille['nom'] ?></strong>
        </div>
        <div class="px-2 w-full flex-none text-sm flex items-center text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            {{-- Section pour inserer NOTE --}}
            <span class="text-gray-400 whitespace-nowrap mr-3">4.60</span><span class="mr-2 text-gray-400">Note</span>
        </div>

    <div class=" px-3 py-1 text-m font- justify-start">
        {{-- Section pour inserer TYPE, PAYS, VOLUME --}}
        <small><?php echo $bouteille['type'] ?> Vin Blanc |  <?php echo $bouteille['format'] ?> | <?php echo $bouteille['pays'] ?></small>
    </div>

    <div class=" py-1 flex px-3 space-x-2  text-sm font-medium justify-start">
        <p>Quantiter :</p>
        <p><?php echo $bouteille['quantite'] ?></p>
    </div>

    <div class="text-sm font-medium justify-start">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 mt-2 text-sm font-semibold text-gray-700 mr-2">Millisime</span>
        <p class="px-3 font-light"><?php echo $bouteille['millesime'] ?></p>
    </div>

    <div class="flex py-4 space-x-2 text-sm font-medium justify-start">
        {{-- Section pour Ajouter Vin au cellier --}}
        <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-6 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
            <span><a href="/bouteille/nouveau">Ajouter</a></span>
        </button>
        {{-- Section pour Modifier --}}
        <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
            <span> <a class="btnModifier" href='{{ route('bouteille.edit', ['id' => $bouteille->id ]) }}'>Modifier</a></span>
        </button>

        {{-- Section pour inserer URL SAQ --}}
        <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
          <span><a href="<?php echo $bouteille['url_saq'] ?>">Voir SAQ</a></span>
        </button>
        <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-vin="<?php echo $bouteille['id_bouteille'] ?>">
      </div>
    </div>
  </div>
  </div>
  <?php
}
?>



  @endsection
