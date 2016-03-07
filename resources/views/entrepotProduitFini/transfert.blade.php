@extends('shared.masterlayout')
@section('content')

<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			

			{!! Form::open(['action'=> array('entrepotProduitFiniController@transfert_entrepot', $entrepot->id, $produit->id , $produit->pivot->pointure), 'class' => 'form', 'method' => 'PUT']) !!}
			
			<div class="form-group">
				{!! Form::label('entrepotBase', 'Entrepot provenance :') !!} 
				{!! Form::text('entrepotBase', $entrepot->id, ['class' => 'form-control', 'readonly']) !!}
				{{ $errors->first('entrepot') }}				
			</div>

			<div class="form-group">
				{!! Form::label('idProduit', 'Produit fini') !!} 
				{!! Form::text('idProduit', $produit->id, ['class' => 'form-control', 'readonly']) !!}
				{{ $errors->first('idProduit') }}				
			</div>


			<div class="form-group">
				{!! Form::label('quantiteTransfert', 'Quantité à transférer:') !!} 
				{!! Form::text('quantiteTransfert',null, ['class' => 'form-control']) !!}
				{{ $errors->first('quantite') }}				
			</div>
			<div class="form-group">
				{!! Form::label('entrepot', 'Vers la remorque :') !!} 
				{!! Form::select('entrepot', $listeEntrepot, ['class' => 'form-control']) !!}
				{{ $errors->first('entrepot') }}
			</div>
				{!! Form::button('Transférer', ['type' => 'submit', 'class' => 'btn btn-info']) !!}
				<a href="{{ action('entrepotProduitFiniController@transfert_entrepot', [ $entrepot->id, $produit->id , $produit->pivot->pointure ]) }}" class="btn btn-info">Transfert à cette remorque</a>
			{!! Form::close() !!}
			</div>
</div>

@stop