<?php

namespace App\Services;

use App\Models\MusicPreference;
use App\Models\User;

class MusicPreferenceService extends Service
{
    /**
     * @param User $user
     * @param array $data
     * @return MusicPreference
     */
    public function store(User $user, array $data)
    {
        $musicPreference = new MusicPreference($data);
        $musicPreference->user()->associate($user);
        $musicPreference->save();

        return $musicPreference;
    }

    /**
     * @param MusicPreference $musicPreference
     * @param array $data
     * @return MusicPreference
     */
    public function update(MusicPreference $musicPreference, array $data)
    {
        $musicPreference->update($data);

        return $musicPreference;
    }

    /**
     * @param User $user
     * @param array $musicPreferences
     */
    public function storeOrUpdateMany(User $user, array $musicPreferences)
    {
        foreach ($musicPreferences as $musicPreference) {
            $this->storeOrUpdate($user, $musicPreference);
        }
    }

    /**
     * @param array $data
     * @return MusicPreference|null
     */
    public function storeOrUpdate($user, array $data)
    {
        if ($this->needStore($data)) {
            return $this->store($user, $data);
        }

        /** @var MusicPreference $musicPreference */
        $musicPreference = MusicPreference::find($data['id']);

        if ($this->needDelete($data)) {
            return $this->delete($musicPreference);
        }

        return $this->update($musicPreference, $data);

    }

    /**
     * @param MusicPreference $musicPreference
     */
    public function delete(MusicPreference $musicPreference)
    {
        $musicPreference->delete();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function needStore(array $data)
    {
        return ! (array_key_exists('id', $data) && $data['id']);
    }

    /**
     * @param $data
     * @return bool
     */
    protected function needDelete($data)
    {
        return array_key_exists('is_delete', $data);
    }
}