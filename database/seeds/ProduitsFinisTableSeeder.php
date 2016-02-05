<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProduitFini;

class ProduitsFinisTableSeeder extends Seeder {


	public function run()
	{
        //code, nom, description, quantite, prix, actif
        $infos = [
		["350Bleu4",	"Pantouffe bleue", 	"Pantouffe de pointure 4 Bleu",	 	"109.99",	"1"],
		["350Rouge5", 	"Pantouffe rouge", 	"Pantouffe de pointure 5 Rouge", 	"109.99", 	"1"],
		["350Blanc6", 	"Pantouffe Blanche", "Pantouffe de pointure 6 Blanche", "109.99", 	"1"],
		["350Noir7", 	"Pantouffe Noir", 	"Pantouffe de pointure 7 Noir", 	"109.99", 	"1"],
		["350Fuchia8", 	"Pantouffe Fuchia", "Pantouffe de pointure 8 Fuchia", 	"109.99", 	"1"],
		["350Arcenciel9", "Pantouffe multicolore", "Pantouffe de pointure 9 Arc-en-ciel", "109.99", "1"],
		["350Vert10", 	"Pantouffe verte", 	"Pantouffe de pointure 10 Vert", 	"109.99", 	"1"]

		];

        DB::table('produitsFinis')->delete();
        foreach($infos as $info) 
        {
		    $produit = new ProduitFini();
		    $produit->code = $info[0];
		    $produit->nom = $info[1];
		    $produit->description = $info[2];
		    $produit->prix = $info[3];
		    $produit->actif = $info[4];
            $produit->save();		
        }
	}
}