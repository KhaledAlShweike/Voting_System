<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'position' => $this->faker->jobTitle,
            'last_position' => $this->faker->jobTitle,
            'jci_career' => $this->faker->paragraph,
            'category_id' => Category::all()->random()->id,  // Randomly assign a category
        ];
    }
}
