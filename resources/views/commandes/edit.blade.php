@extends('shared.masterlayout')
@if ($role == 'Administrateur' or $role == 'DirProd')
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
	  	<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
	@stop
@endif

	@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Modification d'un billet de commande</h2>
		</div>
		<div class="panel-body">
		@if ($role == 'Administrateur' or $role == 'DirProd')
			{!! Form::open(['action'=> array('CommandesController@update', $commande->id), 'method' => 'PUT', 'class' => 'form']) !!}
			@foreach ($errors->all() as $error)
	            <p class="alert alert-danger">{{ $error }}</p>
	        @endforeach
			<div class="form-group">
				{!! Form::label('clientsId', 'Numero de client/fournisseur:') !!}
				<br>
				<input type="text" name='clientsId' style="background:#DEDEDE" value={!! $commande->clients_Id !!} readonly>
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
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<h3 class="panel-title"><strong>Liste des items de la commande</strong></h3>
					<thead>
						<tr>
							<th>Code</th>
							<th>Pointure</th>
							<th>Quantité</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $produit)
						<tr>
							<td><input type='text' style="background:#DEDEDE"name={!! $produit[0] !!} value={!! $produit[1] !!} readonly></td>
							<td><input type='text' style="background:#DEDEDE"name={!! $produit[2] !!} value={!! $produit[3] !!} readonly></td>
							<td><input type='number' min='0' name={!! $produit[4] !!} value={!! $produit[5] !!}></td>
				  		</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="form-group">
				{!! Form::label('commentaire', 'Commentaire:') !!}
				{!! Form::text('commentaire', $commande->commentaire, ['class' => 'form-control']) !!}
				{{ $errors->first('commentaire') }}
			</div>
			<div class="form-group">
				{!! Form::label('etat', 'État:') !!}
				<br>
				{!! Form::select('etat', array('Non débutée' => 'Non débutée', 'En cours' => 'En cours', 'Suspendue' => 'Suspendue', 'Terminée' => 'Terminer') , $commande->etat ) !!}
				{{ $errors->first('etat') }}
			</div>
			<div class="form-group">
				{!! Form::button('Sauvegarder', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
				<a href="{{ action('CommandesController@index') }}" class="btn btn-danger">Annuler</a>
				<input type="hidden" name="maxLineCount" value={!! $nombreProduits !!}>
			</div>
			{!! Form::close() !!}
		@else
			<center>
			<img src="{{URL::asset('img/warning.png')}}" alt=""/>
			<h3>Votre rôle ne vous permet pas d'utiliser cette page</h3>
			</center>
		@endif
		</div>
	</div>
@stop