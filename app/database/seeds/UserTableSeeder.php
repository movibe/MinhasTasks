<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('user')->truncate();

		User::create([
		             'nome' => 'Willian',
		             'email' => 'agfoccus@gmail.com',
		             'password' => Hash::make('demo'),
		             'active' => true
		             ]);
	

		User::create([
		             'nome' => 'Natalia',
		             'email' => 'natalia.araujo.rodrigues@gmail.com',
		             'password' => Hash::make('demo'),
		             'active' => true
		             ]);

		// Uncomment the below to run the seeder
		// DB::table('user')->insert($user);
	}

}
