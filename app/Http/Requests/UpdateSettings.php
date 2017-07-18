<?php

namespace App\Http\Requests;

use App\Enums\OperatingHoursType;
use App\Models\Page;
use App\Models\Role;
use App\Models\ShiftTime;
use App\StripSync\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'legal_business_name' => 'required|string|max:255',
            'president_name' => 'required|string|max:255',
            'legal_business_address' => 'required|string|max:255',
            'physical_venue_address' => 'required|string|max:255',
            'operating_hours_type' => [
                'required',
                Rule::in(OperatingHoursType::getConstants())
            ],
            'operating_hours_open' => [
                'nullable',
                Rule::requiredIf('operating_hours_type', OperatingHoursType::SPECIFIC),
                Rule::time(),
            ],
            'operating_hours_close' => [
                'nullable',
                Rule::requiredIf('operating_hours_type', OperatingHoursType::SPECIFIC),
                Rule::time(),
            ],

            'house_fee' => 'required|numeric|min:0',
            'stage_fee' => 'required|numeric|min:0',
            'standard_cover_cost' => 'required|numeric|min:0',
            'simultaneous_performers' => 'required|numeric|min:0',
            'default_song_duration' => 'required|numeric|between:0,10',
            'default_dance_price' => 'required|numeric|min:0',

            'entertainers_count' => 'required|between:0,1000',
            'bartenders_count' => 'required|between:0,1000',
            'shot_girls_count' => 'required|between:0,1000',
            'waitress_count' => 'required|between:0,1000',
            'bottle_servers_count' => 'required|between:0,1000',
            'djs_count' => 'required|between:0,1000',
            'security_count' => 'required|between:0,1000',
            'promoters_count' => 'required|between:0,1000',

            'shiftTimes' => 'array',
            'shiftTimes.*.id' => [Rule::exists((new ShiftTime)->getTable(), 'id')],
            'shiftTimes.*.start' => ['required', Rule::time()],
            'shiftTimes.*.end' => ['required', Rule::time()],
            'shiftTimes.*.is_delete' => 'boolean',

            'pages' => 'required|array',
            'pages.*.id' => ['required', Rule::exists((new Page())->getTable(), 'id')],
            'pages.*.is_enabled' => 'required|boolean',

            'roles' => 'required|array',
            'roles.*.id' => ['required', Rule::exists((new Role())->getTable(), 'id')],
            'roles.*.is_enabled' => 'required|boolean',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'shiftTimes.*.start' => 'shift start time',
            'shiftTimes.*.end' => 'shift end time',
        ];
    }


}
