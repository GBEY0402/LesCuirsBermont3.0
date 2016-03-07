<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\MatierePremiere;

class MatieresPremieresTableSeeder extends Seeder {


	public function run()
	{
        //code, nom, description, prix, quantiteTotale, quantiteMinimum, quantiteLimite, quantiteReserve, actif
        $infos = [
		["Cuir",	"rouge", 		"",	 "2.99",	"100",	"25",	"10",	"1"],
		["Cuir",	"bleu", 		"",	 "2.99",	"100",	"30",	"20",	"1"],
		["Suede",	"blanc",	 	"",	 "1.99",	"200",	"50",	"30",	"1"],
		["Fil",		"blanc 100M", 	"",	 "0.99",	"50",	"25",	"15",	"1"],
		["Fil",		"noir 100M", 	"",	 "0.99",	"50",	"25",	"15",	"1"]

		];

        DB::table('MatieresPremieres')->delete();
        foreach($infos as $info) {
		    $materiel = new MatierePremiere();
		    $materiel->type = 				$info[0];
		    $materiel->nom = 				$info[1];
		    $materiel->description =		$info[2];
		    $materiel->prix = 				$info[3];
		    $materiel->quantiteTotale = 	$info[4];
		    $materiel->quantiteMinimum = 	$info[5];
		    $materiel->quantiteLimite = 	$info[6];
		    $materiel->actif = 				$info[7];
            $materiel->save();		
        }
	}
}