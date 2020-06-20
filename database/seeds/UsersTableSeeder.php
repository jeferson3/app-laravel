<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ###### cadastrando dados fakes no banco ####
        // comando pra rodar: php artisan db:seed --class=ProductTableSeeder
        // factory(User::class, 10)->create();



        
        ##### criadno um usuario default ####
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@email',
        //     'password' => bcrypt('123456')
        // ]);
    }
}
