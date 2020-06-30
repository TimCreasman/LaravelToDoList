<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'task_priority_id' => factory(\App\TaskPriority::class),
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});
