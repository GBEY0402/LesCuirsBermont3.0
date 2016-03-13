<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class entrepot extends Model
{
    /*
     * L'objet Entrepot est associé à la table Entrepot.
     */

    protected $table = 'entrepot';

    public $timestamps = false;

    /**
     * Les attributs de l'objet Entrepot qui sont modifiable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'type'];

    public $validationMessages;

    /*
     * Les attributs modifiables sont validés selon leurs spécification.
     */

	public function validationRules() {
		return 
			[
			'nom' 			=> 'required',
			'type' 			=> 'required',
			];
	}

    /*
     * Les objet ProduitFini sont associés à un entrepot, en plus d'y ajouter une pointure et une quantité.
     */

    public function ProduitsFinis(){ 

        return $this->belongstomany('App\Models\ProduitFini')->withPivot('pointure', 'quantite');
    }
}
