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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'nom', 'description', 'prix', 'quantiteTotale',
    						 'quantiteMinimum', 'quantiteLimite', 'quantiteReserve'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'type' 				=> 'required',
			'nom' 				=> 'required',
			'prix' 				=> 'required',
			'quantiteTotale' 	=> 'required',
			'quantiteMinimum' 	=> 'required',
			'quantiteLimite' 	=> 'required',
			'quantiteReserve' 	=> 'required',
			];
	}
    
}