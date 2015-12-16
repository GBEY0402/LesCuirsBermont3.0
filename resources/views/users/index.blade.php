@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des usagers</h2>
	</div>
@if ($usagers->isEmpty())
	<div class="panel-body">
		<p>Aucun usager</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<!--  Les différents champs d'un code -->
				<th class="hidden-xs">Prenom</th>
				<th class="hidden-xs">Nom</th>
				<th class="hidden-xs">Usager</th>
				<th class="hidden-xs">Role</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<!--    -->
@foreach($usagers as $usager)
			<tr>
				<tr style="cursor:pointer" onclick="window.location.href='{{ action('UserController@show', $usager->id) }}'">
				<td class="hidden-xs"><?php echo $usager->prenom ?></td>
				<td class="hidden-xs"><?php echo $usager->nom ?></td>
				<td class="hidden-xs"><?php echo $usager->username ?></td>
				<td class="hidden-xs"><?php echo $usager->role ?></td>
				<td><a href="{{ action('UserController@edit',$usager->id) }}" class="btn btn-info">Modifier</a></td>
			</tr>
@endforeach
		</tbody>
	</table>
@endif
</div>
@stop