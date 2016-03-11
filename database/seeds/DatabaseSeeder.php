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
        $this->call('EntrepotTableSeeder');
        
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
        $user->prenom = 'Robert';
        $user->nom = 'Durocher';
        $user->username = 'admin';
        $user->password = Hash::make('admin');
        $user->role = 'Administrateur';
        $user->save();
    }
}
