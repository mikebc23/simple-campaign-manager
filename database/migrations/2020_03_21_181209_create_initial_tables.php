<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_type', function (Blueprint $table) {
            $table->bigIncrements('campaign_type_id')->comment('The campaign Type Id');
            $table->string('campaign_type_name',255)->comment('The campaign type name');
            $table->text('campaign_type_description')->comment('The campaign type description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('campaign_status', function (Blueprint $table) {
            $table->bigIncrements('campaign_status_id')->comment('The campaign Status Id');
            $table->string('campaign_status_name',255)->comment('The campaign status name');
            $table->text('campaign_status_description')->comment('The campaign status description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('campaign', function (Blueprint $table) {
            $table->bigIncrements('campaign_id')->comment('The campaign Type Id');
            $table->string('campaign_name',255)->comment('The campaign type');
            $table->date('campaign_start')->comment('The start date of the campaign.');
            $table->date('campaign_end')->comment('The end date of the campaign.');
            $table->unsignedBigInteger('campaign_status_id')->index('idx_campaign_status_id')->comment('The campaign status');
            $table->unsignedBigInteger('campaign_type_id')->index('idx_campaign_type_id')->comment('The campaign type');
            $table->text('campaign_content')->comment('The campaign content-description');
            $table->unsignedBigInteger('user_creator_id')->index('idx_user_creator_id')->comment('The campaign status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('campaign_status_id')->references('campaign_status_id')->on('campaign_status');
            $table->foreign('campaign_type_id')->references('campaign_type_id')->on('campaign_type');
        });

        Schema::create('user_campaign_link', function (Blueprint $table) {
            $table->bigIncrements('user_campaign_link_id')->comment('The User-campaign Link Id');
            $table->unsignedBigInteger('user_campaign_link_campaign_id')->index('idx_user_campaign_link_campaign_id')->comment('The campaign id');
            $table->unsignedBigInteger('user_campaign_link_user_id')->index('idx_user_campaign_link_user_id')->comment('The user id');

            $table->foreign('user_campaign_link_campaign_id')->references('campaign_id')->on('campaign');
            $table->foreign('user_campaign_link_user_id')    ->references('id')    ->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_campaign_link');
        Schema::dropIfExists('campaign');
        Schema::dropIfExists('campaign_type');
        Schema::dropIfExists('campaign_status');
    }
}
