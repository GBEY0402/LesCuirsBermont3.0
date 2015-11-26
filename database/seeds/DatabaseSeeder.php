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
        $user->name = 'Bob';
        $user->username = 'bob';
        $user->password = Hash::make('admin');
        $user->role = 'Administrateur';
        $user->save();

        $user2 = new User();
        $user2->name = 'Steve';
        $user2->username = 'steve';
        $user2->password = Hash::make('steve');
        $user2->role = 'Production';
        $user2->save();

        $user3 = new User();
        $user3->name = 'Eric';
        $user3->username = 'eric';
        $user3->password = Hash::make('eric');
        $user3->role = 'Employer';
        $user3->save();

    }
}
