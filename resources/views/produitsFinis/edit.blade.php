@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Modification d'un produit</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> array('ProduitsFinisController@update', $produit->id), 'method' => 'PUT', 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('code', 'Code:') !!} 
			{!! Form::text('code',$produit->code, ['class' => 'form-control']) !!}
			{{ $errors->first('code') }}
		</div>
		<div class="form-group">
			{!! Form::label('nom', 'Nom:') !!} 
			{!! Form::text('nom',$produit->nom, ['class' => 'form-control']) !!}
			{{ $errors->first('nom') }}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!} 
			{!! Form::text('description',$produit->description, ['class' => 'form-control']) !!}
			{{ $errors->first('description') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantite', 'Quantité:') !!} 
			{!! Form::text('quantite',$produit->quantite, ['class' => 'form-control']) !!}
			{{ $errors->first('quantite') }}
		</div>
		<div class="form-group">
			{!! Form::label('prix', 'Prix:') !!} 
			{!! Form::text('prix',$produit->prix, ['class' => 'form-control']) !!}
			{{ $errors->first('prix') }}
		</div>
		<div class="form-group">
			{!! Form::label('actif', 'Disponible:') !!} 
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