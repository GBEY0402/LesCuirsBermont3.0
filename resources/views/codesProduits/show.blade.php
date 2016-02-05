@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">Modification du code</h2>
	</div>
	<div class="panel-body">
		<p>Code: <?php echo $code->code ?></p>
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop