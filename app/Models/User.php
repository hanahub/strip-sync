<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'stage_name',
        'address_street',
        'address_city',
        'address_state',
        'address_zip',
        'address_country',
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_tel_no',
        'emergency_contact_cell_no',
        'is_working_visa',
        'working_visa_expiry_date',
        'is_convicted',
        'convicted_details',
        'height',
        'weight',
        'bust_size',
        'waist_size',
        'contract',
    ];

    protected $casts = [
        'is_working_visa' => 'boolean',
        'is_convicted' => 'boolean',
    ];

    protected $dates = ['working_visa_expiry_date'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function musicPreferences()
    {
        return $this->hasMany(MusicPreference::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eyeColor()
    {
        return $this->belongsTo(EyeColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hairColor()
    {
        return $this->belongsTo(HairColor::class);
    }

    /**
     * @param $password
     * @return mixed
     */
    public function setPassword($password)
    {
        return $this->password = bcrypt($password);
    }
}
