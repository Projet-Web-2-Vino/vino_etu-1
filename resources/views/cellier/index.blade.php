@extends('layouts.master')
@section('content')

    <!-- <a href="/SAQ">Importer le catalogue</a><br> -->
    <!-- idUsager = {{ $id_usager }} <br> -->





    <div class="py-5 font-bold text-5xl text-center">
        <h1>Espace cellier</h1>
    </div>


    <div class="px-2 py-4   m-2 mx-auto bg-white rounded-lg text-center">
        <a class=" uppercase bg-red-800 rounded px-3 py-1 text-lg font-semibold text-white text-center mr-2"
            href='cellier/nouveau'>
            <i class="fa-solid fa-plus text-3lg"></i> Ajouter un cellier

        </a>
    </div>

    @if (count($celliers) == 0)
        <div class="py-3 font-bold text-2xl text-center">
            <h3>Veuillez ajouter un cellier</h3>
        </div>
    @else
        <div class="py-3 font-bold text-2xl text-center">
            <h3 class="uppercase">Vos celliers</h3>
        </div>
        <hr>
    @endif

    @if (session()->has('success'))
        <div class="text-emerald-600 text-center font-semibold my-10">{{ session('success') }}</div>
    @endif

    <div class='max-w-full p-10'>
        <div class="relative gap-5  items-center w-full  rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
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
                @foreach ($celliers as $info)
                    <div class=" px-5 my-10 grow bg-white rounded-lg shadow-xl">
                        
                        <div class="p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-3">
                                {{-- Nom Cellier --}}
                                <h2 class="text-xl uppercase font-bold">
                                    {{ $info->nom_cellier }} 
                                
                                    <!-- zone edit cellier-->
                                  <span
                                  class="inline-block"><a
                                      href="{{ route('cellier.edit', ['id' => $info->id]) }}"><i
                                          class="far fa-edit"></i></a></span>
                                
                                
                                </h2>

                                

                                <small class="inline-block   py-1 pb-2 mt-1 text-sm font-semibold  mr-2">
                                    <span>
                                        @if ($info->bouteilles_count != 0)
                                            <a class="inline-block bg-red-800 rounded px-3 py-1 text-md font-semibold text-white mr-2"
                                                href='{{ route('bouteille.liste', ['id' => $info->id]) }}'>

                                                <i class="fa-solid fa-wine-bottle"></i>

                                                @if ($info->bouteilles_count == 1)
                                                    {{ $info->bouteilles_count }} bouteille
                                                @else
                                                    {{ $info->bouteilles_count }} bouteilles
                                                @endif

                                            </a>
                                        @endif
                                    </span>
                                </small>
                                <br>
                                <a class="inline-block bg-red-800 rounded px-3 py-1 text-sm font-semibold text-white mr-2" href='{{ route('bouteille.nouveau', ['id' => $info->id]) }}'><i
                                        class="fa-solid fa-plus"></i> Ajouter une bouteille
                                </a>
                                <div class="mt-5">
                                  
                                  <!-- zone delete cellier-->
                                  <span class="inline-block bg-gray-200 rounded px-3 py-1 text-xl font-semibold text-gray-700">
                                      <form action="{{ route('cellier.supprime', ['id' => $info->id]) }}" method="POST">
                                          @csrf
                                          <button data-modal="modal-{{$info->id}}"><i class="fa-solid fa-trash"></i></button>
                                      </form>
      
                                  </span>
                              </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal" id="modal-{{$info->id}}">
                        <div class="modal-bg modal-exit"></div>
                        <div class="modal-container">
                        <button data-action="no-supprimer" class="modal-close modal-exit">X</button>
                        <h1>Êtes-vous certain de vouloir supprimer le ceiller</h1>
                        <h2>{{$info->nom_cellier}}</h2>

                        <p>
                            @if ($info->bouteilles_count != 0)
                                @if ($info->bouteilles_count == 1)
                                    {{ $info->bouteilles_count }} bouteille
                                @else
                                    {{ $info->bouteilles_count }} bouteilles
                            @endif
                            seront également suprrimées
                            @endif
                        </p>
                        <button data-action="supprimer" class="modal-exit">Oui</button>
                        <button data-action="no-supprimer" class="modal-exit">Non</button>
                        </div>
                    </div>





                @endforeach
            @endif
        </div>
    </div>
@endsection


<!--
    /**
    * Script qui gere l'ajout et la suppression d'une bouteille dans la carte
    */

-->
<script>
            
    window.addEventListener("load",function(){


    //Détecter si url =  vue liste bouteille
    

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

    });

</script>
