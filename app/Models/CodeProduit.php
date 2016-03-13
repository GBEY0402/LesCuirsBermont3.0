<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeProduit extends EloquentValidating
{
     /**
     * L'objet CodeProduit est associé à la table codeProduit
     */

    protected $table = 'CodesProduits';
    public $timestamps = false;

    /**
     * Les attributs de l'objet CodeProduit qui sont modifiable.
     *
     * @var array
     */
    protected $fillable = ['code'];

    public $validationMessages;

    /**
     * L'attribut code est validé selon certaines spécification.
     */

	public function validationRules() {
		return 
			[
			'code' 	=> 'required|alpha_num|unique:codesProduits,code'.($this->id ? ",$this->id" : ''),
			];
	}
}
