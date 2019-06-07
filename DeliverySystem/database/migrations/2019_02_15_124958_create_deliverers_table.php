<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('street');
            $table->string('house_number');
            $table->string('areacode');
            $table->string('city');
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('iban');
            $table->string('iban_name');
            $table->decimal('paper_salary')->nullable();
            $table->date('birthday');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('deliverers');
    }
}
