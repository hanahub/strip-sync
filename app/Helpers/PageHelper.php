<?php

namespace App\Helpers;

use App\Enums\PageEnum;
use App\Models\Page;

class PageHelper
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected $pages;

    /**
     * PageHelper constructor.
     */
    public function __construct()
    {
        $this->pages = Page::all();
    }

    /**
     * @return Page
     */
    public function stats()
    {
        return $this->findOrFailPage(PageEnum::STATS);
    }

    /**
     * @return Page
     */
    public function schedule()
    {
        return $this->findOrFailPage(PageEnum::SCHEDULES);
    }

    /**
     * @return Page
     */
    public function stage()
    {
        return $this->findOrFailPage(PageEnum::STAGE_APPEARANCES);
    }

    /**
     * @return Page
     */
    public function profiles()
    {
        return $this->findOrFailPage(PageEnum::PROFILES);
    }

    /**
     * @return Page
     */
    public function privateRooms()
    {
        return $this->findOrFailPage(PageEnum::PRIVATE_ROOMS);
    }

    /**
     * @param $pageSlug
     * @return Page
     * @throws \Exception
     */
    protected function findOrFailPage($pageSlug)
    {
        $page = $this->pages->first(function (Page $page) use ($pageSlug) {
            return $page->slug === $pageSlug;
        });

        if (! $page) {
            throw new \Exception($pageSlug);
        }

        return $page;
    }

}