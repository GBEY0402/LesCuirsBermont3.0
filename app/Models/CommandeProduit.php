<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends EloquentValidating
{
    protected $table = 'Commandes_Produits';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['commande_Id', 'produit_fini_Id', 'pointure', 'quantite'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
            'commande_Id' 		=> 'required|numeric',
			'produit_fini_Id' 	=> 'required|numeric',
			'pointure' 			=> 'required|numeric',
			'quantite' 			=> 'required|numeric',
			];
	} 
}
