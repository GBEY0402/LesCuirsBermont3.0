<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    /*
     *L'objet Client utilise la table Clients
     */

    protected $table = 'Clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['prenom', 'nom', 'adresse', 'ville', 'noTel', 'courriel'];

    public $validationMessages;

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