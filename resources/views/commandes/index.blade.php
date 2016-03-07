@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des commandes</h2>
		@if($role == 'Administrateur')
			<a href="{{ action('CommandesController@create') }}" class="btn btn-primary">Créer une commande</a>
		@endif
	</div>
@if ($commandes->isEmpty())
	<div class="panel-body">
		<p>Aucune commande n'a été créée</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Numéro de commande</th>
				<th>Code client</th>
				<th>Date de début</th>
				<th>Date de fin</th>
				<th>État</th>
				<th>Commentaire</th>
			</tr>
		</thead>
		<tbody>
		@foreach($commandes as $commande)
			<tr style="cursor:pointer">
				<td class="hidden-xs" onclick="window.location.href='{{ action('CommandesController@show', $commande->id) }}'"><?php echo $commande->id ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('CommandesController@show', $commande->id) }}'"><?php echo $commande->clients_Id ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('CommandesController@show', $commande->id) }}'"><?php echo $commande->dateDebut ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('CommandesController@show', $commande->id) }}'"><?php echo $commande->dateFin ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('CommandesController@show', $commande->id) }}'"><?php echo $commande->etat ?></td>
				<td class="hidden-xs" onclick="window.location.href='{{ action('CommandesController@show', $commande->id) }}'"><?php echo $commande->commentaire ?></td>
				@if ($role == 'Administrateur' or $role == 'DirProd')
					<td><a href="{{ action('CommandesController@edit',$commande->id) }}" class="btn btn-info">Modifier</a></td>
				@endif
				<td>{!! Form::open(array('action' => array('CommandesController@destroy',$commande->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
				@if ($role == 'Administrateur')
					<button type="submit" href="{{ URL::route('commande.destroy', $commande->id) }}" class="btn btn-danger btn-mini">Effacer</button>
				@endif
					{!! Form::close() !!}   
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endif

</div>
@stop