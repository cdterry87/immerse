<?php

namespace App\Enums;

enum ManagerPermission: string
{
    case VIEW_EVENTS = 'view_events';
    case VIEW_DONATIONS = 'view_donations';
    case VIEW_DONATION_TYPES = 'view_donation_types';
    case VIEW_GROUPS = 'view_groups';
    case VIEW_LOCATIONS = 'view_locations';
    case VIEW_ORGANIZATION = 'view_organization';
    case VIEW_STAFF_MEMBERS = 'view_staff_members';
    case VIEW_MEDIA = 'view_media';
    case VIEW_TEAMS = 'view_teams';
    case VIEW_TEAM_ROLES = 'view_team_roles';
    case VIEW_MANAGER_USERS = 'view_manager_users';

    case MANAGE_EVENTS = 'manage_events';
    case MANAGE_DONATIONS = 'manage_donations';
    case MANAGE_DONATION_TYPES = 'manage_donation_types';
    case MANAGE_GROUPS = 'manage_groups';
    case MANAGE_LOCATIONS = 'manage_locations';
    case MANAGE_ORGANIZATION = 'manage_organization';
    case MANAGE_STAFF_MEMBERS = 'manage_staff_members';
    case MANAGE_MEDIA = 'manage_media';
    case MANAGE_TEAMS = 'manage_teams';
    case MANAGE_TEAM_ROLES = 'manage_team_roles';
    case MANAGE_MANAGER_USERS = 'manage_manager_users';

    case DELETE_EVENTS = 'delete_events';
    case DELETE_DONATIONS = 'delete_donations';
    case DELETE_DONATION_TYPES = 'delete_donation_types';
    case DELETE_GROUPS = 'delete_groups';
    case DELETE_LOCATIONS = 'delete_locations';
    case DELETE_STAFF_MEMBERS = 'delete_staff_members';
    case DELETE_TEAMS = 'delete_teams';
    case DELETE_TEAM_ROLES = 'delete_team_roles';
    case DELETE_MANAGER_USERS = 'delete_manager_users';

    public function label(): string
    {
        return match ($this) {
            self::VIEW_EVENTS => 'Can view Events',
            self::VIEW_DONATIONS => 'Can view Donations',
            self::VIEW_DONATION_TYPES => 'Can view Donation Types',
            self::VIEW_GROUPS => 'Can view Groups',
            self::VIEW_LOCATIONS => 'Can view Locations',
            self::VIEW_ORGANIZATION => 'Can view Organization details',
            self::VIEW_STAFF_MEMBERS => 'Can view Staff Members',
            self::VIEW_MEDIA => 'Can view Media',
            self::VIEW_TEAMS => 'Can view Teams',
            self::VIEW_TEAM_ROLES => 'Can view Team Roles',
            self::VIEW_MANAGER_USERS => 'Can view Manager Users',

            self::MANAGE_EVENTS => 'Can manage Events',
            self::MANAGE_DONATIONS => 'Can manage Donations',
            self::MANAGE_DONATION_TYPES => 'Can manage Donation Types',
            self::MANAGE_GROUPS => 'Can manage Groups',
            self::MANAGE_LOCATIONS => 'Can manage Locations',
            self::MANAGE_ORGANIZATION => 'Can manage Organization details',
            self::MANAGE_STAFF_MEMBERS => 'Can manage Staff Members',
            self::MANAGE_MEDIA => 'Can manage Media',
            self::MANAGE_TEAMS => 'Can manage Teams',
            self::MANAGE_TEAM_ROLES => 'Can manage Team Roles',
            self::MANAGE_MANAGER_USERS => 'Can manage Manager Users',

            self::DELETE_EVENTS => 'Can delete Events',
            self::DELETE_DONATIONS => 'Can delete Donations',
            self::DELETE_DONATION_TYPES => 'Can delete Donation Types',
            self::DELETE_GROUPS => 'Can delete Groups',
            self::DELETE_LOCATIONS => 'Can delete Locations',
            self::DELETE_STAFF_MEMBERS => 'Can delete Staff Members',
            self::DELETE_TEAMS => 'Can delete Teams',
            self::DELETE_TEAM_ROLES => 'Can delete Team Roles',
            self::DELETE_MANAGER_USERS => 'Can delete Manager Users',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $permission) => [
                $permission->value => $permission->label(),
            ])
            ->toArray();
    }
}
