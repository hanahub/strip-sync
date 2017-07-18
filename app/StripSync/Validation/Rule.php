<?php

namespace App\StripSync\Validation;

use App\StripSync\Validation\Rules\RequiredIf;
use Illuminate\Support\Traits\Macroable;

class Rule extends \Illuminate\Validation\Rule
{
    /**
     * Get a unique constraint builder instance.
     *
     * @param string $column
     * @param $value
     * @return RequiredIf
     */
    public static function requiredIf(string $column, $value)
    {
        return new Rules\RequiredIf($column, $value);
    }

    /**
     * @return string
     */
    public static function time()
    {
        return 'date_format:H:i';
    }
}
