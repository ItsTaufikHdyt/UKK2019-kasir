<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'id' => '1',
            'username' => 'admin',
            'email' => 'admin@ukk.com',
            'password' => bcrypt('admin'),
            'id_level' => '1'
			]);
		
		
    }
}
