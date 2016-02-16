@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Modification d'une commande</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> array('CommandesController@update', $commande->id), 'method' => 'PUT', 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('clientId', 'Nom:') !!} 
			{!! Form::text('clientId',$commande->clientId, ['class' => 'form-control']) !!}
			{{ $errors->first('clientId') }}
		</div>
		<div class="form-group">
			{!! Form::label('dateDebut', 'Date de début:') !!} 
			{!! Form::text('dateDebut',$commande->dateDebut, ['class' => 'form-control']) !!}
			{{ $errors->first('dateDebut') }}
		</div>
		<div class="form-group">
			{!! Form::label('dateFin', 'Date de fin:') !!} 
			{!! Form::text('dateFin',$commande->cldateFin, ['class' => 'form-control']) !!}
			{{ $errors->first('dateFin') }}
		</div>
		<div class="form-group">
			{!! Form::label('etat', 'Etat:') !!} 
			{!! Form::text('etat',$commande->etat, ['class' => 'form-control']) !!}
			{{ $errors->first('etat') }}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!} 
			{!! Form::text('description',$commande->description, ['class' => 'form-control']) !!}
			{{ $errors->first('description') }}
		</div>
		<div class="form-group">
			{!! Form::button('Sauvegarder', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ URL::previous() }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop