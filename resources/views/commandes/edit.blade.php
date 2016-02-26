@extends('shared.masterlayout')
@section('script')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<script type="text/javascript">
  		$(function() {
    		$( "#datepickerDebut" ).datepicker({
      		changeMonth: true,
      		changeYear: true
   			});
  		});
  	</script>
  	<script type="text/javascript">
  		$(function() {
    		$( "#datepickerFin" ).datepicker({
      		changeMonth: true,
      		changeYear: true
   			});
  		});
  	</script>
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Modification d'une commande</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action'=> array('CommandesController@update', $commande->id), 'method' => 'PUT', 'class' => 'form']) !!}
		<div class="form-group">
			{!! Form::label('clientsId', 'Numero de client/fournisseur:') !!}
			<br>
			{!! Form::select('clientsId', $clients, ['class' => 'form-control']) !!}
			{{ $errors->first('clientsId') }}
		</div>
		<div class="form-group">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td>{!! Form::label('dateDebut', 'Date de début:') !!}</td>
						<td>{!! Form::label('dateFin', 'Date de fin :') !!}</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{!! Form::text('dateDebut', $commande->dateDebut, array('id' => 'datepickerDebut')) !!}
							{{ $errors->first('dateDebut') }}</td>
						<td>{!! Form::text('dateFin', $commande->dateFin, array('id' => 'datepickerFin')) !!}
							{{ $errors->first('dateFin') }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="form-group">
			{!! Form::label('commentaire', 'Commentaire:') !!} 
			<br>
			{!! Form::text('commentaire',$commande->commentaire, ['class' => 'form-control']) !!}
			{{ $errors->first('commentaire') }}
		</div>
		<div class="form-group">
			{!! Form::label('etat', 'État:') !!}
			<br>
			{!! Form::select('etat', array('Non débutée' => 'Non débutée', 'En cours' => 'En cours', 'Suspendue' => 'Suspendue', 'Terminée' => 'Terminée') , $commande->etat ) !!}
			{{ $errors->first('etat') }}
		</div>
		<hr>
		<h2>Items de la commande</h2>
		<hr>
			<div class="form-group">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<td>{!! Form::label('item', 'Item:') !!}</td>
							<td>{!! Form::label('pointure', 'Pointure:') !!}</td>
							<td>{!! Form::label('quantite', 'Quantité:') !!}</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{!! Form::select('item', $codes, ['class' => 'form-control']) !!}</td>
							<td>{!! Form::select('pointure', array('4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10',
												'11' => '11','12' => '12','13' => '13','1' => '1','2' => '2','3' => '3',) , '1' ) !!}</td>
							<td>{!! Form::text('quantite', null, ['class' => 'form-control']) !!}</td>
						</tr>
					</tbody>
			</div>
			<div class="form-group">
				{!! Form::button('Ajouter cette item', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
				<a href="{{ URL::previous() }}" class="btn btn-danger">Annuler</a>
			</div>
		{!! Form::close() !!}
		@if ($items->isEmpty())
			<div>
				<p>Aucun item trouvé pour cette commande</p>
			</div>
		@else
			<div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<td>{!! Form::label('codeProduit', 'Codes de produit:') !!}</td>
							<td>{!! Form::label('pointure', 'Pointure:') !!}</td>
							<td>{!! Form::label('quantite', 'Quantité:') !!}</td>
						</tr>
					</thead>
					<tbody>
					@foreach($items as $item)
						<tr style="cursor:pointer">
							<td><?php echo $item->produit_fini_Id ?></td>
							<td><?php echo $item->pointure ?></td>
							<td><?php echo $item->quantite ?></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
</div>
@stop