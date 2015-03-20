<?php

use Illuminate\Database\Seeder;

class SentryUserGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users_groups')->delete();

		$userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
		$adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');

		$user1 = Sentry::getUserProvider()->findByLogin('ro@greengoenergy.dk');
		$user2 = Sentry::getUserProvider()->findByLogin('cw@greengoenergy.dk');
		$user3 = Sentry::getUserProvider()->findByLogin('vgm@greengoenergy.dk');

		$userGroup = Sentry::getGroupProvider()->findByName('Users');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admins');
		$superadminGroup = Sentry::getGroupProvider()->findByName('Superadmins');

	    // Assign the groups to the users
	    $user1->addGroup($userGroup);
	    $user1->addGroup($adminGroup);
	    $user1->addGroup($superadminGroup);

			$user2->addGroup($userGroup);
	    $user2->addGroup($adminGroup);

			$user3->addGroup($userGroup);
	    $user3->addGroup($adminGroup);

	}

}
