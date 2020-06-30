<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeysToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('priority_id'); //foreign key pointing to user
            $table->unsignedBigInteger('user_id'); //foreign key pointing to user

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('priority_id')
                ->references('id')
                ->on('priorities')
                ->onDelete('cascade'); //delete all associated tasks if the priority is dropped

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('priority_id');
            $table->dropColumn('user_id');
        });
    }
}
