
<!-- Pour tester des routes -->
<a href="/SAQ">Importer le catalogue</a>
<a href="/cellier">Espace cellier</a>
<a href="/bouteille/nouveau">Ajouter une bouteille</a>




<x-slot name="header">

@if ($msg)
<p>{{ $msg }}</p>
@endif


<h1>Vue : Liste Bouteilles du catalogue</h1>
@if (session('success'))
<p style="font-size:1.3em; color: green;">{{ session('success') }}</p>

@endif
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="cellier grid">
                    <?php
                    foreach ($data as $cle => $bouteille) {
                    ?>
                        <div class="bouteille" data-quantite="<?php echo $bouteille['quantite'] ?>">
                            <a class="btnModifier" href='{{ route('bouteille.edit', ['id' => $bouteille->id ]) }}'>Modifier</a>
                            <div class="img">
                                <img src="https:<?php echo $bouteille['image'] ?>">
                            </div>
                            <h5><?php echo $bouteille['nom'] ?></h5>
                            <div class="description">
                                <p class="quantite">Quantité : <?php echo $bouteille['quantite'] ?></p>
                                <p class="pays">Pays : <?php echo $bouteille['pays'] ?></p>
                                <p class="type">Type : <?php echo $bouteille['type'] ?></p>
                                <p class="millesime">Millesime : <?php echo $bouteille['millesime'] ?></p>
                                <p><a href="<?php echo $bouteille['url_saq'] ?>">Voir SAQ</a></p>
                            </div>
                            <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-vin="<?php echo $bouteille['id_bouteille'] ?>">
                                <!-- <button class='btnModifier'>Modifier</button> -->



                                    <button class='btnAjouter'>Ajouter</button>




                                    <button class='btnAjouter'>Ajouter</button>



                            </div>

                <?php


                }

                ?>
            </div>

            </div>
        </div>
    </div>

</div>
</div>




<!-- component -->
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">
<div class="flex items-center justify-center min-h-screen bg-gray-900">
	<div class="col-span-12">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr>
						<th class="p-3">Brand</th>
						<th class="p-3 text-left">Category</th>
						<th class="p-3 text-left">Price</th>
						<th class="p-3 text-left">Status</th>
						<th class="p-3 text-left">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr class="bg-gray-800">
						<td class="p-3">
							<div class="flex align-items-center">
								<img class="rounded-full h-12 w-12  object-cover" src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="unsplash image">
								<div class="ml-3">
									<div class="">Appple</div>
									<div class="text-gray-500">mail@rgmail.com</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							Technology
						</td>
						<td class="p-3 font-bold">
							200.00$
						</td>
						<td class="p-3">
							<span class="bg-green-400 text-gray-50 rounded-md px-2">available</span>
						</td>
						<td class="p-3 ">
							<a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
								<i class="material-icons-outlined text-base">visibility</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
								<i class="material-icons-outlined text-base">edit</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
								<i class="material-icons-round text-base">delete_outline</i>
							</a>
						</td>
					</tr>
					<tr class="bg-gray-800">
						<td class="p-3">
							<div class="flex align-items-center">
								<img class="rounded-full h-12 w-12   object-cover" src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="unsplash image">
								<div class="ml-3">
									<div class="">Realme</div>
									<div class="text-gray-500">mail@rgmail.com</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							Technology
						</td>
						<td class="p-3 font-bold">
							200.00$
						</td>
						<td class="p-3">
							<span class="bg-red-400 text-gray-50 rounded-md px-2">no stock</span>
						</td>
						<td class="p-3">
							<a href="#" class="text-gray-400 hover:text-gray-100  mr-2">
								<i class="material-icons-outlined text-base">visibility</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
								<i class="material-icons-outlined text-base">edit</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
								<i class="material-icons-round text-base">delete_outline</i>
							</a>
						</td>
					</tr>
					<tr class="bg-gray-800">
						<td class="p-3">
							<div class="flex align-items-center">
								<img class="rounded-full h-12 w-12   object-cover" src="https://images.unsplash.com/photo-1600856209923-34372e319a5d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2135&q=80" alt="unsplash image">
								<div class="ml-3">
									<div class="">Samsung</div>
									<div class="text-gray-500">mail@rgmail.com</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							Technology
						</td>
						<td class="p-3 font-bold">
							200.00$
						</td>
						<td class="p-3">
							<span class="bg-yellow-400 text-gray-50  rounded-md px-2">start sale</span>
						</td>
						<td class="p-3">
							<a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
								<i class="material-icons-outlined text-base">visibility</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
								<i class="material-icons-outlined text-base">edit</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
								<i class="material-icons-round text-base">delete_outline</i>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	.table {
		border-spacing: 0 15px;
	}

	i {
		font-size: 1rem !important;
	}

	.table tr {
		border-radius: 20px;
	}

	tr td:nth-child(n+5),
	tr th:nth-child(n+5) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}
</style>
