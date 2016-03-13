<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends EloquentValidating
{

    /*
     *L'objet Commande utilise la table Commandes
     */

    protected $table = 'Commandes';

    /**
     * Les attribues modifiables de l'objet Commande.
     *
     * @var array
     */
    protected $fillable = ['clientsId', 'dateDebut', 'dateFin', 'etat'];

    public $validationMessages;

    /*
     * Les attributs modifiables sont validés selon leurs spécification.
     */

	public function validationRules() {
		return 
			[
            'dateDebut' 	=> 'required',
			'dateFin' 		=> 'required',
			'etat' 			=> 'required',
			];
	} 

    /*
     * Des objets ProduitFini font référence à un objet Commande.
     */

    public function ProduitsFinis(){ 

        return $this->belongsToMany('App\Models\ProduitFini')->withPivot('pointure', 'quantite');
    }
}