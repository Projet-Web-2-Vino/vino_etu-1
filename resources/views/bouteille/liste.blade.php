
@extends('layouts.master')
@section('content')


 <!-- Scripts Modal et Ajout Quantiter Bouteille-->
 @vite(['resources/js/listeBouteille.js'])



    <!-- Feedback success -->
    @if (session()->has('success'))
    <div class="text-emerald-600 text-center font-semibold my-10">{{ session('success') }}</div>
    @endif

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
    {{-- Section Carte Bouteil  --}}
    <style>
        .checker-bg {
        background-color: #ffffff;
        background-image: url("https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166");
        background-repeat: no-repeat;
        background-position: center;

        }
      </style>
    @foreach ($bouteilles as  $info)
      <div class="w-80 bg-white shadow  border border-transparent mx-auto hover:shadow-xl rounded-lg">
        <div class="h-48 w-full checker-bg flex flex-col justify-between p-4">
{{--
          <div class="w-8 h-9 bg-white rounded flex items-center justify-center text-red-500">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
            </svg>
          </div> --}}
        </div>

        <div class="p-4">
          <div class="flex items-center justify-between">
            {{-- Section pour inserer le nom de la bouteille --}}
            <h1 class="text-gray-600 font-medium">{{$info->nom}}</h1>
            <button class="text-gray-500 hover:text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
              </svg>
            </button>
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
        <p class="py-2 font-semibold "><small>Note</small></p>
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        </div>

          {{-- <p class="text-gray-400 text-sm my-1">Jack cooper</p> --}}
           {{-- Section AJOUTER au BOIRE --}}
           @csrf
           <div class="options py-2  text-sm" data-id="{{$info->vino__cellier_id}}" data-id-vin="{{$info->vino__bouteille_id}}">
               <p class="font-semibold">Quantité :</p>
                   <div class="flex py-3" >
                       <button data-action="plus" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'><i class="fa-solid fa-plus"></i></button>
                       <p class="p-2 quantite">{{$info->quantite}}</p>
                       <button data-action="moins" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'><i class="fa-solid fa-minus"></i></button>
                   </div>
                {{-- Section Millesime --}}
                    <div class="flex  " >
                        <p> <strong>  Millesime :</strong></p>
                        <span class=" rounded-lg py-1 p-3 pb-2  text-sm font-semibold text-gray-700 ">{{$info->millesime}}</span>
                    </div>

           </div>
          {{-- <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium">Approved</span> --}}

            <div class="flex ">
                <span class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0  mx-3">
                    <a href="{{$info->url_saq}}"><img class="w-9 h-12"   src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/84/SAQ_Logo.svg/1200px-SAQ_Logo.svg.png" alt=""></a>
                </span>
                {{-- Section pour Modifier --}}
                <span class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-gray-200 px-5 py-2 hover:shadow-lg tracking-wider text-gray-700 rounded-md hover:bg-gray-700 hover:text-gray-200 mx-3">
                    <button>
                        <span> <a class="btnModifier" href="{{ route('bouteille.edit', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id  ]) }}"><i class="fa-solid fa-pen-to-square"></i></a></span>
                    </button>
                </span>

                {{-- Section pour Supprimer --}}

                <span class="transition ease-in duration-300 flex justify-center items-center select-none text-sm font-medium mb-2 md:mb-0 bg-gray-200 px-5 py-2 hover:shadow-lg tracking-wider text-gray-700 rounded-md hover:bg-gray-700 hover:text-gray-200 mx-3">
                    <form action="{{ route('bouteille.supprime', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id ]) }}" method="POST">
                        @csrf
                        <button data-modal="modal-{{$info->vino__bouteille_id}}" class="delete"><i class="fa-sharp fa-solid fa-trash  space-y-2"></i></button>
                    </form>
                </span>

            </div>
        </div>
      </div>

    {{-- Section Fin Carte Bouteil  --}}



    @if (count($bouteilles) == 0)
    <p>
        Vous n'avez aucune bouteille au cellier <em>{{$cellier->nom_cellier}}</em>
        <a href="{{ route('bouteille.nouveau', ['id' => $id_cellier ]) }}">Ajouter une bouteille</a>
    </p>
    @endif




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


  @endforeach

  {{-- Section pour le navbar du bas --}}
  @include('layouts.bottomNav')

  @endsection


