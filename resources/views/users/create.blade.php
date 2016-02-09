

@extends('shared.masterlayout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Création d'un usager</h2>
    </div>
    <div class="panel-body">
        {!! Form::open(['action'=> 'UserController@store', 'class' => 'form']) !!}   
            {!! csrf_field() !!}
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            <div class="form-group">
                {!! Form::label('prenom', 'Prenom:') !!} 
                {!! Form::text('prenom',null, ['class' => 'form-control']) !!}
                {{ $errors->first('prenom') }}
            </div>

            <div class="form-group">
                {!! Form::label('nom', 'Nom:') !!}
                {!! Form::text('nom',null, ['class' => 'form-control']) !!}
                {{ $errors->first('nom') }}
            </div>

            <div class="form-group">
                {!! Form::label('username', 'Username:') !!}
                {!! Form::text('username',null, ['class' => 'form-control']) !!}
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
                {!! Form::select('role', array('Administrateur' => 'Administrateur', 'Directeur de production' => 'DirProd', 'Employé' => 'employe') , '1' ) !!}
            </div>

            <div class="form-group">
                {!! Form::button("Créer l'usager", ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        </div>
</div>
@stop