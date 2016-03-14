@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	@if ($role == 'Administrateur')
		<div class="panel-heading">
			<h2 class="panel-title">{{ $entrepot->nom }}</h2>
		</div>
		<div class="panel-body">
			<p>Nom: <?php echo $entrepot->nom ?></p>
			<p>Type: <?php echo $entrepot->type ?></p>
			<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
		</div>
	@else
		<center>
		<img src="{{URL::asset('img/warning.png')}}" alt=""/>
		<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
		</center>
	@endif
</div>
@stop