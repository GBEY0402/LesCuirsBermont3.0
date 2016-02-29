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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['clientsId', 'dateDebut', 'dateFin', 'etat'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
            'dateDebut' 	=> 'required',
			'dateFin' 		=> 'required',
			'etat' 			=> 'required',
			];
	} 

    public function ProduitsFinis(){ 

        return $this->belongsToMany('App\Models\ProduitFini')->withPivot('pointure', 'quantite');
    }
}