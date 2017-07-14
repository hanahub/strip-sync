<?php

use App\Enums\PageEnum;
use App\Services\PageService;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $pages = [
        ['Stage Appearances', PageEnum::STAGE_APPEARANCES],
        ['Private Rooms', PageEnum::PRIVATE_ROOMS],
        ['Profiles', PageEnum::PROFILES],
        ['Schedules', PageEnum::SCHEDULES],
        ['Inventory', PageEnum::INVENTORY],
        ['Transactions', PageEnum::TRANSACTIONS],
        ['Stats', PageEnum::STATS],
        ['User Actions', PageEnum::USER_ACTIONS],
    ];

    /**
     * @var PageService
     */
    private $pageService;

    /**
     * PagesTableSeeder constructor.
     * @param PageService $pageService
     */
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->pages as $page) {
            $this->pageService->store([
                'title' => $page[0],
                'slug' => $page[1],
            ]);
        }
    }
}
