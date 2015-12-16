@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Modification d'un client/fournisseur</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> array('ClientsController@update', $client->id), 'method' => 'PUT', 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('prenom', 'Prénom:') !!} 
			{!! Form::text('prenom',$client->prenom, ['class' => 'form-control']) !!}
			{{ $errors->first('prenom') }}
		</div>
		<div class="form-group">
			{!! Form::label('nom', 'Nom:') !!} 
			{!! Form::text('nom',$client->nom, ['class' => 'form-control']) !!}
			{{ $errors->first('nom') }}
		</div>
		<div class="form-group">
			{!! Form::label('adresse', 'Adresse:') !!} 
			{!! Form::text('adresse',$client->adresse, ['class' => 'form-control']) !!}
			{{ $errors->first('adresse') }}
		</div>
		<div class="form-group">
			{!! Form::label('ville', 'Ville:') !!} 
			{!! Form::text('ville',$client->ville, ['class' => 'form-control']) !!}
			{{ $errors->first('ville') }}
		</div>
		<div class="form-group">
			{!! Form::label('noTel', 'Numéro de téléphone:') !!} 
			{!! Form::text('noTel',$client->noTel, ['class' => 'form-control']) !!}
			{{ $errors->first('noTel') }}
		</div>
		<div class="form-group">
			{!! Form::label('courriel', 'Courriel:') !!} 
			{!! Form::text('courriel',$client->courriel, ['class' => 'form-control']) !!}
			{{ $errors->first('courriel') }}
		</div>
		<div class="form-group">
			{!! Form::label('relation', 'Relation:') !!} 
			{!! Form::select('relation', array('Client' => 'Client', 'Fournisseur' => 'Fournisseur') , '1' ) !!}
			{{ $errors->first('relation') }}
		</div>
		<div class="form-group">
			{!! Form::label('actif', 'Actif:') !!} 
			{!! Form::select('actif', array('1' => 'Oui', '0' => 'Non') , '1' ) !!}
			{{ $errors->first('actif') }}
		</div>

		<div class="form-group">
			{!! Form::button('Sauvegarder', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ URL::previous() }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop