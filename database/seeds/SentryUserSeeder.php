<?php

use Illuminate\Database\Seeder;

class SentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();


			Sentry::getUserProvider()->create(array(
		        'email'    => 'ro@greengoenergy.dk',
		        'username' => 'ro',
						'first_name' => 'Ro',
						'last_name' => 'Kleine Sonne',
		        'password' => 'admin123',
		        'activated' => 1,
		    ));



	    Sentry::getUserProvider()->create(array(
	        'email'    => 'cw@greengoenergy.dk',
	        'username' => 'casper',
					'first_name' => 'Casper',
					'last_name' => 'Wilken',
	        'password' => 'admin123',
	        'activated' => 1,
	    ));

			Sentry::getUserProvider()->create(array(
	        'email'    => 'vgm@greengoenergy.dk',
	        'username' => 'victor',
					'first_name' => 'Victor',
					'last_name' => 'Garcia Mestre',
	        'password' => 'admin123',
	        'activated' => 1,
	    ));
	}

}
