@extends('shared.masterlayout')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Création d'un produit</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> 'ProduitsFinisController@store', 'class' => 'form']) !!}
		<!--    -->
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
		<div class="form-group">
			{!! Form::label('code', 'Code:') !!}
			{!! Form::text('code',null, ['class' => 'form-control']) !!}
			{{ $errors->first('code') }}
		</div>
		<div class="form-group">
			{!! Form::label('nom', 'Nom:') !!}
			{!! Form::text('nom',null, ['class' => 'form-control']) !!}
			{{ $errors->first('nom') }}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::text('description',null, ['class' => 'form-control']) !!}
			{{ $errors->first('description') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantite', 'Quantite:') !!}
			{!! Form::text('quantite',null, ['class' => 'form-control']) !!}
			{{ $errors->first('quantite') }}
		</div>
		<div class="form-group">
			{!! Form::label('prix', 'Prix:') !!}
			{!! Form::text('prix',null, ['class' => 'form-control']) !!}
			{{ $errors->first('prix') }}
		</div>
		<div class="form-group">
			{!! Form::label('actif', 'Disponible:') !!}
			{!! Form::select('actif', array('1' => 'Oui', '0' => 'Non') , '1' ) !!}
			{{ $errors->first('actif') }}
		</div>
		<div class="form-group">
			{!! Form::button('Créer', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ action('ProduitsFinisController@index') }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop