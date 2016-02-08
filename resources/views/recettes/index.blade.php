@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Inventaire Entrepôt</h2>
		<a href="{{ action('CodesProduitsController@create') }}" class="btn btn-primary">Créer une recette</a>
	</div>
@if ($recettes->isEmpty())
	<div class="panel-body">
		<p>Aucune recette</p>
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Code</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<!--    -->
@foreach($recettes as $recette)
		<tr style="cursor:pointer">
			<td class="hidden-xs"  onclick="window.location.href='{{ action('RecettesController@show', $recette->id) }}'"><?php echo $produit->code ?></td>
			<td><a href="{{ action('RecettesController@edit',$recette->id) }}" class="btn btn-info">Modifier</a></td>
			<td>{!! Form::open(array('action' => array('ProduitsFinisController@destroy',$produit->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
				{!! Form::close() !!}   
			</td>
		</tr>
@endforeach
		</tbody>
	</table>
@endif
</div>
@stop