@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Types de matériaux</h2>
		@if ($role == 'Administrateur')
			<a href="{{ action('TypesController@create') }}" class="btn btn-primary">Créer un type</a>
		@endif
	</div>
	@if ($role == 'Administrateur')
		@if ($types->isEmpty())
			<div class="panel-body">
				<p>Aucun type</p>
			</div>
		@else
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Type</th>
						<th class="hidden-xs">Commentaire</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($types as $type)
					<tr style="cursor:pointer">
						<td class="hidden-xs" onclick="window.location.href='{{ action('TypesController@show', $type->id) }}'"><?php echo $type->nom ?></td>
						<td class="hidden-xs" onclick="window.location.href='{{ action('TypesController@show', $type->id) }}'"><?php echo $type->commentaire ?></td>
						
						<td><a href="{{ action('TypesController@edit',$type->id) }}" class="btn btn-info">Modifier</a></td>
						<td>{!! Form::open(array('action' => array('TypesController@destroy',$type->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
							<button type="submit" href="{{ URL::route('materiaux.destroy', $type->id) }}" class="btn btn-danger btn-mini">Effacer</button>
							{!! Form::close() !!}   
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		@endif
	@else
		<center>
		<img src="{{URL::asset('img/warning.png')}}" alt=""/>
		<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
		</center>
	@endif
</div>
@stop