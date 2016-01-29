@extends('shared.masterlayout')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Création d'un matériel</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> 'MatieresPremieresController@index', 'class' => 'form']) !!}
		<!--    -->
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
		<div class="form-group">
			{!! Form::label('type', 'Type:') !!}
			{!! Form::select('type', $types, ['class' => 'form-control']) !!}
			{{ $errors->first('type') }}
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
			{!! Form::label('prix', 'Prix:') !!}
			{!! Form::text('prix',null, ['class' => 'form-control']) !!}
			{{ $errors->first('prix') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantiteTotale', 'Quantité totale:') !!}
			{!! Form::text('quantiteTotale',null, ['class' => 'form-control']) !!}
			{{ $errors->first('quantiteTotale') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantiteMinimum', 'Quantité Minimum:') !!}
			{!! Form::text('quantiteMinimum',null, ['class' => 'form-control']) !!}
			{{ $errors->first('quantiteMinimum') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantiteLimite', 'Quantité Limite:') !!}
			{!! Form::text('quantiteLimite',null, ['class' => 'form-control']) !!}
			{{ $errors->first('quantiteLimite') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantiteReserve', 'Quantité en réserve:') !!}
			{!! Form::text('quantiteReserve',null, ['class' => 'form-control']) !!}
			{{ $errors->first('quantiteReserve') }}
		</div>
		<div class="form-group">
			{!! Form::label('actif', 'Disponible:') !!}
			{!! Form::select('actif', array('1' => 'Oui', '0' => 'Non') , '1' ) !!}
			{{ $errors->first('actif') }}
		</div>
		<div class="form-group">
			{!! Form::button('Créer', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ action('MatieresPremieresController@index') }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop