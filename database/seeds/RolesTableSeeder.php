<?php

use App\Enums\PermissionEnum;
use App\Services\RoleService;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    protected $roles = [
        [
            'Super Admin',
            [
                PermissionEnum::SCHEDULE_MANAGE,
                PermissionEnum::STATS_REVIEW,
                PermissionEnum::HISTORY_REVIEW,
            ],
            true
        ],
        [
            'Admin',
            [
                PermissionEnum::SCHEDULE_MANAGE,
                PermissionEnum::STATS_REVIEW,
                PermissionEnum::HISTORY_REVIEW,
            ],
            true
        ],
        [
            'Dj',
            [],
            true
        ],
        [
            'Entertainer',
            [],
            true
        ],
        [
            'Security',
            [],
            true
        ],
        [
            'Promoter',
            [],
            true
        ],
        [
            'Bartender',
            [],
            true
        ],
        [
            'Shot Girl',
            [],
            true
        ],
        [
            'Waitress',
            [],
            true
        ],
        [
            'Bottle Server',
            [],
            true
        ],
        [
            'Vip Attendant',
            [],
            true
        ],
        [
            'Station Dance',
            [],
            true
        ],
        [
            'Station Shift',
            [],
            true
        ],
        [
            'House Mom',
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
                'permissions' => $role[1],
                'is_enabled' => $role[2],
            ]);
        }
    }
}
