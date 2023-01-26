@extends('layouts.master')
@section('content')
<!-- Pour tester des routes -->
<a href="/SAQ">Importer le catalogue</a>
<a href="/cellier">Espace cellier</a>
<a href="/bouteille/nouveau">Ajouter une bouteille</a>




<x-slot name="header">

@if ($msg)
<p>{{ $msg }}</p>
@endif


<h1>Vue : Liste Bouteilles du catalogue</h1>
@if (session('success'))
<p style="font-size:1.3em; color: green;">{{ session('success') }}</p>

@endif
</x-slot>
{{--
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="cellier grid">

                    {{-- <?php
                    foreach ($data as $cle => $bouteille) {
                    ?> --}}
                    {{-- Console log pour voir les données --}}
                      {{-- {{dd ($bouteille)}} --}}
{{--
                        <div class="bouteille" data-quantite="<?php echo $bouteille['quantite'] ?>">
                            <a class="btnModifier" href='{{ route('bouteille.edit', ['id' => $bouteille->id ]) }}'>Modifier</a>
                            <div class="img">
                                <img src="https:<?php echo $bouteille['image'] ?>">
                            </div>
                            <h5><?php echo $bouteille['nom'] ?></h5>
                            <div class="description">
                                <p class="quantite">Quantité : <?php echo $bouteille['quantite'] ?></p>
                                <p class="pays">Pays : <?php echo $bouteille['pays'] ?></p>
                                <p class="type">Type : <?php echo $bouteille['type'] ?></p>
                                <p class="millesime">Millesime : <?php echo $bouteille['millesime'] ?></p>
                                <p><a href="<?php echo $bouteille['url_saq'] ?>">Voir SAQ</a></p>
                            </div>
                            <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-vin="<?php echo $bouteille['id_bouteille'] ?>"> --}}
                                <!-- <button class='btnModifier'>Modifier</button> -->



                                    <button class='btnAjouter'>Ajouter</button>

                                    <button class='btnAjouter'>Ajouter</button>
                            </div> --}}

                {{-- <?php
                    }
                ?> --}}



    <x-slot name="header">

    @if ($msg)
    <p>{{ $msg }}</p>
    @endif


    <h1>Vue : Liste Bouteilles du catalogue</h1>
    @if (session('success'))
    <p style="font-size:1.3em; color: green;">{{ session('success') }}</p>

    @endif
    </x-slot>


{{-- Section pour carte des vins --}}
    <?php
        foreach ($data as $cle => $bouteille) {
    ?>

  <div class="flex items-center bg-white shadow-md hover:shadow-xl rounded-lg">
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
        <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
          <span>Ajouter</span>
        </button>
        <button class="transition ease-in duration-300 bg-red-800 hover:bg-red-500  hover:border-white  hover:text-white  hover:shadow-lg text-white rounded-full w-9 h-9 text-center p-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </button>
        <p><a href="<?php echo $bouteille['url_saq'] ?>">Voir SAQ</a></p>
        <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-vin="<?php echo $bouteille['id_bouteille'] ?>">
        <a class="btnModifier" href='{{ route('bouteille.edit', ['id' => $bouteille->id ]) }}'>Modifier</a>

      </div>
    </div>
  </div>
  </div>
  <?php
}
?>



  @endsection
