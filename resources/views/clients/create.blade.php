@extends('shared.masterlayout')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Création d'un client/fournisseur</h2>
	</div>
	<div class="panel-body">
	@if ($role == 'Administrateur')
		{!! Form::open(['action'=> 'ClientsController@store', 'class' => 'form']) !!}
		@foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
		<div class="form-group">
			{!! Form::label('prenom', 'Prénom:') !!}
			{!! Form::text('prenom',null, ['class' => 'form-control']) !!}
			{{ $errors->first('prenom') }}
		</div>
		<div class="form-group">
			{!! Form::label('nom', 'Nom:') !!}
			{!! Form::text('nom',null, ['class' => 'form-control']) !!}
			{{ $errors->first('nom') }}
		</div>
		<div class="form-group">
			{!! Form::label('adresse', 'Adresse:') !!}
			{!! Form::text('adresse',null, ['class' => 'form-control']) !!}
			{{ $errors->first('adresse') }}
		</div>
		<div class="form-group">
			{!! Form::label('ville', 'Ville:') !!}
			{!! Form::text('ville',null, ['class' => 'form-control']) !!}
			{{ $errors->first('ville') }}
		</div>
		<div class="form-group">
			{!! Form::label('noTel', 'Numéro de téléphone:') !!}
			{!! Form::text('noTel',null, ['class' => 'form-control']) !!}
			{{ $errors->first('noTel') }}
		</div>
		<div class="form-group">
			{!! Form::label('courriel', 'Courriel:') !!}
			{!! Form::text('courriel',null, ['class' => 'form-control']) !!}
			{{ $errors->first('courriel') }}
		</div>
		<div class="form-group">
			{!! Form::label('relation', 'Relation:') !!} 
			{!! Form::select('relation', array('Client' => 'Client', 'Fournisseur' => 'Fournisseur') , '1' ) !!}
			{{ $errors->first('relation') }}
		</div>
		<div class="form-group">
			{!! Form::button('Créer', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ action('ClientsController@index') }}" class="btn btn-danger">Annuler</a>
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