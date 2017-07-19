<?php

use App\Enums\PermissionEnum;
use App\Services\RoleService;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    protected $roles = [
        [
            'Super Admin',
            \App\Enums\RoleEnum::SUPER_ADMIN,
            [
                PermissionEnum::SCHEDULE_MANAGE,
                PermissionEnum::STATS_REVIEW,
                PermissionEnum::HISTORY_REVIEW,
            ],
            true
        ],
        [
            'Admin',
            \App\Enums\RoleEnum::ADMIN,
            [
                PermissionEnum::SCHEDULE_MANAGE,
                PermissionEnum::STATS_REVIEW,
                PermissionEnum::HISTORY_REVIEW,
            ],
            true
        ],
        [
            'Dj',
            \App\Enums\RoleEnum::DJ,
            [],
            true
        ],
        [
            'Entertainer',
            \App\Enums\RoleEnum::ENTERTAINER,
            [],
            true
        ],
        [
            'Security',
            \App\Enums\RoleEnum::SECURITY,
            [],
            true
        ],
        [
            'Promoter',
            \App\Enums\RoleEnum::PROMOTER,
            [],
            true
        ],
        [
            'Bartender',
            \App\Enums\RoleEnum::BARTENDER,
            [],
            true
        ],
        [
            'Shot Girl',
            \App\Enums\RoleEnum::SHOT_GIRL,
            [],
            true
        ],
        [
            'Waitress',
            \App\Enums\RoleEnum::WAITRESS,
            [],
            true
        ],
        [
            'Bottle Server',
            \App\Enums\RoleEnum::BOTTLE_SERVER,
            [],
            true
        ],
        [
            'Vip Attendant',
            \App\Enums\RoleEnum::VIP_ATTENDANT,
            [],
            true
        ],
        [
            'Station Dance',
            \App\Enums\RoleEnum::STATION_DANCE,
            [],
            true
        ],
        [
            'Station Shift',
            \App\Enums\RoleEnum::STATION_SHIFT,
            [],
            true
        ],
        [
            'House Mom',
            \App\Enums\RoleEnum::HOUSE_MOM,
            [
                PermissionEnum::STATS_REVIEW,
            ],
            true
        ],
    ];

    /**
     * @var RoleService
     */
    private $roleService;

    /**
     * RolesTableSeeder constructor.
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            $this->roleService->store([
                'title' => $role[0],
                'slug' => $role[1],
                'permissions' => $role[2],
                'is_enabled' => $role[3],
            ]);
        }
    }
}
