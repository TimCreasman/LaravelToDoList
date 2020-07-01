<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); //foreign key pointing to user

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });

        //Link pivot table to priorities and tasks
        Schema::table('priority_task', function (Blueprint $table) {
             $table->unsignedBigInteger('priority_id');
             $table->unsignedBigInteger('task_id');
             $table->unique(['task_id', 'priority_id']);

             $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');

             $table->foreign('priority_id')
                ->references('id')
                ->on('priorities')
                ->onDelete('cascade');
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
        Schema::table('priority_task', function (Blueprint $table) {
            $table->dropColumn('priority_id');
            $table->dropColumn('task_id');
        });
    }
}
