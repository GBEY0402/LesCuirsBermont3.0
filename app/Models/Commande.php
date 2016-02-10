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
    protected $fillable = ['clientsId', 'dateDebut', 'dateFin', 'etat', 'commentaire'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
            'id'            => 'required|unique|alpha_num',
			'clientsId' 	=> 'required',
			'dateDebut' 	=> 'required',
			'dateFin' 		=> 'required',
			'etat' 			=> 'required',
			];
	}
    
}