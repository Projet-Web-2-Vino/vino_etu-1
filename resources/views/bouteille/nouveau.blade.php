
@extends('layouts.master')
@section('content')

<!-- Feedback success -->
@if (session()->has('success'))
<div class="text-emerald-600 text-center font-semibold my-10">{{ session('success') }}</div>
@endif





 <div class="relative gap-5 items-center w-full  rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
	<!-- Début form ajout -->
	<div id="nouvelleBouteille" class=" p-5 bg-gray-100  flex flex-col justify-center ">
		<div class="max-w-md mx-auto">
			<div class="flex items-center space-x-5">
				<div class="h-12 w-12 rounded-full justify-center items-center text-yellow-500 text-2xl font-mono">
					<img src="https://static.thenounproject.com/png/5003274-200.png" alt="">
				</div>
				<div class="block pl-2 font-semibold text-xl self-start text-gray-700">
				<h2 class="leading-relaxed">Ajout d'une bouteille</h2>
				<span class="text-sm">Cellier</span><span class="text-red-900 text-sm"> {{$cellier->nom_cellier}}</span>
				</div>
			</div>
		</div>
		<div class="divide-y divide-gray-200">
			<div class="relative py-3">
				<div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
					<div class="max-w">

		<!-- Zone recherche -->
		<form name="recherche" id="rechercheForm"  method="POST">
			@csrf

			<label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
			<div class="relative">
				<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
					<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
				</div>
				<input type="search" name="recherche" id="recherche" onkeyup="fetchData()"  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Recherche d'une bouteille par nom" required>
			</div>
		</form>


		<!-- Output catalogue -->
		<table class="pl-10 text-md text-gray-900 border border-gray-300 rounded-lg bg-gray-50" id="listeAutoComplete">

			<tbody class="transition-all" id="tbodyfordata">
				<!-- Data catalogue apparait ici -->
			</tbody>
		</table>
		<!-- Fin zone recherche -->


		<form id="formAjoutBouteille" action="{{ route('bouteille.creer')}}" method="POST">
			@csrf

			<!-- Caché essentiel -->
			<input id="id_cellier" name="id_cellier" type="hidden" value="{{$cellier->id}}">

				
							
						
							<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
							<div class="flex flex-col">

								<!-- Obligatoire -->
								<label class="leading-loose" for="nom"> * Nom  :</label>
								<input id="nom" name="nom" type="text" value="" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">

								<span class="leading-loose">* Type :</span>
								<ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
								<li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
									<div class="flex items-center pl-3">
										
										<input type="radio" name="type" id="rouge" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-900 dark:focus:ring-red-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
										<label for="rouge" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rouge</label>

										<input type="radio" name="type" id="blanc" value="2" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-900 dark:focus:ring-red-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
										<label for="blanc" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Blanc</label>

										<input type="radio" name="type" id="rose" value="2" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-900 dark:focus:ring-red-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
										<label for="rose" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rosé</label>
									</div>
								</li>
								</ul>


								<label class="leading-loose" for="quantite">* Quantité :</label>
		  						<input id="quantite" name="quantite" type="number" value=""  required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
								
								 <!-- Pas obligatoire -->
								<label class="leading-loose" for="pays">Pays :</label>
								<input id="pays" name="pays" type="text" value="" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
								
								<label class="leading-loose" for="format">Format :</label>
								<input id="format" name="format" type="text" value="" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
								
								<?php $years = range(1970, strftime("%Y", time())); ?>
								<label class="leading-loose" for="millesime">Millesime :</label>
								<select id="millesime" name="millesime" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
									<option value="">Année</option>
									<?php foreach($years as $year) : ?>
									  <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
									<?php endforeach; ?>
								  </select>
								
								<label class="leading-loose" for="description">Description</label>
								<textarea id="description" name="description" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"></textarea>
								
								<!-- Caché non obligatoire -->
								<input id="url_saq" name="url_saq" type="hidden" value="">
								<input id="code_saq" name="code_saq" type="hidden" value="">
								<input id="image" name="image" type="hidden" value="">
								<input id="prix_saq" name="prix_saq" type="hidden" value="">
								<input id="url_img" name="url_img" type="hidden" value="">
								
							</div>
							<!--
							<div class="flex flex-col">
								<label class="leading-loose">Description</label>
								<input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
							</div>
						-->
							</div>
							<div class="pt-4 flex items-center space-x-4">
								<a class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none" href='/cellier'>
								<svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Annuler
								</a>
								{{-- Section pour le bouton ajouter --}}
								<form action="{{ route('cellier.creer')}}" method="POST">
									@csrf
								<button class="bg-red-800 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Ajouter</button>
								</form>
							</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- SCRIPT-->
<script>


window.addEventListener("load",function(){
document.getElementById("rechercheForm").onkeypress = function(e) {
	console.log(e.charCode)
    var key = e.charCode || e.keyCode || 0;     
    if (key == 13) {
      //alert("No Enter!");
      e.preventDefault();
    }
  } 
})



    function fetchData()
	{
       
		//recherche Value
		let elRecheche = document.getElementById('recherche').value;

		//Liste recherche
		let liste = document.getElementById('listeAutoComplete');
		console.log(liste)

		//recherche Url
        const url = "{{route('bouteille.recherche')}}";
		//console.log(url);

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
				recherche: elRecheche
				})
			}

		fetch(url, options)
		.then((resp) => resp.json()) //Transforme  data en json
		.then(function(data){
			

			var tbodyref  = document.getElementById('tbodyfordata');
			tbodyref.innerHTML = '';
			let bouteilles = data;
			console.log(bouteilles);
			bouteilles.map(function(bouteille){
				let tr = createNode('tr'),
					nom = createNode('td');
					id = bouteille.id
					nom.innerText = bouteille.nom;
					nom.setAttribute('data-id', bouteille.id)
					append(tr,nom);
					append(tbodyref,tr);

					/*
      					* Gestionnaire d'évènement clique sur l'élément tr ( nom de la bouteille ) 
     					  qui permet de faire la sélection parmi les choix de la liste
    				*/
					tr.addEventListener("click", function(evt){
						//console.log(evt.target.dataset.id)
						if(evt.target.tagName == "TD"){
						
						injectBouteilleInfo(bouteille)

						//console.log(liste);
						liste.innerHTML = "";
						elRecheche = "";

						}
					});

				});			
		})
		.catch(function(error){
			console.log(error);
		})
	}

	//Creation de l'élément de recherche
	function createNode(element)
	{
		return document.createElement(element);
	}

	//Injection de l'élément de recherche
	function append(parent,el)
	{
		return parent.appendChild(el);
	}


	function injectBouteilleInfo(bte)
	{

		//console.log(bte)
		var form = document.getElementById('formAjoutBouteille')
		
		//Injecter les info de la bouteille dans le formulaire si vient de la recherche
		for (const property in bte) {
			  prop = `${property}`;
			  value = `${bte[property]}`;
			 // console.log(prop);
			 // console.log(value);

			 // radio bouton
			  if (prop == 'type'){
				console.log(typeof value)
				valueBte = value
				switch (valueBte) {
					case '1':
					console.log(document.getElementById("rouge"))
					document.getElementById("rouge").checked =true;
					break;
					case '2':
					document.getElementById("blanc").checked =true;
					break;
					case '3':
					document.getElementById("rose").checked =true;
					break;
				}
			  }else{
				form[prop].value = value;
			  } 
			  
			   //ajout d'une quantite par defaut
			   form.quantite.value = 1;
		}
		
	}

</script>
