<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SectionYear>
 */
class SectionYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sections_years =[
            '1-A','1-B','1-C','1-D','1-E','1-F',
            '2-A','2-B','2-C','2-D','2-E','2-F',
            '3-A','3-B','3-C','3-D','3-E','3-F',
            '4-A','4-B','4-C','4-D','4-E','4-F',
        ];
        return [
            's_y' => fake()->randomElement($sections_years),
        ];
    }
}
