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
		["entrepot",	"1"],
		["Remorque #1",	"2"],
		["Remorque #2",	"2"],
		["Remorque #3",	"2"]
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
