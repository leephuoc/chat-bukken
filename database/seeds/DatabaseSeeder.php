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

        // $this->call(UserTableSeeder::class);

        DB::table('users')->insert([
            [
                'id' => 1,
                'login_id' => 'user_1',
                'password' => 'demo',
            ],
            [
                'id' => 2,
                'login_id' => 'user_2',
                'password' => 'demo',
            ]
        ]);

        Model::reguard();
    }
}
