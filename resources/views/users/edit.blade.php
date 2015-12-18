@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Modification d'un usager</h2>
    </div>
    <div class="panel-body">
        {!! Form::open(['action'=> array('UserController@update', $user->id), 'method' => 'PUT', 'class' => 'form']) !!}
            {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::label('prenom', 'Prenom:') !!} 
                {!! Form::text('prenom', $user->prenom, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nom', 'Nom:') !!}
                {!! Form::text('nom', $user->nom, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('username', 'Username:') !!}
                {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Confirm password:') !!}
                {!! Form::password('password', null, ['class' => 'form-control']) !!}
            </div> 
            
            
            <div class="form-group">
                {!! Form::select('role', array('Administrateur' => 'Administrateur', 'Directeur de production' => 'DirProd', 'Employé' => 'employe') , '1') !!}
            </div>

            <div class="form-group">
                {!! Form::button('Sauvegarder', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                <a href="{{ URL::previous() }}" class="btn btn-danger">Annuler</a>
            </div>
        {!! Form::close() !!}
        </div>
</div>
@stop