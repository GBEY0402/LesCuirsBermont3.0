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

  /**
   * Les objets ProduitFini appartiennent à plusieurs entrepot.
   */

  public function Entrepots(){ 


        return $this->belongsToMany('App\Models\entrepot')->withPivot('pointure', 'quantite');
  }

  /**
   * Les objets ProduitFini appartiennent à plusieurs commande.
   */

  public function Commandes(){ 

        return $this->belongsToMany('App\Models\Commande')->withPivot('pointure', 'quantite');
  }
    
}