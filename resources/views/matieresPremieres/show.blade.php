@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">{{ $materiel->type }}</h2>
	</div>
	<div class="panel-body">
		<p>Nom: <?php echo $materiel->nom ?></p>
		<p>Description: <?php echo $materiel->description ?></p>
		<p>Quantité totale: <?php echo $materiel->quantiteTotale ?></p>
		@if ($materiel->actif == 1)
			<p>Actif: Oui</p>
		@else
			<p>Actif: Non</p>
		@endif
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop