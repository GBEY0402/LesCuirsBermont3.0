@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title"><strong>Commande #</strong></h2>
		<h2 class="panel-title">{{ $commande->id }}</h2>
	</div>
	<div class="panel-body">
		<p>Numero de client: <?php echo $commande->clientsId ?></p>
		<p>Date de début   : <?php echo $commande->dateDebut ?></p>
		<p>Date de fin     : <?php echo $commande->dateFin ?></p>
		<p>Etat            : <?php echo $commande->etat ?></p>
		<p>Commentaire     : <?php echo $commande->commentaire ?></p>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop