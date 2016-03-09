@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Grille de l'inventaire de {!! $entrepot->nom !!}</h2>
		</div>
	</div>
	<div class="panel-body">
		<div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th> </th>
						<th>1</th>
						<th>2</th>
						<th>3</th>
						<th>4</th>
						<th>5</th>
						<th>6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th>11</th>
						<th>12</th>
						<th>13</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listeItems as $liste)
					<tr>
						<td><strong>{!! $liste[0] !!}</strong></td>
						<td>{!! $liste[1] !!}</td>
						<td>{!! $liste[2] !!}</td>
						<td>{!! $liste[3] !!}</td>
						<td>{!! $liste[4] !!}</td>
						<td>{!! $liste[5] !!}</td>
						<td>{!! $liste[6] !!}</td>
						<td>{!! $liste[7] !!}</td>
						<td>{!! $liste[8] !!}</td>
						<td>{!! $liste[9] !!}</td>
						<td>{!! $liste[10] !!}</td>
						<td>{!! $liste[11] !!}</td>
						<td>{!! $liste[12] !!}</td>
						<td>{!! $liste[13] !!}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div>
			<a href="{{ URL::previous() }}" class="btn btn-primary">Retour</a>
		</div>
	</div>
</div>
@stop

