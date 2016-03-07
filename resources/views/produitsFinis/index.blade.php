@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des produits</h2>
		@if ($role == 'Administrateur')
			<a href="{{ action('ProduitsFinisController@create') }}" class="btn btn-primary">Créer un produit</a>
		@endif
	</div>
	@if ($produits->isEmpty())
		<div class="panel-body">
			<p>Aucun produit</p>
		</div>
	@else
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Code</th>
					<th class="hidden-xs">Nom</th>
					<th class="hidden-xs">Description</th>
					<th class="hidden-xs">Prix</th>
					@if ($role == 'Administrateur')
						<th class="hidden-xs">Disponible</th>
					@endif
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($produits as $produit)
				<tr style="cursor:pointer">
					<td class="hidden-xs"  onclick="window.location.href='{{ action('ProduitsFinisController@show', $produit->id) }}'"><?php echo $produit->code ?></td>
					<td class="hidden-xs"  onclick="window.location.href='{{ action('ProduitsFinisController@show', $produit->id) }}'"><?php echo $produit->nom ?></td>
					<td class="hidden-xs"  onclick="window.location.href='{{ action('ProduitsFinisController@show', $produit->id) }}'"><?php echo $produit->description ?></td>
					<td class="hidden-xs"  onclick="window.location.href='{{ action('ProduitsFinisController@show', $produit->id) }}'"><?php echo $produit->prix ?></td>
					@if ($role == 'Administrateur')
						@if ($produit->actif == 1)
							<td class="hidden-xs"  onclick="window.location.href='{{ action('ProduitsFinisController@show', $produit->id) }}'">Actif</td>
						@else
							<td class="hidden-xs"  onclick="window.location.href='{{ action('ProduitsFinisController@show', $produit->id) }}'">Inactif</td>
						@endif
					@endif
					@if ($role == 'Administrateur')
					<td><a href="{{ action('ProduitsFinisController@edit',$produit->id) }}" class="btn btn-info">Modifier</a></td>
					<td>{!! Form::open(array('action' => array('ProduitsFinisController@destroy',$produit->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
						<button type="submit" href="{{ URL::route('produit.destroy', $produit->id) }}" class="btn btn-danger btn-mini">Effacer</button>
						{!! Form::close() !!}   
					</td>
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>
	@endif
</div>
@stop