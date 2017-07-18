<?php

namespace App\Services;

use App\Models\Role;
use DB;
use Exception;

class RoleService extends Service
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            $role = Role::create($data);

            DB::commit();
        } catch (Exception $exception) {
            $this->handleException($exception);
        }

        return $role;
    }

    /**
     * @param array $roles
     */
    public function toggleEnablingOnRolesIfRequired(array $roles)
    {
        foreach ($roles as $roleData) {
            /** @var Role $role */
            $role = Role::find($roleData['id']);

            if ($role->isEnabled() !== (bool)$roleData['is_enabled']) {
                $role->toggleOfEnabling()
                    ->save();
            }
        }
    }
}