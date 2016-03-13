@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
@if ($role == 'Administrateur')
	<div class="panel-heading">
		<h2>Liste des usagers</h2>
		<a href="{{ action('UserController@create') }}" class="btn btn-primary">Créer un usager</a>
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
				</tr>
			</thead>
			<tbody>
			@foreach($usagers as $usager)
				<tr style="cursor:pointer"> 
					<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->prenom ?></td>
					<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->nom ?></td>
					<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->username ?></td>
					<td class="hidden-xs" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'"><?php echo $usager->role ?></td>
					<td><a href="{{ action('UserController@edit',$usager->id) }}" class="btn btn-info">Modifier</a></td>
					<td>
						@if ($usager->prenom != 'Robert' && $usager->nom != 'Durocher')
							{!! Form::open(array('action' => array('UserController@destroy',$usager->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
							<button type="submit" class="btn btn-danger btn-mini">Effacer</button>
						@endif
						{!! Form::close() !!}   
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@endif
@else
	<center>
	<img src="{{URL::asset('img/warning.png')}}" alt=""/>
	<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
	</center>
@endif
</div>
@stop