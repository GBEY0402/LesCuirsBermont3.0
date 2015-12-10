
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des usagers</h2>
		<a href="{{ action('UsersController@create') }}" class="btn btn-info">Créer un usager</a>						
	</div>
@if ($Users->isEmpty())
	<div class="panel-body">
		<p>Aucun usager</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nom, Prenom</th>
				<th class="hidden-xs">Username</th>
				<th class="hidden-sm hidden-xs">Role</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
@foreach($Users as $user)
			<tr>
				<td><a href="{{ action('UserController@show', $user->id) }}">{{ $user->nom }}, {{ $user->prenom }}</a></td>
				<td class="hidden-xs">{{ $user->username }}</td>
				<td class="hidden-xs">{{ $user->role }}</td>
				<td><a href="{{ action('UserController@edit',$user->id) }}" class="btn btn-info">Modifier</a></td>
				<td>{!! Form::open(array('action' => array('UserController@destroy',$user->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
					<button type="submit" href="{{ URL::route('user.destroy', $user->id) }}" class="btn btn-danger btn-mini">Effacer</button>
					{!! Form::close() !!}
				</td>
			</tr>
@endforeach
		</tbody>
	</table>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
@endif
</div>
