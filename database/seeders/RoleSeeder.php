<?php

namespace Database\Seeders;

use App\Models\Evaluatee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','stuff','instructor','student','guard'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $users = User::all();
        $evaluatees = Evaluatee::all();

        $roleForStudent = Role::where('name','student')->first();
        $roleForGuard = Role::where('name','guard')->first();
        $roleForInstructor = Role::where('name','instructor')->first();
        // $roleForStaff = Role::where('name','stuff')->first();
        // $roleForAdmin = Role::where('name','admin')->first();


        foreach ($users as $user) {
            $user->roles()->attach($roleForStudent->id);
        }

        foreach ($evaluatees as $key => $evaluatee) {

            if( $key > 15){
                $evaluatee->roles()->attach($roleForGuard->id);
            }else{
                $evaluatee->roles()->attach($roleForInstructor->id);
            }
        }


        // User::factory(1)->create(['id_number' => 11111,'name'=>'ADMIN'])->each(function($user)  use($roleForAdmin){
        //     $user->roles()->attach($roleForAdmin->id);
        // });

        // User::factory(1)->create(['id_number' => 22222,'name'=>'STUFF'])->each(function($user)  use($roleForStaff){
        //     $user->roles()->attach($roleForStaff->id);
        // });

    }
}
