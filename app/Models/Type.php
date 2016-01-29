<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends EloquentValidating
{

    protected $table = 'types';

 /**
  * Validation
  *
  * un produit fini doit avoir:
  * - code: obligatoire et unique dans toute la table.
  * - Les autres champs sont obligatoires, sauf description.
  */

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'nom' 			=> 'required|unique:types,nom'.($this->nom ? ",$this->nom" : ''),
			];
	}
    
}