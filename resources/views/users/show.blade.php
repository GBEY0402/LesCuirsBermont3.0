@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">{{ $usager->prenom }} {{ $usager->nom }}</h2>
	</div>
	<div class="panel-body">
		<p>Prenom:	 			<?php echo $usager->prenom ?></p>
		<p>Nom: 				<?php echo $usager->nom ?></p>
		<p>Usager:				<?php echo $usager->username ?></p>
		<p>Role	:	  			<?php echo $usager->role ?></p>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop