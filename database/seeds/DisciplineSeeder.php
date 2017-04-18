<?php

use App\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Still need to add in appropriate descriptions (get of IAAF or an accredited site).
         * */
        $disciplines = [
            'Sprints' => '',
            'Middle Distance' => '',
            'Long Distance' => '',
            'Marathon' => '',
            'Hurdles' => '',
            'Horizontal Jumps' => '',
            'Vertical Jumps' => '',
            'Throws' => ''
        ];
        foreach ($disciplines as $name => $description) {
            Discipline::create([
                'name' => $name,
                'description' => $description
            ]);
        }
    }
}
