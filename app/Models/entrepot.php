<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class entrepot extends Model
{
    /*
     *
     */

    protected $table = 'entrepot';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'type'];

    public $validationMessages;

	public function validationRules() {
		return 
			[
			'nom' 				=> 'required',
			'type' 				=> 'required',
			];
	}

    public function ProduitsFinis(){ 

        return $this->belongstomany('App\ProduitFini');
    }
}
