<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Création d'un usager</h2>
    </div>
    <div class="panel-body">
        {!! Form::open(['action'=> 'UserController@index', 'class' => 'form']) !!}   
            {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::label('prennom', 'Prenom:') !!} 
                {!! Form::text('prenom',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nom', 'Nom:') !!}
                {!! Form::text('nom',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('username', 'Username:') !!}
                {!! Form::text('username',null, ['class' => 'form-control']) !!}
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
                {!! Form::select('role', array('Administrateur' => 'Administrateur', 'Directeur de production' => 'DirProd', 'Employé' => 'employe') , '1' ) !!}
            </div>

            <div class="form-group">
                {!! Form::button("Créer l'usager", ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        </div>
</div>
