<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('team_id')->unsigned()->index();
            $table->string('unsubscribed_status', 191)->default('none');
            $table->string('first_name', 191)->nullable()->index();
            $table->string('last_name', 191)->nullable()->index();
            $table->string('phone', 191)->index();
            $table->string('email', 191)->nullable()->index();
            $table->integer('sticky_phone_number_id')->nullable();
            $table->string('twitter_id', 191)->nullable()->index();
            $table->string('fb_messenger_id', 191)->nullable()->index();
            $table->timestamps();
            $table->string('time_zone', 191)->nullable();
            $table->index(['team_id', 'phone'], 'idx_phone_search');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
