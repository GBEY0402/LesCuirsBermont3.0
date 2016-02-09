<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\entrepot;

class EntrepotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //nom, type(1 = entrepot principal 2 = remoreque)
        $infos = [
		["Entrepot",	"Entrepot"],
		["Remorque #1",	"Remorque"],
		["Remorque #2",	"Remorque"],
		["Remorque #3",	"Remorque"]
		];

        DB::table('entrepot')->delete();
        foreach($infos as $info) {
		    $entrepot = new entrepot();
		    $entrepot->nom = 		$info[0];
		    $entrepot->type =		$info[1];
            $entrepot->save();	
        }
    }
}
