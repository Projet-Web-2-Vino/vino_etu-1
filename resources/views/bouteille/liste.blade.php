
@extends('layouts.master')
@section('content')

<!-- Pour tester des routes -->


<a href="/cellier">Espace cellier</a>
<a href="{{ route('bouteille.nouveau', ['id' => $id_cellier ]) }}">Ajouter une bouteille</a>

  
@if ($msg)
<p>{{ $msg }}</p>
@endif

<!-- pour information seulement pour tester -->
<div>
id_usager = {{$id_usager}} <br>
id_cellier = {{$id_cellier}} <br>
</div>


@if (session('success'))
<p style="font-size:1.3em; color: green;">{{ session('success') }}</p>
@endif

</x-slot>

    <x-slot name="header">

    @if ($msg)
    <p>{{ $msg }}</p>
    @endif


    @if (session('success'))
    <p style="font-size:1.3em; color: green;">{{ session('success') }}</p>

    @endif
    </x-slot>
    {{-- Section Boutton pour Importer et Cellier --}}
    <div class="py-8  grid place-items-center ">
        <h1 class="text-5xl  font-extrabold">L'atelier à vin</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Bienvenue dans votre espace de gestion de vos bouteilles de vin.</p>
        <ul class="py-6 flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="mr-2">
                {{-- Section pour Importer les produits de la saq --}}
                <button class="inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg text-white rounded-md hover:bg-red-600 ">
                    <span> <a class="btnModifier" href='/SAQ'>Importer le catalogue</a></span>
                </button>
            </li>

            <li class="mr-2">
                {{-- Section Espace Cellier--}}
                <button class=" inline-flex items-center text-sm font-medium mb-2  bg-red-800 px-3 py-2 hover:shadow-lg  text-white rounded-md hover:bg-red-600 ">
                    <span> <a class="btnModifier" href='/cellier'>Cellier</a></span>
                </button>
            </li>
        </ul>
    </div>

     {{-- Section input pour rechercher une bouteille --}}
    <div class="px-3">
        <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-red-800 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5  dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-800 " placeholder="Rechercher" required>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-red-800 rounded-lg border border-red-300 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
    </div>


{{-- Section pour carte des vins --}}
    <?php
        foreach ($data as $cle => $bouteille) {
    ?>

  <div class=" py-3 mt-3 m-2 flex items-center bg-white shadow-md hover:shadow-xl rounded-lg">
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
        <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-6 py-2 hover:shadow-lg tracking-wider text-white rounded-md hover:bg-red-600 ">
            <span><a href="/bouteille/nouveau">Ajouter</a></span>
        </button>
        {{-- Section pour Modifier --}}
        <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg tracking-wider text-white rounded-md hover:bg-red-600 ">
            <span> <a class="btnModifier" href='{{ route('bouteille.edit', ['id' => $bouteille->id ]) }}'>Modifier</a></span>
        </button>

        {{-- Section pour inserer URL SAQ --}}
        <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg tracking-wider text-white rounded-md hover:bg-red-600 ">
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




<div class="p-6 text-gray-900">
    <div class="cellier grid">
        @if (count($bouteilles) == 0)
        <p>
            Vous n'avez aucune bouteille au cellier <em>{{$cellier->nom_cellier}}</em>
            <a href="{{ route('bouteille.nouveau', ['id' => $id_cellier ]) }}">Ajouter une bouteille</a>
        </p>
        @else
        <h1>Liste bouteilles du cellier  <em>{{$cellier->nom_cellier}}</em> </h1>
        @endif

        @foreach ($bouteilles as  $info)  
            <div class="bouteille" data-quantite="{{$info->quantite}}">
               
                <div class="img">
                   <!-- <img src="{{$info->image}}"> -->
                    <img src="https://www.saq.com/media/catalog/product/">
                </div>
                <a href="{{ route('bouteille.edit', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id  ]) }}">Éditer</a>
                <h3>{{$info->nom}}</h3>                                                       
                <div class="description">
                    <p class="quantite">Quantité : {{$info->quantite}}</p>
                    <p class="pays">Pays : {{$info->pays}}</p>
                    <p class="type">Type : {{$info->type}}</p>
                    <p class="millesime">Millesime : {{$info->millesime}}</p>
                    <p><a href="{{$info->url_saq}}">Voir SAQ</a></p>
                </div>
                <div class="options" data-id="{{$info->vino__cellier_id}}" data-id-vin="{{$info->vino__bouteille_id}}">
                    <!-- <button class='btnModifier'>Modifier</button> -->
                        <button class='btnAjouter'>Ajouter</button>
                        <button class='btnAjouter'>Boire</button>
                </div>
            </div>
@endforeach
</div>
</div>
