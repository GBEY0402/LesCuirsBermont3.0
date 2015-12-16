@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">{{ $client->prenom }} {{ $client->nom }}</h2>
	</div>
	<div class="panel-body">
		<p>Adresse: 			<?php echo $client->adresse ?></p>
		<p>Ville: 				<?php echo $client->ville ?></p>
		<p>Numéro de téléphone: <?php echo $client->noTel ?></p>
		<p>Courriel: 			<?php echo $client->courriel ?></p>
		<p>Relation:			<?php echo $client->relation ?></p>
		@if ($client->actif == 1)
			<p>Actif: Oui</p>
		@else
			<p>Actif: Non</p>
		@endif
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop