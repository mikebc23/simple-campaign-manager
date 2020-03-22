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
        Schema::create('campaign_types', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The campaign Type Id');
            $table->string('name',255)->comment('The campaign type name');
            $table->text('description')->comment('The campaign type description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The campaign Type Id');
            $table->string('name',255)->comment('The campaign type');
            $table->date('start')->comment('The start date of the campaign.');
            $table->date('end')->comment('The end date of the campaign.');
            $table->unsignedBigInteger('status')->index('idx_status')->comment('The campaign status');
            $table->unsignedBigInteger('campaign_type_id')->index('idx_campaign_type_id')->comment('The campaign type');
            $table->text('content')->comment('The campaign content-description');
            $table->unsignedBigInteger('user_creator_id')->index('idx_user_creator_id')->comment('The campaign status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('campaign_type_id')->references('id')->on('campaign_types');
        });

        Schema::create('user_campaign', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The User-campaign Link Id');
            $table->unsignedBigInteger('campaign_id')->index('idx_user_campaign_link_campaign_id')->comment('The campaign id');
            $table->unsignedBigInteger('user_id')->index('idx_user_campaign_link_user_id')->comment('The user id');

            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->foreign('user_id')    ->references('id')    ->on('users');

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
        Schema::dropIfExists('user_campaign');
        Schema::dropIfExists('campaign');
        Schema::dropIfExists('campaign_type');
        Schema::dropIfExists('campaign_status');
    }
}
