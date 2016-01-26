<script type="text/javascript">

  function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }
    if(form.pwd1.value != "" && form.password.value == form.password2.value) {
      if(!checkPassword(form.password.value)) {
        alert("The password you have entered is not valid!");
        form.password.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.password.focus();
      return false;
    }
    return true;
  }

</script>

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
                {!! Form::label('password2', 'Confirm password:') !!}
                {!! Form::password2('password2', null, ['class' => 'form-control']) !!}
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