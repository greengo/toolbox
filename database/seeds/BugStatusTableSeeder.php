<?php

use Illuminate\Database\Seeder;
use Greengo\Models\BugStatus;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class BugStatusTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('bug_statuses')->delete();
        BugStatus::create(['title' => 'fixed']);
        BugStatus::create(['title' => "won't fix"]);
        BugStatus::create(['title' => 'postponed']);
        BugStatus::create(['title' => 'not repro']);
        BugStatus::create(['title' => 'duplicate']);
        BugStatus::create(['title' => 'by design']);
    }

}
