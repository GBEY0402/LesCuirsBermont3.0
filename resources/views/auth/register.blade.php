
        <form method="POST" action="auth/register/">
            {!! csrf_field() !!}

            <div>
                Prénom : 
                <input type="text" name="prenom" value="">
            </div>

            <div>
                Nom : 
                <input type="text" name="nom" value="">
            </div>

            <div> 
                Username :
                <input type="text" name="username" value="">
            </div>

            <div>
                Password :
                <input type="password" name="password">
            </div>

            <div>
                Confirm Password :
                <input type="password" name="password_confirmation">
            </div>
            
            <div> 
                Role de l'usager :
                <select name="role">
                    <option value="employe">Employé</option>
                    <option value="dirProd">Directeur de production</option>
                    <option value="administrateur">Administrateur</option>
                </select>
            </div>

            <div>
                <button type="submit">Création de l'usager</button>
            </div>
        </form>
