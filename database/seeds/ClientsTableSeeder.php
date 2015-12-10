<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientsTableSeeder extends Seeder {


	public function run()
	{
		DB::table('clients')->delete();		
		
		DB::table('clients')->insert(array('prenom' => 'Robert',
											 'nom' => 'Durocher', 
											 'adresse' => '1 rue ABC', 
											 'ville' => 'St-clinclin des meumeux',
											 'noTel' => '819-555-2525',
											 'courriel' => 'bobd@email.com'));
		DB::table('clients')->insert(array('prenom' => 'Eric',
											 'nom' => 'Brochu', 
											 'adresse' => '2 rue DEF', 
											 'ville' => 'Quelquepard',
											 'noTel' => '819-555-3433',
											 'courriel' => 'ricky@hotshit.com'));
		DB::table('clients')->insert(array('prenom' => 'Steve',
											 'nom' => 'Caya', 
											 'adresse' => '3 rue GHI', 
											 'ville' => 'Danssoncul',
											 'noTel' => '819-555-6969',
											 'courriel' => 'cayas@pornhub.com'));
	}
}