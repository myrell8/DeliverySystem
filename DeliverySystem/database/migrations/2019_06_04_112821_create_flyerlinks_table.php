<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlyerlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyerlinks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('flyer_id');
            $table->string('type')->nullable();
            $table->string('specific')->nullable();
            $table->unsignedInteger('week');
            $table->unsignedInteger('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flyerlinks');
    }
}
