@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Modification d'un code</h2>
	</div>
	<div class="panel-body">
	@if ($role == 'Administrateur')
		{!! Form::open(['action'=> array('CodesProduitsController@update', $code->id), 'method' => 'PUT', 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('code', 'Nom:') !!} 
			{!! Form::text('code',$code->code, ['class' => 'form-control']) !!}
			{{ $errors->first('code') }}
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
	@endif
	</div>
</div>
@stop