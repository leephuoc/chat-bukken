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

        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'id' => 1,
                'login_id' => 'user_1',
                'password' => 'demo',
                'created_at' => date('Y-m-d H:i:s', strtotime('now')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('now'))
            ],
            [
                'id' => 2,
                'login_id' => 'user_2',
                'password' => 'demo',
                'created_at' => date('Y-m-d H:i:s', strtotime('now')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('now'))
            ]
        ]);

        Model::reguard();
    }
}
