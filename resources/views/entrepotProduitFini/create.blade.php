@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Ajout d'un produit fini à l'entrepot</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> ['entrepotProduitFiniController@index', $entrepot->id], 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('codeProduit', 'Code Produit :') !!} 
			{!! Form::select('codeProduit', $codesProduits, ['class' => 'form-control']) !!}
			{{ $errors->first('CodeProduits') }}
		</div>
		<div class="form-group">
			{!! Form::label('pointure', 'Pointure :') !!} 
			{!! Form::select('pointure', array('4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14') , '1' ) !!}
			{{ $errors->first('pointure') }}				
		</div>
		<div class="form-group">
			{!! Form::label('quantite', 'Quantité :') !!} 
			{!! Form::text('quantite',null, ['class' => 'form-control']) !!}
			{{ $errors->first('quantite') }}				
		</div>
		<div class="form-group">
			{!! Form::button('Créer', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ URL::previous() }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop