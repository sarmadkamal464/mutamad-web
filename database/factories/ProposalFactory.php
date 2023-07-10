<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $freelancer = User::freelancer()->pluck('id')->toArray();
        $client = User::client()->pluck('id')->toArray();
        $project = Project::open()->pluck('id')->toArray();
        return [
            'project_id' => Arr::random($project),
            'freelancer_id' => $id = Arr::random($freelancer),
            'description' => $this->faker->paragraph,
            'amount' => 0,
            'proposal_type' => 'proposal',
            'status' => 'pending',
            'status_change_by_user' => 'freelancer',
            'status_change_by_user_id' => $id,
        ];
        // return [
        //     'project_id' => Arr::random($project),
        //     'freelancer_id' => $id = Arr::random($freelancer),
        //     'description' => $this->faker->paragraph,
        //     'amount' => 0,
        //     'proposal_type' => 'invitation',
        //     'status' => 'pending',
        //     'status_change_by_user' => 'client',
        //     'status_change_by_user_id' => Arr::random($client),
        // ];
    }
}
