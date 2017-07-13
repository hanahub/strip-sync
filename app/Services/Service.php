<?php

namespace App\Services;

use App\Exceptions\ActionFailedException;
use DB;
use Exception;
use Log;

abstract class Service
{
    /**
     * @param Exception $exception
     * @param $message
     * @param bool $withLog
     * @throws ActionFailedException
     */
    protected function handleException(Exception $exception, $message = null, $withLog = true)
    {
        DB::rollBack();

        if ($withLog) {
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
        }

        throw new ActionFailedException($message ?: $exception->getMessage(), $exception->getCode(), $exception);
    }
}
