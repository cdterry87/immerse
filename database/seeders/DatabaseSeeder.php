<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\TeamRole;
use App\Models\UserMember;
use App\Models\UserManager;
use App\Models\Organization;
use App\Models\TeamVolunteer;
use App\Models\UserVolunteer;
use Illuminate\Database\Seeder;
use App\Enums\ManagerPermission;
use App\Models\TeamVolunteerRole;
use App\Models\UserAdministrator;
use App\Models\OrganizationMember;
use Illuminate\Support\Facades\Hash;
use App\Models\OrganizationVolunteer;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedManagerPermissions();

        // Create an administrator
        UserAdministrator::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create an organization
        $organization = Organization::factory()->create([
            'name' => 'Demo Church',
            'description' => 'A welcoming community church.',
        ]);

        // Create a manager for the organization
        $manager = UserManager::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'organization_id' => $organization->id,
        ]);

        // Create a team
        $team = Team::factory()->create([
            'organization_id' => $organization->id,
            'name' => 'Tech Team',
        ]);

        // Add a role to the team
        $teamRole = TeamRole::factory()->create([
            'team_id' => $team->id,
            'name' => 'Coordinator',
        ]);

        // Create a volunteer user
        $volunteer = UserVolunteer::factory()->create([
            'name' => 'Volunteer User',
            'email' => 'volunteer@example.com',
            'password' => Hash::make('password'),
        ]);

        // Associate the volunteer to the organization
        OrganizationVolunteer::factory()->create([
            'organization_id' => $organization->id,
            'user_volunteer_id' => $volunteer->id,
        ]);

        // Assign the volunteer to the team
        $teamVolunteer = TeamVolunteer::factory()->create([
            'team_id' => $team->id,
            'user_volunteer_id' => $volunteer->id,
        ]);

        // Give the volunteer a role
        TeamVolunteerRole::factory()->create([
            'team_volunteer_id' => $teamVolunteer->id,
            'team_role_id' => $teamRole->id,
        ]);

        // Create a member for the organization
        $member = UserMember::factory()->create([
            'name' => 'Member User',
            'email' => 'member@example.com',
            'password' => Hash::make('password'),
        ]);

        // Associate the member to the organization
        OrganizationMember::factory()->create([
            'organization_id' => $organization->id,
            'user_member_id' => $member->id,
        ]);
    }

    private function seedManagerPermissions(): void
    {
        foreach (ManagerPermission::cases() as $permission) {
            Permission::firstOrCreate([
                'name' => $permission->value,
                'guard_name' => 'manager',
            ]);
        }
    }
}
