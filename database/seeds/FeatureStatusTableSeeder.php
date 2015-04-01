<?php

use Illuminate\Database\Seeder;
use Greengo\Models\FeatureStatus;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class FeatureStatusTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('feature_statuses')->delete();
        FeatureStatus::create(['title' => 'accepted']);
        FeatureStatus::create(['title' => 'scheduled']);
        FeatureStatus::create(['title' => 'in progress']);
        FeatureStatus::create(['title' => 'rejected']);
        FeatureStatus::create(['title' => 'postponed']);
    }
}
