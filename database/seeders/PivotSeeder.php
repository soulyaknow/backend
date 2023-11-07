<?php

namespace Database\Seeders;

use App\Models\Evaluatee;
use App\Models\Questionaire;
use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $questionaires = Questionaire::all();
        $evaluatees = Evaluatee::all();


        foreach($questionaires as $questionaire){
            foreach($evaluatees as $evaluatee){
                $evaluatee->questionaires()->attach($questionaire->id);
            }
        }
    }
}
