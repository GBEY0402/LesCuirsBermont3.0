@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">Numéro: {{ $client->id }}</h2>
	</div>
	<div class="panel-body">
		<p><strong>Nom et prénom:</strong> 			<?php echo $client->prenom ?> <?php echo $client->nom ?></p>
		<p><strong>Adresse:</strong> 				<?php echo $client->adresse ?></p>
		<p><strong>Ville:</strong> 					<?php echo $client->ville ?></p>
		<p><strong>Numéro de téléphone:</strong> 	<?php echo $client->noTel ?></p>
		<p><strong>Courriel:</strong> 				<?php echo $client->courriel ?></p>
		<p><strong>Relation:</strong>				<?php echo $client->relation ?></p>
		@if ($client->actif == 1)
			<p><strong>Actif:</strong> Oui</p>
		@else
			<p><strong>Actif:</strong> Non</p>
		@endif
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop