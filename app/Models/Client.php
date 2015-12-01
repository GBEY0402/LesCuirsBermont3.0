<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Personne
{

    /*
     *L'objet Client utilise la table Clients
     */

    protected $table = 'Clients';

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'prenom' => 'required',
			'nom' => 'required',
			'adresse' => 'required',
			'ville' => 'required',
			'noTel' => 'required',
			];
	}
    
}