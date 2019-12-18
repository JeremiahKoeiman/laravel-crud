<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create([
            'name'=>'owner',
            'email'=>'owner@site.nl',
            'password'=>bcrypt('test123')
        ])->each(function (User $user){
            $user->assignRole('owner');
        });

        factory(App\User::class, 1)->create([
            'name'=>'moderator',
            'email'=>'moderator@site.nl',
            'password'=>bcrypt('test123')
        ])->each(function (User $user){
            $user->assignRole('moderator');
        });

        factory(App\User::class, 1)->create([
            'name'=>'customer',
            'email'=>'customer@site.nl',
            'password'=>bcrypt('test123')
        ])->each(function (User $user){
            $user->assignRole('customer');
        });

        factory(App\User::class, 50)->create();
    }
}
