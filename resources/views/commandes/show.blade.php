@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title"><strong>Commande #</strong></h2>
		<h2 class="panel-title">{{ $commande->id }}</h2>
	</div>
	<div class="panel-body">
		<p><strong>Numero de client: </strong><br><?php echo $commande->clients_Id ?></p>
	</div>
	<hr>
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Date de début</th>
					<th>Date de fin</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th><?php echo $commande->dateDebut ?></th>
					<th><?php echo $commande->dateFin ?></th>
				</tr>
			</tbody>
		</table>
	</div>
	<hr>
	<div class="panel-body">
		<table class="table table-striped table-hover">
		<h3 class="panel-title"><strong>Liste des items de la commande</strong></h3>
			<thead>
				<tr>
					<th>Code</th>
					<th>Pointure</th>
					<th>Quantité</th>
				</tr>
			</thead>
			<tbody>
			@foreach($produitsFinis as $produit)
				<tr>
					<td><?php echo $produit->code ?></td>
					<td><?php echo $produit->pivot->pointure ?></td>
					<td><?php echo $produit->pivot->quantite ?></td>
		  		</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<hr>
	<div class="panel-body">
		<p><strong>Etat            : </strong><br><?php echo $commande->etat ?></p>
		<hr>
		<p><strong>Commentaire     : </strong><br><?php echo $commande->commentaire ?></p>
		<hr>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop