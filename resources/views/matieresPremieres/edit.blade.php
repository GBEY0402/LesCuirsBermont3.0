@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Modification d'une matière première</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> array('MatieresPremieresController@update', $materiel->id), 'method' => 'PUT', 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('type', 'Type:') !!} 
			{!! Form::text('type',$materiel->type, ['class' => 'form-control']) !!}
			{{ $errors->first('type') }}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Type:') !!} 
			{!! Form::text('type',$materiel->type, ['class' => 'form-control']) !!}
			{{ $errors->first('type') }}
		</div>
		<div class="form-group">
			{!! Form::label('nom', 'Nom:') !!} 
			{!! Form::text('nom',$materiel->nom, ['class' => 'form-control']) !!}
			{{ $errors->first('nom') }}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!} 
			{!! Form::text('description',$materiel->description, ['class' => 'form-control']) !!}
			{{ $errors->first('description') }}
		</div>
		<div class="form-group">
			{!! Form::label('prix', 'Prix:') !!} 
			{!! Form::text('prix',$materiel->prix, ['class' => 'form-control']) !!}
			{{ $errors->first('prix') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantiteTotale', 'Quantité totale:') !!} 
			{!! Form::text('quantiteTotale',$materiel->quantiteTotale, ['class' => 'form-control']) !!}
			{{ $errors->first('quantiteTotale') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantiteMinimum', 'Quantité Minimum:') !!} 
			{!! Form::text('quantiteMinimum',$materiel->quantiteMinimum, ['class' => 'form-control']) !!}
			{{ $errors->first('quantiteMinimum') }}
		</div>
		<div class="form-group">
			{!! Form::label('quantiteLimite', 'Quantité Limite:') !!} 
			{!! Form::text('quantiteLimite',$materiel->quantiteLimite, ['class' => 'form-control']) !!}
			{{ $errors->first('quantiteLimite') }}
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