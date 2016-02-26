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
  	<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
@stop

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Création d'un billet de commande</h2>
	</div>
	<div class="panel-body">
		{!! Form::open(['action' => 'CommandesController@store', 'class' => 'form']) !!}
		@foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
		<div class="form-group">
			<a href="{{ action('ClientsController@create') }}" class="btn btn-primary">Creation d'un client</a>
			<br>
			<br>
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
						<td>{!! Form::text('dateDebut', null, array('id' => 'datepickerDebut')) !!}
							{{ $errors->first('dateDebut') }}</td>
						<td>{!! Form::text('dateFin', null, array('id' => 'datepickerFin')) !!}
							{{ $errors->first('dateFin') }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="form-group">
			<table class="table table-striped table-hover">
				<thead>
				    <tr>
				        <td>{!! Form::label('itemCode', 'Code:') !!}</td>
				        <td>{!! Form::label('itemPointure', 'Pointure:') !!}</td>
				        <td>{!! Form::label('itemQuantite', 'Quantité:') !!}</td>
				    </tr>
				</thead>
				<tbody>
				    <tr>
				        <td>{!! Form::select('itemCode', $codes, null,
				        						array('id' => 'code')) !!}</td>
				    	<td>{!! Form::select('pointure', array('4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10',
												'11' => '11','12' => '12','13' => '13','1' => '1','2' => '2','3' => '3',),
												null, array('id' => 'pointure') ) !!}</td>
				        <td><input type="number" id="quantite" min="0" name="quantite"></td>
				        <td><input type="button" id="add" value="Add" onclick="Javascript:addRow()"></td>
				    </tr>
			    	<tr>
			        	<td>&nbsp;</td>
			        	<td>&nbsp;</td>
			        	<td>&nbsp;</td>
			    	</tr>
			    </tbody>
			</table>
		</div>
		<div class="form-group" id="mydata">
			<table class="table table-striped table-hover" id="myTableData">
			    <tr>
			        <td> </td>
			        <td><b>Code</b></td>
			        <td><b>Pointure</b></td>
			        <td><b>Quantité</b></td>
			    </tr>
			</table>
			&nbsp;<br/>
		</div>
		<div class="form-group">
			{!! Form::label('commentaire', 'Commentaire:') !!}
			{!! Form::text('commentaire',null, ['class' => 'form-control']) !!}
			{{ $errors->first('commentaire') }}
		</div>
		<div class="form-group">
			{!! Form::label('etat', 'État:') !!}
			<br>
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