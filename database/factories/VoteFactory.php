<?php

namespace Database\Factories;

use App\Models\Vote;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoteFactory extends Factory
{
    protected $model = Vote::class;

    public function definition()
    {
        return [
            'user_id' => User::where('role', 'client')->get()->random()->id,
            'candidate_id' => Candidate::all()->random()->id,
            'category_id' => Candidate::find($this->faker->randomElement(Candidate::pluck('id')))->category_id,
        ];
    }
}
