<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course = fake()->randomElement(['BSIT','BEED','BSHRM']);
        return [
            'first_name' =>fake()->firstName(),
            'middle_name' =>fake()->firstName(),
            'last_name'=>fake()->lastName(),
            'year' => fake()->year,
            'section' => fake()->randomElement(['A','B','C']),
            'mobile_number' => fake()->numerify('###########'),
            'course'=>   $course,
            'department'=>  $course == 'BSIT' ? 'IT':  ($course == 'BEED' ? 'ED': 'HRM'),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
        ];
    }
}
