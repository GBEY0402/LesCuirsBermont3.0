@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liste des commandes</h2>
		<a href="{{ action('CommandesController@create') }}" class="btn btn-primary">Créer une commande</a>
	</div>
</div>
@stop