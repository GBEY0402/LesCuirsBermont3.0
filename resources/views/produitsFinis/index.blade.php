@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des produits</h2>
		<a href="{{ action('ProduitsFinisController@create') }}" class="btn btn-info">Ajouter un produit</a>
	</div>
@if ($produits->isEmpty())
	<div class="panel-body">
		<p>Aucun produit</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<!--  Les différents champs d'un code -->
				<th>Code</th>
				<th class="hidden-xs">Nom</th>
				<th class="hidden-xs">Description</th>
				<th class="hidden-xs">Quantité</th>
				<th class="hidden-xs">Prix</th>
				<th class="hidden-xs">Disponible</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<!--    -->
@foreach($produits as $produit)
			<tr>
				<td><a href="{{ action('ProduitsFinisController@show', $produit->id) }}">{{ $produit->code }}</a></td>
				<td class="hidden-xs"><?php echo $produit->nom ?></td>
				<td class="hidden-xs"><?php echo $produit->description ?></td>
				<td class="hidden-xs"><?php echo $produit->quantite ?></td>
				<td class="hidden-xs"><?php echo $produit->prix ?></td>
				@if ($produit->actif == 1)
					<td class="hidden-xs">Actif</td>
				@else
					<td class="hidden-xs">Inactif</td>
				@endif
				<td><a href="{{ action('ProduitsFinisController@edit',$produit->id) }}" class="btn btn-info">Modifier</a></td>
				<td>{!! Form::open(array('action' => array('ProduitsFinisController@destroy',$produit->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
					<button type="submit" href="{{ URL::route('inventaire.destroy', $produit->id) }}" class="btn btn-danger btn-mini">Effacer</button>
					{!! Form::close() !!}   
				</td>
			</tr>
@endforeach
		</tbody>
	</table>
@endif
</div>
@stop