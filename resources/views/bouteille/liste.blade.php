<!-- Pour tester des routes -->
<a href="/SAQ">Importer le catalogue</a>
<a href="/cellier">Espace cellier</a>

<x-slot name="header">
  
@if ($msg)
<p>{{ $msg }}</p>
@endif


<h1>Vue : Liste Bouteilles du cellier : </h1>
@if (session('success'))
<p style="font-size:1.3em; color: green;">{{ session('success') }}</p>
@endif


<div class="p-6 text-gray-900">
    <div class="cellier grid">
        @foreach ($bouteilles as  $info)  
            <div class="bouteille" data-quantite="{{$info->quantite}}">
               
                <div class="img">
                    <img src="{{$info->image}}">
                </div>
                <h5>{{$info->nom}}</h5>
                <div class="description">
                    <p class="quantite">Quantité : {{$info->quantite}}</p>
                    <p class="pays">Pays : {{$info->pays}}</p>
                    <p class="type">Type : {{$info->type}}</p>
                    <p class="millesime">Millesime : {{$info->millesime}}</p>
                    <p><a href="{{$info->url_saq}}">Voir SAQ</a></p>
                </div>
                <div class="options" data-id="{{$info->vino__cellier_id}}" data-id-vin="{{$info->vino__bouteille_id}}">
                    <!-- <button class='btnModifier'>Modifier</button> -->
                        <button class='btnAjouter'>Ajouter</button>
                        <button class='btnAjouter'>Boire</button>
                </div>
            </div>
@endforeach
</div>
</div>
