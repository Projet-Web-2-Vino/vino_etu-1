<!-- Navigation footer fixed-->
<div class="w-full fixed bottom-20">
	<section id="bottom-navigation" class=" block bg-white fixed inset-x-0 bottom-3 z-10">
		<div id="tabs" class="flex justify-between">

			<a href="/cellier" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <i class="fa-solid fa-house"></i>
				<span class="tab tab-kategori block text-xs">Cellier</span>
			</a>
			@if($titre == 'cellier')
			<a href="/cellier/nouveau" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <i class="fa-solid fa-plus"></i>
				<span class="tab tab-explore block text-xs">Ajouter</span>
			</a>
			@endif
			
			@if($titre == 'bouteille')
				@isset($id_cellier)
					<a href={{ route('bouteille.nouveau', ['id' => $id_cellier])}} class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
						<i class="fa-solid fa-wine-bottle"></i>
						<span class="tab tab-explore block text-xs">Ajouter</span>
					</a>
					@endisset
			@endif

			 
			@if($titre == 'formBouteille')
				@isset($id_cellier)
					<a href={{ route('bouteille.liste', ['id' => $id_cellier])}} class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
						<i class="fa-solid fa-wine-bottle"></i>
						<span class="tab tab-explore block text-xs">Liste</span>
					</a>
					@endisset
			@endif


			<a href="/logout" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <i class="fa-solid fa-right-from-bracket"></i>
				<span class="tab tab-whishlist block text-xs">Déconnexion</span>
			</a>
		</div>
	</section>
</div>
