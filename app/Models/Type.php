<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends EloquentValidating
{

    protected $table = 'types';

 /**
  * Validation
  *
  * un type doit avoir:
  * - nom : doit être unique dans la base de données.
  */

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'nom' 			=> 'required|unique:types,nom'.($this->nom ? ",$this->nom" : ''),
			];
	}
    
}