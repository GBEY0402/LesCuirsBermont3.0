@extends('shared.masterlayout')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Création d'un code de produit</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> 'CodesProduitsController@index', 'class' => 'form']) !!}
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
			{!! Form::button('Créer', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ action('CodesProduitsController@index') }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop