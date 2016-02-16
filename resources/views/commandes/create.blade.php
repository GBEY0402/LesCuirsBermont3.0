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
		<h2>Création d'une commande</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action' => 'CommandesController@store', 'class' => 'form']) !!}
		<!--    -->
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
		<div class="form-group">
			<a href="{{ action('ClientsController@create') }}" class="btn btn-primary">Creation d'un client</a>
			<br>
			<br>
			{!! Form::label('clientsId', 'Numero de client/fournisseur:') !!}
			{!! Form::text('clientsId', null, ['class' => 'form-control']) !!}
			{{ $errors->first('clientsId') }}
		</div>
		<div class="form-group">
			{!! Form::label('dateDebut', 'Date de début:') !!}
			<br>
			{!! Form::text('dateDebut', null, array('id' => 'datepickerDebut')) !!}
			{{ $errors->first('dateDebut') }}
		</div>
		<div class="form-group">
			{!! Form::label('dateFin', 'Date de fin :') !!}
			<br>
			{!! Form::text('dateFin', null, array('id' => 'datepickerFin')) !!}
			{{ $errors->first('dateFin') }}
		</div>
		<div class="form-group">
		<!-- item -->
			{!! Form::label('item', 'Item:') !!}
			{!! Form::text('item',null, ['class' => 'form-control']) !!}
		</div>

		<!-- item button -->
		<div class="form-group">
			{!! Form::button('Ajouter cette item', ['type' => 'submit', 'class' => 'btn btn-default']) !!}
		</div>

		@if (count($items) > 0)
			<h2>Item dans la commande</h2>

				<table class="table table-striped task-table">
					<thead>
						<th>Code de produit</th>
						<th>Nom spécifique</th>
						<th>Pointure</th>
						<th>Quantité</th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($items as $item)
							<tr>
								<td class="table-text"><div>{{ $item->code }}</div></td>

								<!-- Task Delete Button -->
								<td>
									<button type="submit" href="{{ URL::route('produit.destroy', $item->id) }}" class="btn btn-danger btn-mini">Effacer</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
		@endif
		<div class="form-group">
			{!! Form::label('commentaire', 'Commentaire:') !!}
			{!! Form::text('commentaire',null, ['class' => 'form-control']) !!}
			{{ $errors->first('commentaire') }}
		</div>
		<div class="form-group">
			{!! Form::label('etat', 'État:') !!}
			{!! Form::select('etat', array('Non débutée' => 'Non débutée', 'En cours' => 'En cours', 'Suspendue' => 'Suspendue', 'Terminée' => 'Terminer') , '1' ) !!}
			{{ $errors->first('etat') }}
		</div>
		<div class="form-group">
			{!! Form::button('Créer', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
			<a href="{{ action('CommandesController@index') }}" class="btn btn-danger">Annuler</a>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop