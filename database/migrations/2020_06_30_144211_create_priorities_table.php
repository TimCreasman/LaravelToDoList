<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });
        //TODO add a seeder here to auto populate this table with priority types

        //Create pivot table
        Schema::create('priority_task', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('priorities');
        Schema::dropIfExists('priority_task');
    }
}
