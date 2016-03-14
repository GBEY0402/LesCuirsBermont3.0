@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Modification d'une entrepot</h2>
	</div>
	<div class="panel-body">
	@if ($role == 'Administrateur')
		{!! Form::open(['action'=> array('entrepotController@update', $entrepot->id), 'method' => 'PUT', 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('nom', 'Nom:') !!}
			{!! Form::text('nom', $entrepot->nom, ['class' => 'form-control']) !!}
			{{ $errors->first('nom') }}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Types:') !!} 
			{!! Form::text('type',$entrepot->type, ['class' => 'form-control']) !!}
			{{ $errors->first('type') }}
		</div>
		<div class="form-group">
			{!! Form::button('Sauvegarder', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ URL::previous() }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	@else
		<center>
		<img src="{{URL::asset('img/warning.png')}}" alt=""/>
		<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
		</center>
	</div>
	@endif
</div>
@stop