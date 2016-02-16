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
			'code' 			=> 'required',
			'nom' 			=> 'required',
			'prix' 		 	=> 'required|numeric|min:0',
      'actif'     => 'required',
			];
	}

  public function Entrepots(){ 


        return $this->belongstomany('App\Models\entrepot')->withPivot('pointure', 'quantite');
    }
    
}