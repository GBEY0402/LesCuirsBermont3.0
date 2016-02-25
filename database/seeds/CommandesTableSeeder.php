<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\Models\Evenement;

class CommandesTableSeeder extends Seeder {


	public function run()
	{

		$dateDebut = Carbon::now();
		$dateFin = $dateDebut->addweekdays(3);

		DB::table('commandes')->delete();		
		
		DB::table('commandes')->insert(array('clientsId' => 1,
											 'dateDebut' => $dateDebut, 
											 'dateFin' => $dateFin, 
											 'etat' => 'En Cours'));
		DB::table('commandes')->insert(array('clientsId' => 2,
											 'dateDebut' => $dateDebut, 
											 'dateFin' => $dateFin, 
											 'etat' => 'Terminée'));
	}
}
