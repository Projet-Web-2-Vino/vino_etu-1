@extends('layouts.master')
@section('content')



 <!-- Scripts Modal et Ajout Quantiter Bouteille-->
 @vite(['resources/js/listeBouteille.js'])



    {{-- Section Boutton pour Importer et Cellier --}}
    <div class="  grid place-items-center ">
        <h1 class="titleBouteille text-5xl  font-extrabold">Vos bouteilles</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 text-center">Votre espace cellier :
            {{ $cellier->nom_cellier }}.</p>
    </div>


    <!-- Feedback success -->
    @if (session()->has('success'))
        <div class="text-emerald-600 text-center font-semibold my-10">{{ session('success') }}</div>
    @endif


    {{-- Section bouton retour --}}
    <div class="p-3">
       <a href="/cellier">
        <button class="w-12 h-12 rounded-full
        bg-gradient-to-r from-red-900 via-red-800 to-red-600  text-white">
            <i class=" fa-2xl fa-solid fa-angle-left  text-xs text-white sm:text-3xl md:text-6xl fa-fade justify-center"></i></a>
        </button>
    </div>

    {{-- Section Boutton pour Importer et Cellier --}}
    <div class="  grid place-items-center  ">
        {{-- Section header --}}
        <article class=" transition-all relative h-[350px] w-[350px]  overflow-auto rounded-3xl bg-gradient-to-r from-red-900 via-red-800 to-red-600 p-2 pt-10">
            <h1 class=" text-6xl font-bold leading-snugg text-white p-2">
              Espace
              Bouteilles
            </h1>
              <p class="px-3 mt-5 text-sm font-normal text-white">Bienvenue dans votre cave à vin : {{$cellier->nom_cellier}}</p>
          </article>



        <ul class="py-6 flex flex-wrap align-items-center justify-center mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            {{-- Section Ajouter Bouteille--}}
            <li class="mr-2">
                <a href='{{ route('bouteille.nouveau', ['id' => $cellier->id]) }}'>
                    <button type="button" class="text-white mt-4/8 bg-slate-800 hover:bg-slate-800/80 focus:ring-4  font-medium rounded-full text-sm px-20 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                        Ajouter une bouteille
                    </button>
                </a>
            </li>
               {{-- Section Filtre Snap Scroll--}}
               <div class="flex justify-center pt-4 space-x-2">
                <div class="card w-[100px]  h-[100px]  bg-white  shadow   mx-auto hover:shadow-xl rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/5c23c149fcf7fd189fa57e45/1607028981777-ZP4QA0LB3CSPZ52VAV4H/montage+note+book_2012fond+blanc+carre%CC%81.jpg" alt="">
                </div>
                <div class="card w-[100px]  h-[100px]  bg-white  shadow   mx-auto hover:shadow-xl rounded-lg ">
                    <img  src="https://images.squarespace-cdn.com/content/v1/5c23c149fcf7fd189fa57e45/1607028981777-ZP4QA0LB3CSPZ52VAV4H/montage+note+book_2012fond+blanc+carre%CC%81.jpg" alt="">
                </div>
                <div class="card w-[100px]  h-[100px]  bg-white shadow   mx-auto hover:shadow-xl rounded-lg ">
                    <img  src="https://images.squarespace-cdn.com/content/v1/5c23c149fcf7fd189fa57e45/1607028981777-ZP4QA0LB3CSPZ52VAV4H/montage+note+book_2012fond+blanc+carre%CC%81.jpg" alt="">
                </div>
            </div>

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
      <div class="w-80 bg-white shadow  border border-transparent mx-auto hover:shadow-xl rounded-lg pt-10 pb-20">
        <div class="h-48 w-full checker-bg flex flex-col justify-between p-4">

        {{-- SECTION POUR ACTION --}}
          <div class="pl-5 w-8 h-9 bg-white rounded flex items-center justify-center  space-x-1">
            {{-- Section pour modifier --}}
            <button>
                <span class="  p-2  text-gray-700 rounded-md "> <a class="btnModifier" href="{{ route('bouteille.edit', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id  ]) }}"><i class="fa-solid fa-pen-to-square"></i></a></span>
            </button>
            {{-- Section pour supprimer --}}
            <form action="{{ route('bouteille.supprime', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id ]) }}" method="POST">
                @csrf
              <span class="  p-2  text-gray-700 rounded-md"><button data-modal="modal-{{$info->vino__bouteille_id}}" class="delete"><i class="fa-sharp fa-solid fa-trash  space-y-2"></i></button></span>
            </form>
          </div>

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


=======


    {{-- Section pour carte des vins --}}
    <div class="flex flex-wrap 	justify-evenly mb-20">
        @foreach ($bouteilles as $info)


         

            <div class="w-fit py-3 mt-3 m-2  bg-white rounded-lg">

                <!-- zone edition bouteille-->
         <div class="flex p-2 space-x-2 justify-end bg-gray-100 bg-white">
            {{-- Section pour Modifier seulement si artisanal--}}
            @if (!$info->url_saq)
            <span class="inline-block text-xl text-gray-700">
                    <button>
                         <a class="btnModifier" href="{{ route('bouteille.edit', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id]) }}">
                        <i class="fa-solid fa-pen-to-square"></i></a></span>
                    </button>
                </span>
            @endif
        {{-- Section pour Supprimer --}}
            <span class="inline-block text-xl text-gray-700">
                <form action="{{ route('bouteille.supprime', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id]) }}" method="POST">
                    @csrf
                    <button data-modal="modal-{{ $info->vino__bouteille_id }}" class="delete">
                        <i class="fa-sharp fa-solid fa-trash  space-y-2"></i></button>
                </form>
            </span>
        </div>
        <div class="flex py-3 mt-3 m-2   items-center ">
                <!-- image selon le type, venant du scraping ne marchait pas -->
                @switch($info->type)
                    @case(1)
                        <img class="h-300 w-300" src="https://www.saq.com/media/catalog/product/1/5/15085107-1_1661793344.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166">
                    @break
                    @case(2)
                        <img class="h-300 w-300" src="https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166">
                    @break
                    @case(3)
                        <img class="h-300 w-300" src="https://www.saq.com/media/catalog/product/2/1/219840-1_1632166239.png?quality=80&fit=boundsheight=166&width=111">
                    @break
                @endswitch

                <!-- section info -->
                <div>
                    <div class="px-3">
                        {{-- Section pour inserer NOM de la bouteille --}}
                        <h3 class="titreBouteille"><strong>{{ $info->nom }}</strong></h3>
                    </div>

                    {{-- Section pour inserer NOTE
        <div class="px-2 w-full flex-none text-sm flex items-center text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>

            <span class="text-gray-400 whitespace-nowrap mr-3">4.60</span><span class="mr-2 text-gray-400">Note</span>
        </div> --}}

                    <div class=" px-3 py-1 text-m font- justify-start">
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
                            | {{ $info->format }} | {{ $info->pays }} </small>
                    </div>

                    <form method="POST">
                        {{-- Section ajouter au boire.  --}}
                        @csrf
                        <div class="options py-2 px-3  text-sm font-medium " data-id="{{ $info->vino__cellier_id }}"
                            data-id-vin="{{ $info->vino__bouteille_id }}">
                            <p>Quantité :</p>
                            <div class="flex py-3">
                                <button data-id="{{ $info->vino__cellier_id }}" data-id-vin="{{ $info->vino__bouteille_id }}" data-action="plus" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'>
                                    <i class="fa-solid fa-plus"></i></button>
                                <p class="p-2 quantite">{{ $info->quantite }}</p>
                                <button data-id="{{ $info->vino__cellier_id }}" data-id-vin="{{ $info->vino__bouteille_id }}" data-action="moins" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'>
                                    <i class="fa-solid fa-minus"></i></button>
                            </div>
                        </div>
                    </form>

                    @if ($info->millesime)
                        <div class="options py-1 flex px-3 space-x-2  text-sm font-medium justify-start">
                            <p>Millesime :</p>
                            <span class="inline-block bg-gray-200 rounded-lg px-3 py-1  ml-3 text-sm font-semibold text-gray-700 mr-2">{{ $info->millesime }}</span>

                        </div>
                    @endif

                {{-- Lien SAQ si existe--}}
                    <div class="flex mt-6 mr-4 space-x-2 text-sm font-medium justify-start">
                        @if ($info->url_saq)
                            <div class="flex justify-center">
                                <span class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 px-3  text-2xl mx-3">
                                    <a href="{{ $info->url_saq }}">
                                        <img class="w-9 h-12"src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/84/SAQ_Logo.svg/1200px-SAQ_Logo.svg.png" alt="">
                                        </a>
                                </span>
                            </div>
                        @endif
                        
                                
                            </div>
                        </div>
                </div>
            </div>    
                 <!-- Modal -->
                 <div class="modal" id="modal-{{ $info->vino__bouteille_id }}">
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

