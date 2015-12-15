@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<!--    -->
		<h2 class="panel-title">{{ $produit->code }}</h2>
	</div>
	<div class="panel-body">
		<p>Nom: <?php echo $produit->nom ?></p>
		<p>Description: <?php echo $produit->description ?></p>
		<p>Quantité: <?php echo $produit->quantite ?></p>
		<p>Prix: <?php echo $produit->prix ?></p>
		@if ($produit->actif == 1)
			<p>Actif: Oui</p>
		@else
			<p>Actif: Non</p>
		@endif
		<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
	</div>
</div>
@stop