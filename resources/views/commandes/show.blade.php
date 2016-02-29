@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title"><strong>Commande #</strong></h2>
		<h2 class="panel-title">{{ $commande->id }}</h2>
	</div>
	<div class="panel-body">
		<p><strong>Numero de client: </strong><br><?php echo $commande->clients_Id ?></p>
		<p><strong>Date de début   : </strong><br><?php echo $commande->dateDebut ?></p>
		<p><strong>Date de fin     : </strong><br><?php echo $commande->dateFin ?></p>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Code</th>
					<th class="hidden-xs">Code</th>
					<th class="hidden-xs">Pointure</th>
					<th class="hidden-xs">Quantité</th>
				</tr>
			</thead>
			<tbody>
			@foreach($commandeProduits->produitsFini as $produit)
				<tr>
					<td class="hidden-xs"><?php echo $commande->pivot->produit_fini_Id ?></td>
					<td class="hidden-xs"><?php echo $commande->pivot->pointure ?></td>
					<td class="hidden-xs"><?php echo $commande->pivot->quantite ?></td>
		  		</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="panel-body">
		<p><strong>Etat            : </strong><br><?php echo $commande->etat ?></p>
		<p><strong>Commentaire     : </strong><br><?php echo $commande->commentaire ?></p>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop