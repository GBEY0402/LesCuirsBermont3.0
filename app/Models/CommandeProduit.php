<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{

	/*
     *L'objet CommandeProduit utilise la table CommandeProduits
     */

    protected $table = 'CommandesProduits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['commandesId', 'produitsId', 'quantite'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'commandesId' 	=> 'required',
			'produitsId' 	=> 'required',
			'quantite' 		=> 'required',
			];
	}
}
