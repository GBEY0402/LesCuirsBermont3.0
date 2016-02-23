@extends('shared.masterlayout')
@section('content')
{!! Form::open(['action'=> array('entrepotProduitFiniController@update', $entrepot->id), 'method' => 'PUT', 'class' => 'form']) !!}
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des produits fini pour {{ $entrepot->nom }}</h2>
		<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Créer un produit fini</a>
		@if ($entrepot->type == "Remorque")
			<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Vider la remorque</a>
		@endif


		{!! Form::button('Appliquer les modifications', ['type' => 'submit', 'class' => 'btn btn-info']) !!}



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
					<input type="number" name="quantite_{{$produit->pivot->produit_fini_id}}_{{$produit->pivot->pointure}}" id="quantiteId_{{$produit->pivot->produit_fini_id}}_{{$produit->pivot->pointure}}" min="0" max="<?php echo $produit->pivot->quantite ?>" value="<?php echo $produit->pivot->quantite ?>"/>
				</td>

				@if ($role == 'Administrateur' && $entrepot->type == "Entrepot")
				<td><a href="{{ action('entrepotProduitFiniController@edit',$produit->entrepot_id) }}" class="btn btn-info">Transfert à une remorque</a></td>
				@endif
			</tr>

		@endforeach

		<script>
			$("[type='number']").keypress(function (evt) {
						evt.preventDefault();
					});
		</script>

		</tbody>
	</table>

@endif

</div>

{!! Form::close() !!}

<!-- inventaire total -->

@stop