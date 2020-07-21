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
        for ($i = 1; $i <= 20; $i++) { 
            DB::table('workers')->insert([
                'name' => 'Имя' . $i,
                'surname' => 'Фамилия' . $i,
                'profession' => 'Профессия' . $i,
                'experience' => 'Стаж' . $i,
                'salary' => rand(30000, 50000),
            ]);
        }
    }
}
