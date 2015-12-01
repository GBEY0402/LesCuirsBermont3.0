<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder 
{

    public function run()
    {
        DB::table('users')->delete();
        DB::table('password_resets')->delete();
        $user = new User();
        $user->prenom = 'Bob';
        $user->nom = 'Durocher';
        $user->nomUsager = 'bob';
        $user->motsDePasse = Hash::make('admin');
        $user->role = 'Administrateur';
        $user->save();

        $user2 = new User();
        $user2->prenom = 'Steve';
        $user2->nom = 'Caya';
        $user2->nomUsager = 'steve';
        $user2->motsDePasse = Hash::make('steve');
        $user2->role = 'Production';
        $user2->save();

        $user3 = new User();
        $user3->prenom = 'Eric';
        $user3->nom = 'Brochu';
        $user3->nomUsager = 'eric';
        $user3->motsDePasse = Hash::make('eric');
        $user3->role = 'Employer';
        $user3->save();

    }
}
