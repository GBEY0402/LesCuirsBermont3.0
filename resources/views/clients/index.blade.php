@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des clients/fournisseurs</h2>
	</div>
@if ($clients->isEmpty())
	<div class="panel-body">
		<p>Aucun client</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<!--  Les différents champs d'un code -->
				<th class="hidden-xs">Prenom</th>
				<th class="hidden-xs">Nom</th>
				<th class="hidden-xs">Adresse</th>
				<th class="hidden-xs">Ville</th>
				<th class="hidden-xs">Numéro de téléphone</th>
				<th class="hidden-xs">Courriel</th>
				<th class="hidden-xs">Relation</th>
				<th class="hidden-xs">Actif</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<!--    -->
@foreach($clients as $client)
			<tr style="cursor:pointer" onclick="window.location.href='{{ action('ClientsController@show', $client->id) }}'">
				<td class="hidden-xs"><?php echo $client->prenom ?></td>
				<td class="hidden-xs"><?php echo $client->nom ?></td>
				<td class="hidden-xs"><?php echo $client->adresse ?></td>
				<td class="hidden-xs"><?php echo $client->ville ?></td>
				<td class="hidden-xs"><?php echo $client->noTel ?></td>
				<td class="hidden-xs"><?php echo $client->courriel ?></td>
				<td class="hidden-xs"><?php echo $client->relation ?></td>
				@if ($client->actif == 1)
					<td class="hidden-xs">Actif</td>
				@else
					<td class="hidden-xs">Inactif</td>
				@endif
				<td><a href="{{ action('ClientsController@edit',$client->id) }}" class="btn btn-info">Modifier</a></td>
			</tr>
@endforeach
		</tbody>
	</table>
@endif
</div>
@stop