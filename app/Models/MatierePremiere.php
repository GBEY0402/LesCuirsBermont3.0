<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatierePremiere extends EloquentValidating
{

    /*
     *L'objet MatierePremiere utilise la table MatieresPremieres
     */

    protected $table = 'MatieresPremieres';

    /**
     * Les attributs modifiables d'un objet MatierePremiere.
     *
     * @var array
     */
    protected $fillable = ['type', 'nom', 'description', 'prix', 'quantiteTotale',
    						 'quantiteMinimum', 'quantiteLimite'];

    public $validationMessages;

    /*
     * Les attributs modifiables sont validés selon leurs spécification.
     */

	public function validationRules() {
		return 
			[
			'type' 				=> 'required',
			'nom' 				=> 'required|alpha_num',
			'prix' 				=> 'required',
			'quantiteTotale' 	=> 'required|numeric|min:0',
			'quantiteMinimum' 	=> 'required|numeric|min:0',
			'quantiteLimite' 	=> 'required|numeric|min:0',
			];
	}
    
}