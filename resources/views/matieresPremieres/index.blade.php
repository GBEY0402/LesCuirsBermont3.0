@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Inventaire Matières premières</h2>
		<a href="{{ action('MatieresPremieresController@create') }}" class="btn btn-primary">Ajouter un matériel</a>
		<a href="{{ action('MatieresPremieresController@index')}}" class="btn btn-info">Entrepôt</a>
		<a href="{{ action('MatieresPremieresController@index')}}" class="btn btn-info">Remorque #1</a>
		<a href="{{ action('MatieresPremieresController@index')}}" class="btn btn-info">Remorque #2</a>
		<a href="{{ action('MatieresPremieresController@index')}}" class="btn btn-info">Remorque #3</a>
	</div>

@if ($materiaux->isEmpty())
	<div class="panel-body">
		<p>Aucun matériel à afficher</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<!--  Les différents champs d'un code -->
				<th>Type</th>
				<th class="hidden-xs">Nom</th>
				<th class="hidden-xs">Description</th>
				<th class="hidden-xs">Prix</th>
				<th class="hidden-xs">Quantité totale</th>
				<th class="hidden-xs">Quantité minimum</th>
				<th class="hidden-xs">Quantité limite</th>
				<th class="hidden-xs">Quantité en réserve</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<!--    -->
@foreach($materiaux as $materiel)
			<tr style="cursor:pointer" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'">
				<td class="hidden-xs"><?php echo $materiel->type ?></td>
				<td class="hidden-xs"><?php echo $materiel->nom ?></td>
				<td class="hidden-xs"><?php echo $materiel->description ?></td>
				<td class="hidden-xs"><?php echo $materiel->prix ?></td>
				<td class="hidden-xs"><?php echo $materiel->quantiteTotale ?></td>
				<td class="hidden-xs"><?php echo $materiel->quantiteMinimum ?></td>
				<td class="hidden-xs"><?php echo $materiel->quantiteLimite ?></td>
				<td class="hidden-xs"><?php echo $materiel->quantiteReserve ?></td>
				@if ($materiel->actif == 1)
					<td class="hidden-xs">Actif</td>
				@else
					<td class="hidden-xs">Inactif</td>
				@endif
				<td><a href="{{ action('MatieresPremieresController@edit',$materiel->id) }}" class="btn btn-info">Modifier</a></td>
				<td>{!! Form::open(array('action' => array('MatieresPremieresController@destroy',$materiel->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
					<button type="submit" href="{{ URL::route('materiel.destroy', $materiel->id) }}" class="btn btn-danger btn-mini">Effacer</button>
					{!! Form::close() !!}   
				</td>
			</tr>
@endforeach
		</tbody>
	</table>
@endif
</div>
@stop