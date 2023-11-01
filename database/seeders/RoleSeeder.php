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
        $roles = ['admin','staff','instructor','student','guard','chairperson'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $users = User::all();
        $evaluatees = Evaluatee::all();

        $roleForStudent = Role::where('name','student')->first();
        $roleForGuard = Role::where('name','guard')->first();
        $roleForInstructor = Role::where('name','instructor')->first();
        $roleForStaff = Role::where('name','staff')->first();
        $roleForAdmin = Role::where('name','admin')->first();
        $roleForChairperson = Role::where('name','chairperson')->first();

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


        $admin = User::factory()->create(['id_number' => 11111]);
        $admin ->roles()->attach($roleForAdmin->id);
        $staff = User::factory()->create(['id_number' => 22222]);
        $staff->roles()->attach($roleForStaff->id);
        $chairperson = User::factory()->create(['id_number' => 33333]);
        $chairperson->roles()->attach($roleForChairperson->id);
    }
}
