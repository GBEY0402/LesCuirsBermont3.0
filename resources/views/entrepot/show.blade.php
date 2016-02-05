@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">{{ $entrepot->nom }}</h2>
	</div>
	<div class="panel-body">
		<p>Nom: <?php echo $entrepot->nom ?></p>
		<p>Type: <?php echo $entrepot->description ?></p>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop