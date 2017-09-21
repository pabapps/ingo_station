<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIngoAboutToIngosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingos', function (Blueprint $table) {
            $table->text('about')->nullable(); // 0=inactive, 1=active
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingos', function (Blueprint $table) {
            
            $table->dropColumn('about');

        });
    }
}
