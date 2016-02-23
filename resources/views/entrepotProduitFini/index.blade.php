@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des produits fini pour {{ $entrepot->nom }}</h2>
		<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Créer un produit fini</a>
		@if ($entrepot->type == "Remorque")
			<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Vider la remorque</a>
		@endif
		<a href="{{ action('entrepotProduitFiniController@index', $entrepot->id) }}" class="btn btn-info">Modifier les quantitées</a>


	</div>

@if ($ProduitsFinis->isEmpty())
	<div class="panel-body">
		<p>Aucun produit fini se trouve dans cette entrepot!</p>
	</div>
@else 	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Code de Produit</th>
				<th>Nom</th>
				<th class="hidden-xs">Description</th>
				<th>Pointure</th>
				<th>Quantité</th>
			</tr>
		</thead>
		<tbody>
		@foreach($ProduitsFinis as $produit)
			<tr>
				<td class="hidden-xs"><?php echo $produit->code ?></td>
				<td class="hidden-xs"><?php echo $produit->nom ?></td>
				<td class="hidden-xs"><?php echo $produit->description ?></td>
				<td class="hidden-xs"><?php echo $produit->pivot->pointure ?></td>
				
				<td class="hidden-xs">
					<input type="Button" id='AddButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}' value="+" disabled />
					<input type="number" name="quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}" id="quantiteId{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}" disabled />
					<input type="Button" id='ReduceButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}' value="-"/>
				</td>

				@if ($role == 'Administrateur' && $entrepot->type == "Entrepot")
				<td><a href="{{ action('entrepotProduitFiniController@edit',$produit->entrepot_id) }}" class="btn btn-info">Transfert à une remorque</a></td>
				@endif
			</tr>

			<script>
			        var quantiteInitial{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}= parseInt(<?php echo $produit->pivot->quantite ?>);

			        var quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}} = parseInt(<?php echo $produit->pivot->quantite ?>);

					$('#quantiteId{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}').val(quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}});

					$('#AddButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}').on('click', function(){
						if (quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}} < quantiteInitial{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}){  
							quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}} = quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}} + 1;
							$('#quantiteId{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}').val(quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}});
							document.getElementById("ReduceButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}").disabled = false;
						}
						else { 
							document.getElementById("AddButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}").disabled = true;
						}
					});

					$('#ReduceButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}').on('click', function(){
						if (quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}} >= 1){ 
						quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}} = quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}} - 1;
						$('#quantiteId{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}').val(quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}});
						console.log(quantite{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}});
						document.getElementById("AddButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}").disabled = false;
						}
						else { 
							document.getElementById("ReduceButton{{$produit->pivot->produit_fini_id}}{{$produit->pivot->pointure}}").disabled = true;
						}
					});
			    </script>
		@endforeach

		</tbody>
	</table>
@endif
</div>
<!-- attacher le id à la quantite et faire une boucle dans le script for each produits as produit  -->
<!-- inventaire total -->
<!-- id des buttons-->
@stop