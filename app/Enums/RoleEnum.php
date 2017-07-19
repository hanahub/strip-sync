<?php

namespace App\Enums;

class RoleEnum extends Enum
{
    const SUPER_ADMIN = 'super-admin';
    const ADMIN = 'admin';
    const DJ = 'dj';
    const ENTERTAINER = 'entertainer';
    const SECURITY = 'security';
    const PROMOTER = 'promoter';
    const BARTENDER = 'bartender';
    const SHOT_GIRL = 'shot-girl';
    const WAITRESS = 'waitress';
    const BOTTLE_SERVER = 'bottle-server';
    const VIP_ATTENDANT = 'vip-attendant';
    const STATION_DANCE = 'station-dance';
    const STATION_SHIFT = 'station-shift';
    const HOUSE_MOM = 'house-mom';
}