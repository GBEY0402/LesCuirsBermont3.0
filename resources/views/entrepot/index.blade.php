@extends('shared.masterlayout')
@section('content-admin')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Liste des entrepots</h2>
			<a href="{{ action('entrepotController@create') }}" class="btn btn-primary">Ajouter un entrepot</a>
		</div>

	@if ($entrepot->isEmpty())
		<div class="panel-body">
			<p>Aucun entrepot à afficher</p>
		</div>
	@else
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<!--  Les différents champs d'un code -->
					<th>Nom</th>
					<th class="hidden-xs">Type</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
	<!--    -->
	@foreach($entrepot as $entrepote)
				<tr style="cursor:pointer">
					<td class="hidden-xs" onclick="window.location.href='{{ action('entrepotController@show', $entrepote->id) }}'"><?php echo $entrepote->nom ?></td>
					<td class="hidden-xs" onclick="window.location.href='{{ action('entrepotController@show', $entrepote->id) }}'"><?php echo $entrepote->type ?></td>
					<td><a href="{{ action('entrepotController@edit',$entrepote->id) }}" class="btn btn-info">Modifier</a></td>
					
					<td>
					@if ($entrepote->type == "Remorque")
					{!! Form::open(array('action' => array('entrepotController@destroy',$entrepote->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
						<button type="submit" href="{{ URL::route('entrepot.destroy', $entrepote->id) }}" class="btn btn-danger btn-mini">Effacer</button>
						{!! Form::close() !!}   
					@endif
					</td>
				</tr>
	@endforeach
			</tbody>
		</table>
	@endif
	</div>
@stop
@section('content-prod')
	<center>
	<img src="{{URL::asset('img/warning.png')}}" alt=""/>
	<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
	</center>
@stop
@section('content-emp')
	<center>
	<img src="{{URL::asset('img/warning.png')}}" alt=""/>
	<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
	</center>
@stop

