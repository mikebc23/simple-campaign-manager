<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_type')->insert([
            'campaign_type_name' => 'Campaign Type 1',
            'campaign_type_description' => 'This is the campaigns type #1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('campaign_type')->insert([
            'campaign_type_name' => 'Campaign Type 2',
            'campaign_type_description' => 'This is the campaigns type #2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('campaign_type')->insert([
            'campaign_type_name' => 'Campaign Type 3',
            'campaign_type_description' => 'This is the campaigns type #3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
