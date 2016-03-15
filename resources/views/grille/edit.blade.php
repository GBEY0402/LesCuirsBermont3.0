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
			<table class="table table-striped table-hover" border="1">
				<thead>
					<tr>
						<th> </th>
						<th><center>1</center></th>
						<th><center>2</center></th>
						<th><center>3</center></th>
						<th><center>4</center></th>
						<th><center>5</center></th>
						<th><center>6</center></th>
						<th><center>7</center></th>
						<th><center>8</center></th>
						<th><center>9</center></th>
						<th><center>10</center></th>
						<th><center>11</center></th>
						<th><center>12</center></th>
						<th><center>13</center></th>
					</tr>
				</thead>
				<tbody>
					@foreach($listeItems as $liste)
					<tr>
						<td><strong>{!! $liste[0] !!}</strong></td>
						<td><center>{!! $liste[1] !!}</center></td>
						<td><center>{!! $liste[2] !!}</center></td>
						<td><center>{!! $liste[3] !!}</center></td>
						<td><center>{!! $liste[4] !!}</center></td>
						<td><center>{!! $liste[5] !!}</center></td>
						<td><center>{!! $liste[6] !!}</center></td>
						<td><center>{!! $liste[7] !!}</center></td>
						<td><center>{!! $liste[8] !!}</center></td>
						<td><center>{!! $liste[9] !!}</center></td>
						<td><center>{!! $liste[10] !!}</center></td>
						<td><center>{!! $liste[11] !!}</center></td>
						<td><center>{!! $liste[12] !!}</center></td>
						<td><center>{!! $liste[13] !!}</center></td>
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

