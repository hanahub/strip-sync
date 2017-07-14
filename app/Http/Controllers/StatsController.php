<?php

namespace App\Http\Controllers;

use App\Enums\PageEnum;
use App\Models\Page;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function __construct()
    {
        // ToDo: check available it by Page is_enable field

        Page::statsPage()->isEnabled();
    }


    public function index()
    {

    }
}
