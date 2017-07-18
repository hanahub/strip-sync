<?php

namespace App\Services;


use App\Models\Page;
use App\Models\Role;
use DB;
use Exception;

class SettingService extends Service
{
    /**
     * @var VenueService
     */
    private $venueService;

    /**
     * @var RoleService
     */
    private $roleService;

    /**
     * @var PageService
     */
    private $pageService;

    /**
     * @var ShiftTimeService
     */
    private $shiftTimeService;

    /**
     * SettingService constructor.
     * @param VenueService $venueService
     * @param RoleService $roleService
     * @param PageService $pageService
     * @param ShiftTimeService $shiftTimeService
     */
    public function __construct(VenueService $venueService, RoleService $roleService, PageService $pageService, ShiftTimeService $shiftTimeService)
    {
        $this->venueService = $venueService;
        $this->roleService = $roleService;
        $this->pageService = $pageService;
        $this->shiftTimeService = $shiftTimeService;
    }

    /**
     * @param array $venueData
     * @param array $shiftTimes
     * @param array $roles
     * @param array $pages
     * @internal param array $data
     */
    public function update(array $venueData, array $shiftTimes, array $roles, array $pages)
    {
        try {
            DB::beginTransaction();

            $this->venueService->update($venueData);

            $this->roleService->toggleEnablingOnRolesIfRequired($roles);
            $this->pageService->toggleEnablingOnPagesIfRequired($pages);

            // Store, update or delete shift times
            $this->shiftTimeService->storeOrUpdateMany($shiftTimes);

            DB::commit();
        } catch (Exception $exception) {
            $this->handleException($exception);
        }
    }
}