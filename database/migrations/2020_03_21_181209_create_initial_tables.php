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
            $table->bigIncrements('id')->comment('The campaigns Type Id');
            $table->string('name',255)->comment('The campaigns type name');
            $table->text('description')->comment('The campaigns type description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The campaigns Type Id');
            $table->string('title',30)->comment('The campaigns type');
            $table->string('short_description',255)->comment('The campaigns type');
            $table->text('long_description')->comment('The campaigns content-description');
            $table->date('start')->comment('The start date of the campaigns.');
            $table->date('end')->comment('The end date of the campaigns.');
            $table->smallInteger('status')->default(0)->index('idx_status')->comment('The campaigns status');
            $table->unsignedBigInteger('campaign_type_id')->index('idx_campaign_type_id')->comment('The campaigns type');
            $table->unsignedBigInteger('user_creator_id')->index('idx_user_creator_id')->comment('The campaigns status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('campaign_type_id')->references('id')->on('campaign_types');
        });

        Schema::create('user_campaign', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('The User-campaigns Link Id');
            $table->unsignedBigInteger('campaign_id')->index('idx_user_campaign_campaign_id')->comment('The campaigns id');
            $table->unsignedBigInteger('user_id')->index('idx_user_campaign_user_id')->comment('The user id');

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
        Schema::dropIfExists('campaigns');
        Schema::dropIfExists('campaign_type');
        Schema::dropIfExists('campaign_status');
    }
}
