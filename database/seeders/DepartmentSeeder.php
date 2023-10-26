<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deparments = ['BSIT','BEED','BSHRM','ADMIN','STAFF'];
       foreach($deparments as $deparment){
        Department::create(['department'=> $deparment]);
       }

       $users = User::all();
       $instructors = Instructor::all();

       foreach( $instructors as $instructor){
        $department = Department::all()->except([4,5]);
        $randomDepartment = $department->random();
        $instructor->departments()->attach($randomDepartment->id);
       }

       foreach($users as $user){
        $randomDepartment = Department::inRandomOrder()->first();
        $user->departments()->attach($randomDepartment->id);
       }


    }
}
