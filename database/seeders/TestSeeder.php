<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Klass;
use App\Models\Subject;
use App\Models\UserInfo;
use App\Models\Evaluatee;
use App\Models\SectionYear;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $sys = SectionYear::all();
        // $users = User::factory(10)->create();
        // foreach ($sys as $sy) {
        //     $users = User::factory(10)->create();
        //     foreach ($users as $user) {
        //         $sy->users()->attach($user->id_number);
        //     }

        // }
        // foreach($users as $user) {
        //     $randomSys = SectionYear::inRandomOrder()->first();
        //     $user->sectionYears()->attach($randomSys->id);
        // }
        // User::factory(10)->create();
        // $subjects = ['math', 'science', 'english', 'history', 'social studies', 'art', 'music'] ;
        // foreach ($subjects as $subject) {
        //     Subject::factory()->create(['name' => $subject]);
        // }
        $this->call([SubjectSectionSeeder::class]);
        $evaluatees = Evaluatee::factory(10)->create();

        foreach ($evaluatees as $evaluatee) {
            $randomSubjects = Subject::inRandomOrder()->limit(3)->get();
            foreach ($randomSubjects as $randomSubject) {
                $evaluatee->subjects()->attach($randomSubject->id);
            }

        }

        $klasses = Klass::all();
        foreach ($klasses as $klass) {
            $randomeSections  = SectionYear::inRandomOrder()->limit(3)->get();
            foreach ($randomeSections as $randomSection) {
                $klass->sectionYears()->attach($randomSection->id);
                $users = User::factory(10)->create();
                foreach ($users as $user) {
                    $randomSection->users()->attach($user->id_number);
                    UserInfo::factory()->create(['user_id' => $user->id_number]);
                }
            }

        }

        $klasses = Klass::with('evaluatee')
        ->with(['sectionYears' => function($q){
            $q->with('users');
        }])
        ->get();

            foreach ($klasses as $klass) {

                foreach( $klass->sectionYears as $sy){
                    foreach($sy->users as $user){

                        $user->evaluatees()->syncWithoutDetaching($klass->evaluatee->id);
                    }

                }
            }


    }
}
