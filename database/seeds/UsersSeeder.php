<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Guilherme Benites',
            'email' => 'guilherme.benites@before.com.br',
            'password' => Hash::make('teste1212'),
            'isAdmin' => 1
        ]);
    }
}
