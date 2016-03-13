<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends EloquentValidating
{

    /*
     *L'objet Client utilise la table Clients
     */

    protected $table = 'Clients';

    /**
     * Les attributs de l'objet Client qui sont modifiable.
     *
     * @var array
     */
    protected $fillable = ['prenom', 'nom', 'adresse', 'ville', 'noTel', 'courriel'];

    public $validationMessages;

    /**
     * Les champs modifiable de l'objet Client sont validés.
     */

	public function validationRules() {
		return 
			[
			'prenom' 	=> 'required',
			'nom' 		=> 'required',
			'adresse' 	=> 'required',
			'ville' 	=> 'required',
			'noTel' 	=> 'required',
			];
	}
    
}