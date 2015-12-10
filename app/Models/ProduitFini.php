<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduitFini extends EloquentValidating
{

    protected $table = 'produitsFinis';

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
			'code' 			=> 'required|unique:produitsFinis,code'.($this->id ? ",$this->id" : ''),
			'nom' 			=> 'required',
			'quantite' 		=> 'required',
			'prix' 			=> 'required',
            'actif'         => 'required',
			];
	}
    
}