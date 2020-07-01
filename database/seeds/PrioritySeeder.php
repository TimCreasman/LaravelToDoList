<?php

use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            ['type' => 'urgent'],
            ['type' => 'important'],
            ['type' => 'optional'],
            ['type' => 'ignore']
        ]);
    }
}
