<?php

namespace App\Services;


use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\MusicPreference;
use App\Models\Nationality;
use App\Models\Role;
use App\Models\User;
use DB;
use Exception;

class UserService extends Service
{
    /**
     * @var MusicPreferenceService
     */
    private $musicPreferenceService;

    /**
     * UserService constructor.
     * @param MusicPreferenceService $musicPreferenceService
     */
    public function __construct(MusicPreferenceService $musicPreferenceService)
    {
        $this->musicPreferenceService = $musicPreferenceService;
    }


    /**
     * @param array $data
     * @param Role $role
     * @param Nationality $nationality
     * @param EyeColor|null $eyeColor
     * @param HairColor|null $hairColor
     * @return User
     */
    public function store(
        array $data,
        Role $role,
        Nationality $nationality,
        EyeColor $eyeColor = null,
        HairColor $hairColor = null
    )
    {
        try {
            DB::beginTransaction();

            $user = new User($data);
            $user->setPassword($data['password']);

            $user->role()->associate($role);
            $user->nationality()->associate($nationality);
            if ($eyeColor) $user->eyeColor()->associate($eyeColor);
            if ($hairColor) $user->hairColor()->associate($hairColor);

            $this->musicPreferenceService->storeOrUpdateMany($user, $data['music_preferences']);

            $user->save();

            DB::commit();
        } catch (Exception $exception) {
            $this->handleException($exception);
        }

        return $user;
    }

    /**
     * @param User $user
     * @param array $data
     * @param Role $role
     * @param Nationality $nationality
     * @param EyeColor|null $eyeColor
     * @param HairColor|null $hairColor
     * @return User
     */
    public function update(
        User $user,
        array $data,
        Role $role,
        Nationality $nationality,
        EyeColor $eyeColor = null,
        HairColor $hairColor = null)
    {
        try {
            DB::beginTransaction();

            $user->update($data);
            if ($password = $data['password']) {
                $user->setPassword($password);
            }

            $user->role()->associate($role);
            $user->nationality()->associate($nationality);

            if ($eyeColor) {
                $user->eyeColor()->associate($eyeColor);
            } else {
                $user->eyeColor()->dissociate();
            }

            if ($hairColor) {
                $user->hairColor()->associate($hairColor);
            } else {
                $user->hairColor()->dissociate();
            }

            $this->musicPreferenceService->storeOrUpdateMany($user, $data['music_preferences']);

            $user->save();

            DB::commit();
        } catch (Exception $exception) {
            $this->handleException($exception);
        }

        return $user;
    }

    /**
     * @param User $user
     */
    public function delete(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();
        } catch (Exception $exception) {
            $this->handleException($exception);
        }
    }
}
