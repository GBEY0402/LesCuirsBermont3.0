@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Types de matériaux</h2>
		<a href="{{ action('TypesController@create') }}" class="btn btn-primary">Créer un type</a>
		<a href="{{ action('ProduitsFinisController@index')}}" class="btn btn-info">Entrepôt</a>
		<a href="{{ action('ProduitsFinisController@index')}}" class="btn btn-info">Remorque #1</a>
		<a href="{{ action('ProduitsFinisController@index')}}" class="btn btn-info">Remorque #2</a>
		<a href="{{ action('ProduitsFinisController@index')}}" class="btn btn-info">Remorque #3</a>
		<a href="{{ action('MatieresPremieresController@index')}}" class="btn btn-info">Matières premières</a>

	</div>
@if ($types->isEmpty())
	<div class="panel-body">
		<p>Aucun type</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<!--  Les différents champs d'un code -->
				<th>Type</th>
				<th class="hidden-xs">Commentaire</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<!--    -->
@foreach($types as $type)
			<tr style="cursor:pointer" onclick="window.location.href='{{ action('TypesController@show', $type->id) }}'">
				<td class="hidden-xs"><?php echo $type->nom ?></td>
				<td class="hidden-xs"><?php echo $type->commentaire ?></td>
				
				<td><a href="{{ action('TypesController@edit',$type->id) }}" class="btn btn-info">Modifier</a></td>
				<td>{!! Form::open(array('action' => array('TypesController@destroy',$type->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
					<button type="submit" href="{{ URL::route('inventaire.destroy', $type->id) }}" class="btn btn-danger btn-mini">Effacer</button>
					{!! Form::close() !!}   
				</td>
			</tr>
@endforeach
		</tbody>
	</table>
@endif
</div>
@stop