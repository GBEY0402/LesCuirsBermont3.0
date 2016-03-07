@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">Modification du code</h2>
	</div>
	<div class="panel-body">
	@if ($role == 'Administrateur')
		<p>Code: <?php echo $code->code ?></p>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	@else
		<center>
		<img src="{{URL::asset('img/warning.png')}}" alt=""/>
		<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
		</center>
	@endif
	</div>
</div>
@stop