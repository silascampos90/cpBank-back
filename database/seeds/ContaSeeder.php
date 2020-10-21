<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\User;
use App\Models\Conta;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factory(\App\User::class, 5)->create()->each(function($user){

        //     $user->conta()->save(Factory(\App\model\Conta::class)->make());

        // });

        if(!Conta::count()){
            
        }




    }
}
