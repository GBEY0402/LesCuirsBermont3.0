<?php

namespace App\Models;

#use Illuminate\Database\Eloquent\Model;
use Item

class ProduitFini extends Model
{

    /*
     *L'objet ProduitFini utilise la table ProduitsFinis
     */

    protected $table = 'ProduitsFinis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'nom', 'description', 'quantite', 'prix'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'code' 			=> 'required',
			'nom' 			=> 'required',
			'quantite' 		=> 'required',
			'prix' 			=> 'required',
			];
	}
    
}