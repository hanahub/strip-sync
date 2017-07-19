<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettings;
use App\Models\Contract;
use App\Models\Page;
use App\Models\Role;
use App\Models\ShiftTime;
use App\Models\Venue;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * SettingsController constructor.
     * @param SettingService $settingService
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $venue = Venue::first();

        $shiftTimes = ShiftTime::all(['id', 'start', 'end']);
        $pages = Page::all(['id', 'slug', 'is_enabled']);
        $roles = Role::get(['id', 'slug','is_enabled']);
        $contracts = Contract::all();

        return view('settings.index', compact('venue', 'shiftTimes', 'pages', 'roles', 'contracts'));
    }

    /**
     * @param UpdateSettings $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSettings $request)
    {
        // ToDo: manage contracts
        $this->settingService->update(
            $request->except('shiftTimes', 'roles', 'pages', 'contracts'),
            $request->get('shiftTimes'),
            $request->get('roles'),
            $request->get('pages')
        );

        return response()->json();
    }
}
