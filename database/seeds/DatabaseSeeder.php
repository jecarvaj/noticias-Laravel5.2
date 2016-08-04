<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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

        //factory('App\User', 5)->create();
       // factory('App\Categoria', 10)->create();
       factory('App\Noticia', 1)->create();

        Model::reguard();


    }
}
