@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des produits fini pour {{ $entrepot->nom }}</h2>
		<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Créer un produit fini</a>
		@if ($entrepot->type == "Remorque")
			<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Vider la remorque</a>
		@endif

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
				<tr style="cursor:pointer">
					<td class="hidden-xs"><?php echo$produit->code ?></td>
					<td class="hidden-xs"><?php echo $produit->nom ?></td>
					<td class="hidden-xs"><?php echo $produit->description ?></td>
					<td class="hidden-xs"><?php echo $produit->pivot->pointure ?></td>
					<td class="hidden-xs"><?php echo $produit->pivot->quantite ?>{{ Html::image('/shared/image/negative.png', 'alt', array( 'width' => 70, 'height' => 70 )) }}</td>
					@if ($role == 'Administrateur')
					<td><a href="{{ action('entrepotProduitFiniController@edit',$produit->entrepot_id) }}" class="btn btn-info">Transfert à une remorque</a></td>
					@endif
				</tr>
			@endforeach

		</tbody>
	</table>
@endif
</div>
@stop