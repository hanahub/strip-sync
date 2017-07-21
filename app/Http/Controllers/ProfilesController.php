<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileSave;
use App\Models\Contract;
use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\Nationality;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * ProfilesController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('profiles.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        $roles = Role::enabled()->get();

        $nationalities = Nationality::all();

        $eyeColors = EyeColor::all();
        $hairColors = HairColor::all();

        $contracts = Contract::all();

        return view(
            'profiles.create',
            compact('user', 'roles', 'nationalities', 'eyeColors', 'hairColors', 'contracts')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfileSave $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileSave $request)
    {
        $eyeColor = $request->has('eye_color_id') ? EyeColor::findOrFail($request->get('eye_color_id')) : null;
        $hairColor = $request->has('hair_color_id') ? HairColor::findOrFail($request->get('hair_color_id')) : null;

        return $this->userService->store(
            $request->all(),
            Role::findOrFail($request->get('role_id')),
            Nationality::findOrFail($request->get('nationality_id')),
            $eyeColor,
            $hairColor
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
