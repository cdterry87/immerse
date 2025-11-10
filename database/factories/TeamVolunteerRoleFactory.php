<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamVolunteerRole>
 */
class TeamVolunteerRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team_volunteer_id' => \App\Models\TeamVolunteer::factory(),
            'team_role_id' => \App\Models\TeamRole::factory(),
        ];
    }
}
