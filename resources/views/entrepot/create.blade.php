@extends('shared.masterlayout')
@section('content-admin')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Création d'un entrepot</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> 'entrepotController@store', 'class' => 'form']) !!}
		<!--    -->
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
		<div class="form-group">
			{!! Form::label('nom', 'Nom:') !!}
			{!! Form::text('nom',null, ['class' => 'form-control']) !!}
			{{ $errors->first('nom') }}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Type :') !!}
			{!! Form::select('type', array('Entrepot' => 'Entrepot', 'Remorque' => 'Remorque') , '1' ) !!}
			{{ $errors->first('type') }}
		</div>
		<div class="form-group">
			{!! Form::button('Créer', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ action('MatieresPremieresController@index') }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop
@section('content-prod')
@section('content-emp')
<center><h1>Access DENIED !</h1></center>
@STOP
@STOP
