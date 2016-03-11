@extends('shared.masterlayout')
@section('content')
<div class="container">

    <div class="content">
        <div class="title">
        	<h2>Allo {!! $user->prenom !!} !</h2> 
        	<h2>Vous êtes un {!! $user->role !!}.</h2>
        </div>
    </div>
</div>
@stop
@section('content-admin')
    
@stop

@section('content-prod')
    
@stop