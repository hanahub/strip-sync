<?php

namespace App\Services;


use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\MusicPreference;
use App\Models\Nationality;
use App\Models\Role;
use App\Models\User;
use DB;

class UserService extends Service
{
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
            $user->role()->associate($role);
            $user->nationality()->associate($nationality);
            if ($eyeColor) $user->eyeColor()->associate($eyeColor);
            if ($hairColor) $user->hairColor()->associate($hairColor);

            foreach ($data['musicPreferences'] as $musicPreferenceData) {
                $musicPreference = new MusicPreference($musicPreferenceData);
                $musicPreference->user()->associate($user);
                $musicPreference->save();
            }

            $user->save();

            DB::commit();
        } catch (\Exception $exception) {
            $this->handleException($exception);
        }

        return $user;
    }
}
