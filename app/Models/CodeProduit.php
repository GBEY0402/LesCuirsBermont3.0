<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeProduit extends EloquentValidating
{
     /*
     *
     */

    protected $table = 'CodesProduits';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'code' 	=> 'required|alpha_num|unique:codesProduits,code'.($this->id ? ",$this->id" : ''),
			];
	}
}
