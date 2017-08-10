<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ingo_name');
            $table->text('address');
            $table->mediumInteger('contact_number');
            $table->string('email')->unique();
            $table->text('web_link')->nullable();
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
        Schema::dropIfExists('inogs');
    }
}
