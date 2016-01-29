@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">{{ $type->nom }}</h2>
	</div>
	<div class="panel-body">
		<p>Commentaire: <?php echo $type->commentaire ?></p>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop