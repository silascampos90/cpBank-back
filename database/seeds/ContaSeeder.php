<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\User;
use App\Models\Conta;
use App\Models\Agencia;
use App\Models\TipoTransacao;
use App\Models\Transacoes;

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

        if (!Conta::count()) {
            
            $id_agencia = Agencia::where('codigo','0001')->first()->id;

            $client_1 = User::create([
                'nome' => 'Silas Silva Campos',
                'cpf' => '85257346593',
                'password' => \Hash::make(123456)

            ]);

            $client_2 = User::create([
                'nome' => 'Maria Carla Pereira',
                'cpf' => '36327116078',
                'password' => \Hash::make(123456)

            ]);

            $conta_1 = Conta::create([
                'numero'=>'0234',
                'agencia_id'=>$id_agencia,
                'users_id'=>$client_1->id
            ]);

            $conta_1 = Conta::create([
                'numero'=>'0894',
                'agencia_id'=>$id_agencia,
                'users_id'=>$client_2->id
            ]);
        }
    }
}
