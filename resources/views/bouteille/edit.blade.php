@extends ('layouts.master')
@section('content')

<!-- Début form modif -->



        {{-- Section Formulaire Modification de bouteil --}}
        <div class="bg-gray-100  flex flex-col justify-center ">
            <div class="relative py-3  m-5">
                <div class="relative px-4 py-10 bg-white md:mx-8 shadow rounded-3xl sm:p-10">
                    <div class=" mx-auto">
                        <div class="flex items-center space-x-5">
                            <div class="h-11 w-11 rounded-full justify-center items-center text-yellow-500 text-2xl font-mono">
                                <img src="https://media.istockphoto.com/id/913518238/vector/silhouette-of-a-glass-wine-bottle.jpg?s=612x612&w=0&k=20&c=RYRdVJK8i4-M6oBVTDjnnNMFgFEua7uYVSSJI3LtpkM=" alt="">
                            </div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                            <h2 class="leading-relaxed">Modification d'une bouteille</h2>
                            <p class="text-sm text-gray-500 font-normal leading-relaxed">Cellier : {{$cellier->nom_cellier}}</p>
                            </div>
                        </div>

						<form id="formAjoutBouteille" action="{{ route('bouteille.update', ['idVin' => $bouteille->vino__bouteille_id, 'idCellier' => $bouteille->vino__cellier_id ])}}" method="POST">
							@csrf
                        {{-- Section Nom de la bouteille --}}
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Nom</label>
                                    <input class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="nom" name="nom" type="text" value="{{ old('nom', $bouteille->nom)}}" required>
                                </div>

                                {{-- Section Type de Bouteil--}}
                                <label class="leading-loose">Type</label>
                                <div class="pb-2 flex items-center space-x-4 ">
                                    <input type="radio" name="type" id="rouge" value="1" required @if($bouteille->type == "1") checked @endif >
                                      <label for="rouge">Rouge</label>
                                      <input type="radio" name="type" id="blanc" value="2" @if($bouteille->type == "2") checked @endif>
                                      <label for="blanc">Blanc</label>
                                      <input type="radio" name="type" id="rose" value="3" @if($bouteille->type == "3") checked @endif>
                                    <label for="rose">Rosé</label>
                                </div>

                                {{-- Section Pays, Format, Millesime, Description --}}
                                <div class="flex flex-col">
                                    <label class="leading-loose">Pays</label>
                                    <input class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="pays" name="pays" type="text" value="{{ old('pays', $bouteille->pays)}}">
                                    <label class="leading-loose">Format</label>
                                    <input class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="format" name="format" type="text" value="{{ old('format', $bouteille->format)}}">
									

								<?php $years = range(1900, strftime("%Y", time())); ?>
								<label class="leading-loose" for="millesime">Millesime :</label>
								<select id="millesime" name="millesime" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
									<option value="{{$bouteille->millesime}}">{{$bouteille->millesime}}</option>
									<?php foreach($years as $year) : ?>
									  <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
									<?php endforeach; ?>
								  </select>




                                    <label class="leading-loose">Description</label>
                                    <textarea class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="description" name="description">{{ old('description', $bouteille->description)}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4 flex flex-wrap items-center space-x-4">
						    <button class="bg-red-800 flex justify-center items-center  text-white px-4 py-3 rounded-md focus:outline-none">Sauvegarder</button>
                            <a class="flex justify-center items-center  text-gray-900 px-4 py-3 rounded-md focus:outline-none" href='{{ route('bouteille.liste', ['id' => $bouteille->vino__cellier_id]) }}'>
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Annuler
                            </a>
                        </div>
                    </form>
					
                        {{-- Section pour le bouton ajouter et supprimer 
                            <div class="pt-4 flex flex-wrap items-center space-x-4">
                                
                                <form action="{{ route('bouteille.supprime', ['idVin' => $bouteille->id, 'idCellier' => $cellier->id ]) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-800 flex justify-center items-center  text-white px-3 py-3 rounded-md focus:outline-none">Supprimer</button>
                                </form>  --}}
                            
                        </div>
                    </div>
                </div>
            </div>
  
{{-- Section pour le navbar du bas --}}
@include('layouts.bottomNav')


@endsection

