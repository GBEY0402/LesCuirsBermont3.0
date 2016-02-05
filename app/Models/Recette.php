<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recette extends EloquentValidating
{
    /*
     *L'objet Recette utilise la table Recettes
     */

    protected $table = 'Recettes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['produitsFinisId', 'matieresPremieresId', 'quantite'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'code' 		            => 'required',
			'matieresPremieresId' 	=> 'required',
			'quantite' 				=> 'required',
			];
	}
}
