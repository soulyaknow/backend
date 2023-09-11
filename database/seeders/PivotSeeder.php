<?php

namespace Database\Seeders;

use App\Models\Instructor;
use App\Models\Questionaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('evaluatables')->delete();
        $questionaires = Questionaire::all();
        $instructors = Instructor::all();

       
        foreach($questionaires as $questionaire){
            foreach($instructors as $instructor){
                $instructor->questionaires()->attach($questionaire->id);
            }
        }
    }
}
