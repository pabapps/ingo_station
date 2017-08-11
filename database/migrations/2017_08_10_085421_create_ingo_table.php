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
        Schema::create('ingos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('ingo_name');
            $table->text('address');
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->text('web_link')->nullable();
            $table->tinyInteger('valid')->default(1); // 1 = valid , 0 = invalid (in other words data has been deleted and not shown in the front end)
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingos');
    }
}
