@extends('layouts.master')
@section('content')



 <!-- Scripts Modal et Ajout Quantiter Bouteille-->
 @vite(['resources/js/listeBouteille.js'])

    <div class='container mb-20 max-w-full'>
    {{-- Section header --}}
        <article class="zoneRouge mb-5 rounded-md bg-gradient-to-r from-red-900 via-red-800 to-red-600 p-5 sm:py-8">
        <h1 class="titreZoneRouge  text-6xl font-bold text-white ">
            Vos bouteilles
        </h1>
            <p class="text-sm font-normal text-white">Bienvenue dans votre cellier : {{$cellier->nom_cellier}}</p>
        </article>

        <!-- Feedback success -->
        @if (session()->has('success'))
        <div class="text-emerald-600 text-center font-semibold my-10">{{ session('success') }}</div>
        @endif




    {{-- Section Carte Bouteille  --}}
    <div class="flexPerso">
    @foreach ($bouteilles as  $info)
      <div class="vinoCarte m-2 bg-white shadow  border rounded-lg">

        {{-- Section Action  --}}
        <div class="flex justify-between relative rounded-3xl  p-3 text-right">

            <!-- logo SAQ-->
            <span class="inline-block mr-2">
                <a href="{{$info->url_saq}}"><img class="logoSAQ" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/84/SAQ_Logo.svg/1200px-SAQ_Logo.svg.png" alt=""></a>
            </span>


              <!-- zone edit bouteille-->
              <div class="flex justify-items-end">
              <span class="inline-block text-xl text-gray-700 mr-2">
                  <a href="{{ route('bouteille.edit', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id  ]) }}">
                  <i class="far fa-edit"></i></a>
              </span>
              <!-- zone delete bouteille-->
              <span class="inline-block text-xl  text-gray-700">
                  <form action="{{ route('bouteille.supprime', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id ]) }}" method="POST">
                      @csrf
                      <button data-modal="modal-{{ $info->vino__bouteille_id }}" class="delete">
                        <i class="fa-sharp fa-solid fa-trash  space-y-2"></i></button>
                  </form>
              </span>
          </div>
        </div>
        {{-- FIN Section Action  --}}

        {{-- Section img  --}}
        <div class='zoneImg'>
                @switch($info->type)
                @case(1)
                    <img src="https://www.saq.com/media/catalog/product/1/5/15085107-1_1661793344.png">
                @break
                @case(2)
                    <img  src="https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png">
                @break
                @case(3)
                    <img src="https://www.saq.com/media/catalog/product/2/1/219840-1_1632166239.png">
                @break
            @endswitch
        </div>
        {{-- FIN Section img  --}}

        <div class="p-4">

          <div class="flex items-center justify-between">
            {{-- Section pour inserer le nom de la bouteille --}}
            <h1 class="text-gray-600 font-medium">{{$info->nom}}</h1>

            {{-- Boutton pour gerer la description --}}
            {{-- <button class="text-gray-500 hover:text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
              </svg>
            </button> --}}

            {{-- Click pour Info description sur la bouteille ALPINEJS--}}
            <div x-data="{showContextMenu:false}">
                <div class="relative" @click.away="showContextMenu=false">
                    <button class="bg-white h-10 w-10 leading-10 text-center text-gray-800 text-xl shadow-md border border-gray-200 hover:border-gray-300 focus:border-gray-300 rounded-lg transition-all font-semibold outline-none focus:outline-none" x-on:contextmenu="$event.preventDefault();showContextMenu=true" @click.prevent="showContextMenu=false">
                        <i class="fas fa-info"></i>
                    </button>
                    <div class="absolute mt-12 top-0 left-1 min-w-full w-48 z-30" style="display:none;" x-show="showContextMenu" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                        <span class="absolute top-0 left-0 w-2 h-2 bg-white transform rotate-45 -mt-1 ml-3 border-gray-300 border-l border-t z-20"></span>
                        <div class="bg-white overflow-auto rounded-lg shadow-md w-full relative z-10 py-2 border border-gray-300 text-gray-800 text-xs">
                            <div class="p-1">
                                <small><p>description</p></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          </div>

          <div class="py-1 text-m font- justify-start">
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
                | {{$info->format}} | {{$info->pays}}
            </small>
        </div>

        {{-- Section millesime--}}
        @if ($info->millesime)
        <div class="options py-1 flex mt-3 pr-3 space-x-2  text-sm font-medium justify-start items-baseline">
            <p>Millesime</p>
            <span class="inline-block bg-slate-900 text-white rounded-lg p-1   text-sm font-semibold text-gray-700 ">{{ $info->millesime }}</span>
        </div>
    @endif




        {{-- Section pour inserer les notes --}}
        <div>
            <p class="text-sm font-medium">Note</p>
            <div class="flex">
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>
        </div>

           {{-- Section AJOUTER au BOIRE --}}
           @csrf
           <div class="options py-2  text-sm" data-id="{{$info->vino__cellier_id}}" data-id-vin="{{$info->vino__bouteille_id}}">
               <p class="font-semibold">Quantité </p>
                   <div class="flex py-3" >
                    <button data-id="{{ $info->vino__cellier_id }}" data-id-vin="{{ $info->vino__bouteille_id }}" data-action="plus" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'>
                        <i class="fa-solid fa-plus"></i></button>
                    <p class="p-2 quantite">{{ $info->quantite }}</p>
                    <button data-id="{{ $info->vino__cellier_id }}" data-id-vin="{{ $info->vino__bouteille_id }}" data-action="moins" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'>
                        <i class="fa-solid fa-minus"></i></button>
                   </div>

           </div>
        </div>

    {{-- Section Fin Carte Bouteil  --}}

</div>






    <!-- Modal -->
    <div class="modalBouteille modal" id="modal-{{ $info->vino__bouteille_id }}">
        <div class="modal-bg modal-exit"></div>
        <div class="modal-container">
            <button data-action="no-supprimer" class="modal-close modal-exit"><i class="fa fa-window-close"
                    aria-hidden="true"></i></button>
            <div><i class="block text-amber-600 mx-auto fa-solid fa-triangle-exclamation text-5xl"></i>
            </div>
            <h1 class="text-2xl font-bold">Voulez-vous supprimer</h1>
            <h2 class="font-semibold uppercase text-2xl text-amber-800">{{ $info->nom }}</h2>

            <p class="mb-3">
                @if ($info->quantite != 0)
                    @if ($info->quantite == 1)
                        {{ $info->quantite }} bouteille sera supprimée
                    @else
                        {{ $info->quantite }} bouteilles seront supprimées
                    @endif
                @endif
            </p>
            <div class="flex justify-end space-x-1">
                <button class="bg-red-900 text-white font-bold py-2 px-4 rounded modal-exit"
                    data-action="supprimer" class="modal-exit">Supprimer</button>
                <button class="bg-slate-900 text-white font-bold py-2 px-4 rounded modal-exit"
                    data-action="no-supprimer" class="modal-exit">Non</button>


            </div>
        </div>
    </div> <!-- Modal Fin -->
  @endforeach
</div>
    {{-- Section pour le navbar du bas --}}
    @include('layouts.bottomNav')
@endsection


<!--
    /**
    * Script qui gere l'ajout et la suppression d'une bouteille dans la carte
    */

-->
<script>
    window.addEventListener("load", function() {


        //Détecter si url =  vue liste bouteille
        if (window.location.href.indexOf("bouteille") > -1) {
            //console.log('oui')


            //Gestionnaire d'evenement du bouton delete

            const modals = document.querySelectorAll("[data-modal]");

            modals.forEach(function(trigger) {
                trigger.addEventListener("click", function(event) {
                    event.preventDefault();
                    let form = event.target.parentElement.parentElement
                   // console.log(trigger.dataset.modal)
                    const modal = document.getElementById(trigger.dataset.modal);
                   // console.log(modal);
                    modal.classList.add("open");
                    const exits = modal.querySelectorAll(".modal-exit");
                    exits.forEach(function(exit) {
                        exit.addEventListener("click", function(event) {
                            event.preventDefault();
                           // console.log(form)
                            //console.log(event.target.dataset.action)
                            if (event.target.dataset.action == "supprimer") {
                                //console.log(form)
                                form.submit();
                            }
                            modal.classList.remove("open");
                        });
                    });
                });
            });



            // ajouter un gestionnaire d'évènement au bouton ajouter/enlever
            let elBoutonAjout = this.document.querySelectorAll('.btnModif')

            elBoutonAjout.forEach(element => {

                //Fontion qui ajoute  une bouteille lorsque l'usager click sur le bouton ajouter
                element.addEventListener('click', function(evt) {
                    evt.preventDefault();
                    let idCellier = element.dataset.id
                   // console.log(evt.target)
                     //console.log(idCellier);

                    let idVin = element.dataset.idVin;
                     //console.log(idVin);

                    let elemBouteille = evt.target.parentElement.parentElement;
                    // console.log(elemBouteille);

                    let valueQuantite = elemBouteille.querySelector('.quantite').innerText;
                    let elemQuantite = elemBouteille.querySelector('.quantite')
                   // console.log(valueQuantite);


                    let action = evt.target.parentElement.dataset.action
                    //console.log(action)
                    let newQuantite = valueQuantite
                    if (action == 'plus') {
                        newQuantite = parseInt(valueQuantite) + 1
                    } else {
                        //console.log(valueQuantite)

                        if (valueQuantite != 0) {
                            newQuantite = parseInt(valueQuantite) - 1
                        } else {
                            newQuantite = 0;

                        }
                    }

                    // console.log(newQuantite);

                    //recherche Url
                    const url = window.location.href
                    //console.log(url);

                    const options = {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": document.querySelector('input[name="_token"]')
                                .value
                        },
                        method: "post",
                        credentials: "same-origin",
                        body: JSON.stringify({
                            idCellier: idCellier,
                            idVin: idVin,
                            quantite: newQuantite
                        })
                    }


                     fetch(url, options)
                        .then((data) => {
                            //console.log(data)
                            /*Injecter la quantite dans le HTML*/
                    //console.log(typeof newQuantite)
                    // console.log(valueQuantite);
                    elemQuantite.innerText = newQuantite.toString();

                      })

                        .catch(function(error){
                           // console.log(error);
                        })








                });
            })

        }

    });
</script>

