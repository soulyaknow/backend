<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Criteria;
use App\Models\Question;
use App\Models\UserInfo;
use App\Models\Evaluatee;
use App\Models\Questionaire;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ////<----this function is for no ratings
        $this->call([TestSeeder::class,RoleSeeder::class,DepartmentSeeder::class]);
        ////-------->
        // $this->call(SubjectSectionSeeder::class);
        // $users = User::factory(100)->create();
        $questionaires = Questionaire::factory(2)->create();
        // Evaluatee::factory(20)->create();


        // foreach($users as $user){
        //     UserInfo::factory()->create(['user_id' => $user->id_number]);

        // }
        foreach($questionaires as $questionaire){
            $criterias = Criteria::factory(5)->create()->each(function($criteria)use ($questionaire){
                $questionaire->criterias()->attach($criteria->id);
            });
            foreach($criterias as $criteria){
                Question::factory(5)->create(['criteria_id' => $criteria->id]);
            }
        }

        // $this->call([
        //     RoleSeeder::class,
        //     PivotSeeder::class,
        //     DepartmentSeeder::class,
        //     ClassListSeeder::class
        // ]);









        // foreach($users as $user){
        //     foreach($evaluatees as $evaluatee){
        //         $evaluatee->ratings()->create([
        //             'evaluator_id' => $user->id_number,
        //             'question_id' => $question->id,
        //             'rating' => fake()->numberBetween(1,5)
        //         ]);
        //     }
        // }

            // foreach($evaluatees as $key =>  $evaluatee){
            //     if($key < 15){
            //         $evaluatee->users()->attach($user->id_number);
            //     }

            // }



              // Questionaire::factory(2)->create()->each(function($questionaire){
        //     Criteria::factory(5)->create()->each(function($criteria)use($questionaire){
        //         $questionaire->criteria()->attach($criteria->id);
        //         Question::factory(5)->create(['criteria_id'=>$criteria->id])->each();
        //     });
        // });
        // $question = Question::factory()->create();
        // Questionaire::factory(2)->create()->each(function($questionaire) use($users, $instructors){
        //     Criteria::factory(5)->create(['questionaire_id'=> $questionaire->id])->each(function($criteria)use($users, $instructors){
        //         Question::factory(5)->create(['criteria_id'=> $criteria->id])->each(function($question)use($users, $instructors){
        //            foreach($instructors as $teacher){
        //                 foreach($users as $user){
        //                     Rating::factory()->create([
        //                         'evaluator_id' => $user->id_number,
        //                         'teacher_id' => $teacher->id,
        //                         'question_id' => $question->id
        //                     ]);
        //                 }
        //            }
        //         });
        //     });
        // });
    }
}
