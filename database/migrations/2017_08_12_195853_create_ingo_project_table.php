<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngoProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingo_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingo_office_id')->unsigned();
            $table->string('project_name');
            $table->string('district');
            $table->string('upozilla');
            $table->string('theme');
            $table->string('key_partners');
            $table->time('time');
            $table->tinyInteger('valid')->default(1); // 1 = valid, 0 = invalid (basically deleted or not)
            $table->timestamps();


            $table->foreign('ingo_office_id')->references('id')->on('ingos')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingo_projects');
    }
}
