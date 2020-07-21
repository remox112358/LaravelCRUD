<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) { 
            DB::table('workers')->insert([
                'name' => 'Владислав',
                'surname' => 'Зубенко',
                'profession' => 'Юрист',
                'experience' => '2 года',
                'salary' => rand(30000, 50000),
            ]);
        }
    }
}
