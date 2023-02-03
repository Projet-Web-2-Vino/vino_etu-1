
@extends('layouts.master')
@section('content')




    {{-- Section Boutton pour Importer et Cellier --}}
    <div class="  grid place-items-center ">
        <div class="relative">
            <img class="w-full pb-5"  src="https://www.toutlevin.com/img/5146bd0d459d2576d8a6fbb89238ceea-1920.jpg" />
        </div>

        <h1 class="titleBouteille text-5xl  font-extrabold">L'atelier à vin</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 text-center">Bienvenue dans votre espace cellier : {{$cellier->nom_cellier}}.</p>
        <ul class="py-6 flex flex-wrap align-items-center justify-center mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">


            <li class="mr-2">
                {{-- Section Espace Cellier--}}
                <button class=" inline-flex items-center text-sm font-medium mb-2  bg-red-800 px-3 py-2 hover:shadow-lg  text-white rounded-md hover:bg-red-600 ">
                    <span>
                        <a class="btnModifier" href='/cellier'>Retour à votre espace cellier</a>
                    </span>
                </button>
            </li>

            <li class="mr-2">
                <button class=" inline-flex items-center text-sm font-medium mb-2  bg-red-800 px-3 py-2 hover:shadow-lg  text-white rounded-md hover:bg-red-600 ">
                    <span>
                        <a href='{{ route('bouteille.nouveau', ['id' => $cellier->id]) }}'>Ajouter une bouteille
                        </a>
                    </span>
                </button>
            </li>



        </ul>
    </div>

    <!-- Feedback success -->
    @if (session()->has('success'))
    <div class="text-emerald-600 text-center font-semibold my-10">{{ session('success') }}</div>
    @endif


    @if (count($bouteilles) == 0)
    <p>
        Vous n'avez aucune bouteille au cellier <em>{{$cellier->nom_cellier}}</em>
        <a href="{{ route('bouteille.nouveau', ['id' => $id_cellier ]) }}">Ajouter une bouteille</a>
    </p>
    @endif


{{-- Section pour carte des vins --}}
<div class="flex flex-wrap 	justify-evenly">
  @foreach ($bouteilles as  $info)

    {{-- Section pour Modifier --}}
    <span class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-gray-200 px-5  hover:shadow-lg tracking-wider text-gray-700 rounded-md hover:bg-gray-700 hover:text-gray-200 text-2xl mx-3">
        <button>
            <span> <a class="btnModifier" href="{{ route('bouteille.edit', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id  ]) }}"><i class="fa-solid fa-pen-to-square"></i></a></span>
        </button>
    </span>

    {{-- Section pour Supprimer --}}

    <span class="transition ease-in duration-300 flex justify-center items-center select-none text-sm font-medium mb-2 md:mb-0 bg-gray-200 px-3 py-2 hover:shadow-lg tracking-wider text-gray-700 rounded-md hover:bg-gray-700 hover:text-gray-200 text-2xl mx-3">
        <form action="{{ route('bouteille.supprime', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id ]) }}" method="POST">
            @csrf
            <button data-modal="modal-{{$info->vino__bouteille_id}}" class="delete"><i class="fa-sharp fa-solid fa-trash  space-y-2"></i></button>
        </form>
    </span>
  <div class="w-fit py-3 mt-3 m-2  flex items-center bg-white shadow-md hover:shadow-xl rounded-lg">

    <img class="h-300 w-300" src="https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166">
    <div>
        <div class="">
        {{-- Section pour inserer NOM de la bouteille --}}
        <h3 class="titreBouteille"><strong>{{$info->nom}}</strong></h3>
        </div>



    <div class="  py-1 text-m font- justify-start">
        {{-- Section pour inserer TYPE, PAYS, VOLUME --}}
        <small>

            {{-- TODo traiter type --}}
            @switch($info->type)

                @case(1)
                Vin Rouge
                @break

                @case(2)
                Vin Blanc
                @break

                @case(3)
                Vin Rosé
                @break

            @endswitch
            | {{$info->format}} | {{$info->pays}}  </small>
    </div>

        {{-- Section pour inserer les notes --}}
        <p class="py-2 font-semibold font-extrabold"><small>Note</small></p>
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        </div>


        {{-- Section ajouter au boire.  --}}

            @csrf
        <div class="options py-2  text-sm" data-id="{{$info->vino__cellier_id}}" data-id-vin="{{$info->vino__bouteille_id}}">
            <p class="font-semibold">Quantité :</p>

                <div class="flex py-3" >
                    <button data-action="plus" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'><i class="fa-solid fa-plus"></i></button>
                    <p class="p-2 quantite">{{$info->quantite}}</p>
                    <button data-action="moins" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'><i class="fa-solid fa-minus"></i></button>
                </div>

        </div>


</form>
<p>Millesime :</p>
    <div class=" py-1 flex   text-sm font-medium">
        <div class="flex py-1 mt-2" >
            <span class=" bg-gray-200 rounded-lg py-1 p-5  text-sm font-semibold text-gray-700 ">{{$info->millesime}}</span>
        </div>
    </div>



<div class="flex mt-6 mr-4 space-x-2 text-sm font-medium justify-start items-stretch">
    <div class="flex justify-center">
        <span class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 px-3  text-2xl mx-3">
            <a href="{{$info->url_saq}}"><img class="w-9 h-12"   src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/84/SAQ_Logo.svg/1200px-SAQ_Logo.svg.png" alt=""></a>
        </span>
    </div>

             <!-- Modal -->
     <div class="modal" id="modal-{{$info->vino__bouteille_id}}">
        <div class="modal-bg modal-exit"></div>
        <div class="modal-container">
          <button data-action="no-supprimer" class="modal-close modal-exit">X</button>
          <h1>Êtes-vous certain de vouloir supprimer</h1>
          <h2>{{$info->nom}}</h2>
          <button data-action="supprimer" class="modal-exit">Oui</button>
          <button data-action="no-supprimer" class="modal-exit">Non</button>
        </div>
      </div>

      </div>
    </div>
  </div>

  @vite(['resources/js/listeBouteille.js'])

  @endforeach

  {{-- Section pour le navbar du bas --}}
  @include('layouts.bottomNav')




 <!-- Scripts -->
 @vite(['resources/js/cardVin.js'])

  @endsection
<!--
    /**
    * Script qui gere l'ajout et la suppression d'une bouteille dans la carte
    */

-->
<script>


</script>




