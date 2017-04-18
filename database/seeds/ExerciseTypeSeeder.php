<?php

use Illuminate\Database\Seeder;
use App\ExerciseType;

class ExerciseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exerciseTypes = ['Weights','Time','Measurement'];
        foreach ($exerciseTypes as $ex) {
            ExerciseType::create([
                'name' => $ex,
            ]);
        }
    }
}
