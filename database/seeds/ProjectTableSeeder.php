<?php

use Illuminate\Database\Seeder;
use Greengo\Models\Project;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('projects')->delete();
        Project::create(['title' => 'GreenGo Control Room', 'description' => 'Our One-Stop Service Execution Platform']);
        //Project::create(['title' => 'GreenGo Monitor', 'description' => 'Customer view of production']);
        Project::create(['title' => 'GreenGo Toolbox', 'description' => 'Tools to facilitate our development and bug fixing']);
    }

}
