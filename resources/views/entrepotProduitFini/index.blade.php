@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des produits fini pour {{ $entrepot->nom }}</h2>
		<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Créer un produit fini</a>	
	</div>

@if ($ProduitsFinis->isEmpty())
	<div class="panel-body">
		<p>Aucun produit fini se trouve dans cette entrepot!</p>
	</div>
@else 	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nom</th>
				<th class="hidden-xs">Description</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
@endif
</div>
@stop