
@extends('layouts.master')
@section('content')




    {{-- Section Boutton pour Importer et Cellier --}}
    <div class="py-8  grid place-items-center ">

        <h1 class="titleBouteille text-5xl  font-extrabold">L'atelier à vin</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 text-center">Bienvenue dans votre espace cellier : {{$cellier->nom_cellier}}.</p>
        <ul class="py-6 flex flex-wrap align-items-center justify-center  -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">


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
  <div class="w-fit py-3 mt-3 m-2  flex items-center bg-white shadow-md hover:shadow-xl rounded-lg">






    <img class="h-300 w-300" src="https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166">
    <div>
        <div class="px-3">
        {{-- Section pour inserer NOM de la bouteille --}}
        <h3 class="titreBouteille"><strong>{{$info->nom}}</strong></h3>
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
            | {{$info->format}} | {{$info->pays}}  </small>
    </div>

    <form  method="POST">


        {{-- Section ajouter au boire.  --}}

            @csrf
        <div class="options py-1 flex px-3 space-x-2  text-sm font-medium justify-start" data-id="{{$info->vino__cellier_id}}" data-id-vin="{{$info->vino__bouteille_id}}">
            <p>Quantité :</p>
             <p class="quantite">{{$info->quantite}}</p>

                 <button data-action="plus" class='btnModif inline-block bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'><i class="fa-solid fa-plus"></i></button>
                <button data-action="moins" class='btnModif inline-block bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'><i class="fa-solid fa-minus"></i></button>

        </div>


</form>

    <div class="options py-1 flex px-3 space-x-2  text-sm font-medium justify-start"">
        <p>Millesime :</p>
        <span class="inline-block bg-gray-200 rounded-lg px-3 py-1  ml-3 text-sm font-semibold text-gray-700 mr-2">{{$info->millesime}}</span>

    </div>



<div class="flex mt-6 mr-4 space-x-2 text-sm font-medium justify-start">


 {{-- Section pour inserer URL SAQ
 @if($info->url_saq)
 <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-800 px-3 py-2 hover:shadow-lg tracking-wider text-white rounded-md hover:bg-red-600 ">
   <span><a href="{{$info->url_saq}}">Voir SAQ</a></span>
 </button>
 @endif --}}


 <div class="flex justify-center">
    <span class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 px-3  text-2xl mx-3">
        <a href="{{$info->url_saq}}"><img class="w-9 h-12"   src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/84/SAQ_Logo.svg/1200px-SAQ_Logo.svg.png" alt=""></a>
    </span>

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



  @endforeach

  {{-- Section pour le navbar du bas --}}
  @include('layouts.bottomNav')

  @endsection








<!--
    /**
    * Script qui gere l'ajout et la suppression d'une bouteille dans la carte
    */

-->
<script>

        window.addEventListener("load",function(){


        //Détecter si url =  vue liste bouteille
        if (window.location.href.indexOf("bouteille") > -1) {
            //console.log('oui')


            //Gestionnaire d'evenement du bouton delete

            const modals = document.querySelectorAll("[data-modal]");

            modals.forEach(function (trigger) {
            trigger.addEventListener("click", function (event) {
                event.preventDefault();
                let form = event.target.parentElement.parentElement
                console.log(trigger.dataset.modal)
                const modal = document.getElementById(trigger.dataset.modal);
                console.log(modal);
                modal.classList.add("open");
                const exits = modal.querySelectorAll(".modal-exit");
                exits.forEach(function (exit) {
                exit.addEventListener("click", function (event) {
                    event.preventDefault();
                    console.log(form)
                    console.log(event.target.dataset.action)
                    if(event.target.dataset.action == "supprimer"){
                        console.log(form)
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
                element.addEventListener('click', function (evt) {
                    evt.preventDefault();
                    let idCellier = evt.target.parentElement.parentElement.dataset.id
                // console.log(evt.target.parentElement.parentElement.dataset.id)
                // console.log(idCellier);

                    let idVin = evt.target.parentElement.parentElement.dataset.idVin;
                // console.log(idVin);

                    let elemBouteille = evt.target.parentElement.parentElement;
                    // console.log(elemBouteille);

                    let valueQuantite = elemBouteille.querySelector('.quantite').innerText;
                    let elemQuantite = elemBouteille.querySelector('.quantite')
                // console.log(valueQuantite);


                let action = evt.target.parentElement.dataset.action
                //console.log(action)
                let newQuantite = valueQuantite
                    if(action == 'plus'){
                        newQuantite = parseInt(valueQuantite) + 1
                    }else{
                    console.log(valueQuantite)

                        if(valueQuantite != 0 ){
                        newQuantite = parseInt(valueQuantite) - 1
                        }else{
                            newQuantite = 0;

                        }
                    }

                // console.log(newQuantite);

                //recherche Url
                const url = window.location.href
                    console.log(url);

                    const options = {
                            headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": document.querySelector('input[name="_token"]').value
                            },
                            method: "post",
                            credentials: "same-origin",
                            body: JSON.stringify({
                            idCellier :  idCellier,
                            idVin :  idVin,
                            quantite: newQuantite
                            })
                        }


                    /* fetch(url, options)
                        .then((data) => {

                            /*Injecter la quantite dans le HTML*/
                            //console.log(typeof newQuantite)
                        // console.log(valueQuantite);
                        elemQuantite.innerText = newQuantite.toString();

                    /*  })

                        .catch(function(error){
                            console.log(error);
                        })*/








                });
            })

        }

        });

</script>




