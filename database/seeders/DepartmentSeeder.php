<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Evaluatee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $deparments = ['bsit','beed','bshrm','guard','canteen-staff'];
            foreach($deparments as $deparment){
                Department::create(['department'=> $deparment]);
            }

       $users = User::all();
       $evaluatees = Evaluatee::all();



       foreach($users as $user){
        $randomDepartment = Department::inRandomOrder()->first();
        $user->departments()->attach($randomDepartment->id);
       }
       foreach($evaluatees as $evaluatee){
            if($evaluatee->roles[0]->name === 'instructor'){
                $department = Department::all()->except([4,5]);
                $randomDepartment = $department->random();
                $evaluatee->departments()->attach($randomDepartment->id);
            }else{
                $department = Department::all()->except([1,2,3]);
                $randomDepartment = $department->random();
                $evaluatee->departments()->attach($randomDepartment->id);
            }

       }

    }
}
