<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_status')->insert([
            'campaign_status_name' => 'Draft',
            'campaign_status_description' => 'Draft',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('campaign_status')->insert([
            'campaign_status_name' => 'Active',
            'campaign_status_description' => 'Active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('campaign_status')->insert([
            'campaign_status_name' => 'Inactive',
            'campaign_status_description' => 'Inactive',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
