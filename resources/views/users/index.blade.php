@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des usagers</h2>
		@if ($role == 'Administrateur')
			<a href="{{ action('UserController@create') }}" class="btn btn-primary">Créer un usager</a>
		@endif
	</div>
@if ($usagers->isEmpty())
	<div class="panel-body">
		<p>Aucun usager</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="hidden-xs">Prenom</th>
				<th class="hidden-xs">Nom</th>
				<th class="hidden-xs">Usager</th>
				<th class="hidden-xs">Role</th>
				<th>1</th>
				<th>2</th>
			</tr>
		</thead>
		<tbody>
<!--    -->
@foreach($usagers as $usager)
			<tr style="cursor:pointer"> 
				<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->prenom ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->nom ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->username ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->role ?></td>
				<td><a href="{{ action('UserController@edit',$usager->id) }}" class="btn btn-info">Modifier</a></td>
				<td>
					{!! Form::open(array('action' => array('UserController@destroy',$usager->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
					<button type="submit" class="btn btn-danger btn-mini">Effacer</button>
					{!! Form::close() !!}   
				</td>
			</tr>
@endforeach
		</tbody>
	</table>
@endif
</div>

@stop