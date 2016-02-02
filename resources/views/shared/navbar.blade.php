<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">Les Cuirs Bermont</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/inventaire">Inventaire</a></li>
                <li><a href="{{ action('CommandesController@index') }}">Production</a></li>
                @if ($role == 'Administrateur')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clients et fournisseurs<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action('ClientsController@index') }}"> Liste des clients/fournisseurs</a></li>
                            <li><a href="{{ action('ClientsController@create') }}"> Ajouter un client/fournisseur</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!--<li><a>Gestion employé</a></li>-->
                @if ($role == 'Administrateur')
                <li class="dropdown">
                    <a href="/usager" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestion employé <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ action('UserController@index') }}"> Liste des usagés</a></li>
                        <li><a href="{{ action('UserController@create') }}"> Ajouter un usagé</a></li>
                        <!--<li class="divider"></li>
                        <li><a href="#">Separated link</a></li>-->
                    </ul>
                @endif
                </li>
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
            
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div style='display:none' >
            <div id='ajouterUsager' style='padding:10px; background:#fff;'>
                @include('auth.register')
            </div>
        </div>