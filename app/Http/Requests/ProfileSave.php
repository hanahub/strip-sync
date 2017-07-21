<?php

namespace App\Http\Requests;

use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\Nationality;
use App\Models\Role;
use App\Models\User;
use App\StripSync\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileSave extends FormRequest
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
            'role_id' => ['required', Rule::exists((new Role())->getTable(), 'id')->where('is_enabled', true)],

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique((new User())->getTable())
                    ->ignore($this->profile ? $this->profile->id : '')
            ],
            'password' => 'max:255|confirmed' . ($this->profile ? '' : '|required'),
            'phone' => '',
            'pin_code' => 'nullable|digits:4',
            'stage_name' => 'required|string|max:255',

            'avatar' => ['image', 'max:10000'],

            'address_street' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_state' => 'nullable|string|max:255',
            'address_zip' => 'nullable|string|max:255',
            'address_country' => 'nullable|string|max:255',

            'nationality_id' => [Rule::exists((new Nationality())->getTable(), 'id')],

            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_relationship' => 'nullable|string|max:255',
            'emergency_contact_tel_no' => 'nullable|string|max:255',
            'emergency_contact_cell_no' => 'nullable|string|max:255',

            'is_working_visa' => 'boolean',
            'working_visa_expiry_date' => 'nullable|required_if:is_working_visa,true|date',

            'is_convicted' => 'boolean',
            'convicted_details' => 'nullable|required_if:is_convicted,true',

            'height' => 'nullable|numeric|between:0,96',
            'weight' => 'nullable|numeric',

            'bust_size' => 'nullable|numeric',
            'waist_size' => 'nullable|numeric',

            'eye_color_id' => ['nullable', Rule::exists((new EyeColor())->getTable(), 'id')],
            'hair_color_id' => ['nullable', Rule::exists((new HairColor())->getTable(), 'id')],

            'contract' => 'nullable',
        ];
    }
}
