@extends('shared.masterlayout')
@section('content')
<script>
	$("[type='number']").keypress(function (evt) 
	{
		evt.preventDefault();
	});
</script>
{!! Form::open(['action'=> array('entrepotProduitFiniController@MultiUpdate', $entrepot->id), 'method' => 'PUT', 'class' => 'form']) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des produits finis pour {{ $entrepot->nom }}</h2>
		@if ($role == 'Administrateur' or $role == 'DirProd')
			@if ($entrepot->type == "Entrepot")
				<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Ajouter un produit fini</a>
			@endif
			@if ($entrepot->type == "Remorque")
				<a href="{{ action('entrepotProduitFiniController@create', $entrepot->id) }}" class="btn btn-info">Vider la remorque</a>
			@endif

			@if ($entrepot->type == "Entrepot")
			{!! Form::button('Appliquer les modifications', ['type' => 'submit', 'class' => 'btn btn-info']) !!}
			@endif
		@endif
	</div>
	@if ($ProduitsFinis->isEmpty())
		<div class="panel-body">
			<p>Aucun produit fini se trouve dans cette entrepot!</p>
		</div>
	@else
		<div class="panel-body"> 	
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Code de Produit</th>
						<th>Nom</th>
						<th class="hidden-xs">Description</th>
						<th>Pointure</th>
						<th>Quantité</th>
					</tr>
				</thead>
				<tbody>
				@foreach($ProduitsFinis as $produit)
					<tr>
						<td class="hidden-xs"><?php echo $produit->code ?></td>
						<td class="hidden-xs"><?php echo $produit->nom ?></td>
						<td class="hidden-xs"><?php echo $produit->description ?></td>
						<td class="hidden-xs" name="pointure"><?php echo $produit->pivot->pointure ?></td>
						@if ($role == 'Administrateur' or $role == 'DirProd')
							<td class="hidden-xs">
								<input type="number" name="quantite_{{$produit->pivot->produit_fini_id}}-{{$produit->pivot->pointure}}_" id="quantiteId_{{$produit->pivot->produit_fini_id}}-{{$produit->pivot->pointure}}_" min="0" value="<?php echo $produit->pivot->quantite ?>"/>
							</td>
						@else
							<td class="hidden-xs">
								<input type="number" name="quantite_{{$produit->pivot->produit_fini_id}}-{{$produit->pivot->pointure}}_" id="quantiteId_{{$produit->pivot->produit_fini_id}}-{{$produit->pivot->pointure}}_" min="0" value="<?php echo $produit->pivot->quantite ?>" readonly/>
							</td>
						@endif
						@if ($role == 'Administrateur' && $entrepot->type == "Entrepot")
						<td>
							<a href="{{ action('entrepotProduitFiniController@transfert_entrepot', [ $entrepot->id, $produit->id , $produit->pivot->pointure ]) }}" class="btn btn-info">Transfert à une remorque</a>
						</td>
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	@endif
</div>
{!! Form::close() !!}
@stop