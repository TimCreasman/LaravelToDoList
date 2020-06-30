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
            $table->unsignedBigInteger('task_priority_id'); //foreign key pointing to user
            $table->unsignedBigInteger('user_id'); //foreign key pointing to user

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('task_priority_id')
                ->references('id')
                ->on('task_priorities')
                ->onDelete('cascade'); //delete all associated tasks if the task_priority is dropped

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
            $table->dropColumn('task_priority_id');
            $table->dropColumn('user_id');
        });
    }
}
