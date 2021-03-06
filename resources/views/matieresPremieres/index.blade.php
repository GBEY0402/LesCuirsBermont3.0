@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Inventaire Matières premières</h2>
		@if ($role == 'Administrateur')
			<a href="{{ action('MatieresPremieresController@create') }}" class="btn btn-primary">Ajouter un matériel</a>
			<a href="{{ action('TypesController@index') }}" class="btn btn-primary">Gérer les types de matériaux</a>
		@endif
	</div>
	@if ($role == 'Administrateur')
		@if ($materiaux->isEmpty())
			<div class="panel-body">
				<p>Aucun matériel à afficher</p>
			</div>
		@else
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Type</th>
						<th class="hidden-xs">Nom</th>
						<th class="hidden-xs">Description</th>
						<th class="hidden-xs">Prix</th>
						<th class="hidden-xs">Quantité totale</th>
						<th class="hidden-xs">Quantité minimum</th>
						<th class="hidden-xs">Quantité limite</th>
						<th class="hidden-xs">État</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($materiaux as $materiel)
					<tr style="cursor:pointer">
						<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'"><?php echo $materiel->type ?></td>
						<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'"><?php echo $materiel->nom ?></td>
						<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'"><?php echo $materiel->description ?></td>
						<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'"><?php echo $materiel->prix ?></td>
						<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'"><?php echo $materiel->quantiteTotale ?></td>
						<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'"><?php echo $materiel->quantiteMinimum ?></td>
						<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'"><?php echo $materiel->quantiteLimite ?></td>
						@if ($materiel->actif == 1)
							<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'">Actif</td>
						@else
							<td class="hidden-xs" onclick="window.location.href='{{ action('MatieresPremieresController@show', $materiel->id) }}'">Inactif</td>
						@endif
						@if ($role == 'Administrateur' or $role == 'DirProd')
							<td><a href="{{ action('MatieresPremieresController@edit',$materiel->id) }}" class="btn btn-info">Modifier</a></td>
						@endif
						@if ($role == 'Administrateur')
							<td>{!! Form::open(array('action' => array('MatieresPremieresController@destroy',$materiel->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
								<button type="submit" href="{{ URL::route('materiaux.destroy', $materiel->id) }}" class="btn btn-danger btn-mini">Effacer</button>
							</td>
						@endif
						{!! Form::close() !!}   
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