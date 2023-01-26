@extends ('layouts.master')
@section('content')

@if (session()->has('success'))
<span style="color:green">{{ session('success') }}</span>
@endif


	{{-- <form id="formAjoutBouteille" action="{{ route('bouteille.update', ['id' => $bouteille->id])}}" method="POST">
		@csrf

		  <label for="nom"> * Nom  :</label>
		  <input id="nom" name="nom" type="text" value="{{ old('nom', $bouteille->nom)}}" required>
		  <br>


		  <span>* Type :</span>
		  <br>
		  <input type="radio" name="type" id="rouge" value="1" required @if($bouteille->type == "1") checked @endif >
		  <label for="rouge">Rouge</label>
		  <input type="radio" name="type" id="blanc" value="2" @if($bouteille->type == "2") checked @endif>
		  <label for="blanc">Blanc</label>
		  <input type="radio" name="type" id="rose" value="3" @if($bouteille->type == "3") checked @endif>
		  <label for="rose">Rosé</label>
		  <br>

		  <label for="pays">Pays :</label>
		  <input id="pays" name="pays" type="text" value="{{ old('pays', $bouteille->pays)}}">
		  <br>
		  <label for="format">Format :</label>
		  <input id="format" name="format" type="text" value="{{ old('format', $bouteille->format)}}">
		  <br>
		  <label for="millesime">Millesime :</label>
		  <input id="millesime" name="millesime" type="text" value="{{ old('millesime', $bouteille->millesime)}}">
		  <br>
		  <label for="description">Description</label>
		  <textarea id="description" name="description">{{ old('description', $bouteille->description)}}</textarea>
		  <br>

		  <input id="url_saq" name="url_saq" type="hidden" value="{{ old('url_saq', $bouteille->url_saq)}}">
		  <input id="code_saq" name="code_saq" type="hidden" value="{{ old('code_saq', $bouteille->code_saq)}}">
		  <input id="image" name="image" type="hidden" value="{{ old('image', $bouteille->image)}}">
		  <input id="prix_saq" name="prix_saq" type="hidden" value="{{ old('prix_saq', $bouteille->prix_saq)}}">
		  <input id="url_img" name="url_img" type="hidden" value="{{ old('url_img', $bouteille->url_img)}}">

		  <button>Modifier</button>

		</form>

        <form action="{{ route('bouteille.supprime', ['id' => $bouteille->id]) }}" method="POST">
            @csrf

            <button>Supprimer</button>
        </form> --}}



<!-- Début form modif -->

<form id="formAjoutBouteille" action="{{ route('bouteille.update', ['id' => $bouteille->id])}}" method="POST">
    @csrf

        {{-- Section Formulaire Modification de bouteil --}}
        <div class="bg-gray-100  flex flex-col justify-center ">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div class="h-11 w-11 rounded-full justify-center items-center text-yellow-500 text-2xl font-mono">
                                <img src="https://media.istockphoto.com/id/913518238/vector/silhouette-of-a-glass-wine-bottle.jpg?s=612x612&w=0&k=20&c=RYRdVJK8i4-M6oBVTDjnnNMFgFEua7uYVSSJI3LtpkM=" alt="">
                            </div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                            <h2 class="leading-relaxed">Modification d'une bouteille</h2>
                            <p class="text-sm text-gray-500 font-normal leading-relaxed">Veuillez entrer vos informations</p>
                            </div>

                        </div>
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
                                    <label class="leading-loose">Millesime</label>
                                    <input class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="millesime" name="millesime" type="text" value="{{ old('millesime', $bouteille->millesime)}}">
                                    <label class="leading-loose">Description</label>
                                    <textarea class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="description" name="description">{{ old('description', $bouteille->description)}}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Section pour le bouton ajouter et supprimer --}}
                            <div class="pt-4 flex items-center space-x-4">
                                <button class="bg-red-800 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Sauvegarder</button>
                                <form action="{{ route('bouteille.supprime', ['id' => $bouteille->id]) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-800 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Supprimer</button>
                                </form>
                                {{-- Section pour le bouton ajouter --}}
                                <form action="{{ route('bouteille.creer')}}" method="POST">
                                    @csrf
                                </form>
                                <button class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none" href='/cellier'>
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Canceler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <a href="/cellier">Espace cellier</a>
<a href="/bouteille">Liste bouteille du catalogue</a>


@endsection
