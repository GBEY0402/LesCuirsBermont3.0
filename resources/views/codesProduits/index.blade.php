@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Codes de produit</h2>
		<a href="{{ action('CodesProduitsController@create') }}" class="btn btn-primary">Créer un code</a>
	</div>
	@if ($role == 'Administrateur')
		@if ($codes->isEmpty())
			<div class="panel-body">
				<p>Aucun code</p>
			</div>
		@else
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<!--  Les différents champs d'un code -->
						<th>code</th>
					</tr>
				</thead>
				<tbody>
				@foreach($codes as $code)
					<tr style="cursor:pointer">
						<td class="hidden-xs" onclick="window.location.href='{{ action('CodesProduitsController@show', $code->id) }}'"><?php echo $code->code ?></td>
						<td><a href="{{ action('CodesProduitsController@edit',$code->id) }}" class="btn btn-info">Modifier</a></td>
						<td>{!! Form::open(array('action' => array('CodesProduitsController@destroy',$code->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) !!}
							<button type="submit" href="{{ URL::route('code.destroy', $code->id) }}" class="btn btn-danger btn-mini">Effacer</button>
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