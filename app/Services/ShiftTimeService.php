<?php

namespace App\Services;


use App\Models\ShiftTime;

class ShiftTimeService extends Service
{
    public function store(array $data)
    {
        return ShiftTime::create($data);
    }

    public function update(ShiftTime $shiftTime, array $data)
    {
        $shiftTime->update($data);

        return $shiftTime;
    }

    /**
     * @param array $shiftTimes
     */
    public function storeOrUpdateMany(array $shiftTimes)
    {
        foreach ($shiftTimes as $shiftTime) {
            $this->storeOrUpdate($shiftTime);
        }
    }

    /**
     * @param array $data
     * @return ShiftTime|null
     */
    public function storeOrUpdate(array $data)
    {
        if ($this->needStore($data)) {
            return $this->store($data);
        }

        /** @var ShiftTime $shiftTime */
        $shiftTime = ShiftTime::find($data['id']);

        if ($this->needDelete($data)) {
            return $this->delete($shiftTime);
        }

        return $this->update($shiftTime, $data);

    }

    /**
     * @param ShiftTime $shiftTime
     */
    public function delete(ShiftTime $shiftTime)
    {
        $shiftTime->delete();
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