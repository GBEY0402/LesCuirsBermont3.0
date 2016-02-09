
@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Modification d'un usager</h2>
    </div>
    <div class="panel-body">
        {!! Form::open(['action'=> array('UserController@update', $user->id), 'method' => 'PUT', 'class' => 'form']) !!}
            {!! csrf_field() !!}
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            <div class="form-group">
                {!! Form::label('prenom', 'Prenom:') !!} 
                {!! Form::text('prenom', $user->prenom, ['class' => 'form-control']) !!}
                {{ $errors->first('prenom') }}
            </div>

            <div class="form-group">
                {!! Form::label('nom', 'Nom:') !!}
                {!! Form::text('nom', $user->nom, ['class' => 'form-control']) !!}
                {{ $errors->first('nom') }}
            </div>

            <div class="form-group">
                {!! Form::label('username', 'Username:') !!}
                {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                {{ $errors->first('username') }}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', null, ['class' => 'form-control']) !!}
                {{ $errors->first('password') }}
            </div>

            <div class="form-group">
                {!! Form::label('password2', 'Confirm password:') !!}
                {!! Form::password('password2', null, ['class' => 'form-control']) !!}
                {{ $errors->first('password2') }}
            </div> 
            
            
            <div class="form-group">
                {!! Form::select('role', array('Administrateur' => 'Administrateur', 'DirProd' => 'Directeur de production', 'employe' => 'Employé') , '1' ) !!}
            </div>

            <div class="form-group">
                {!! Form::button('Sauvegarder', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                <a href="{{ URL::previous() }}" class="btn btn-danger">Annuler</a>
            </div>
        {!! Form::close() !!}
        </div>
</div>
@stop