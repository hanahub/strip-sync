<?php

namespace App\Services;


use App\Models\Page;
use DB;
use Exception;

class PageService extends Service
{
    /**
     * @param array $data
     * @return Page
     */
    public function store(array $data): Page
    {
        try {
            DB::beginTransaction();

            /** @var Page $page */
            $page = Page::create($data);

            DB::commit();
        } catch (Exception $exception) {
            $this->handleException($exception);
        }

        return $page;
    }

    /**
     * @param array $pages
     */
    public function toggleEnablingOnPagesIfRequired(array $pages)
    {
        foreach ($pages as $pageData) {
            /** @var Page $page */
            $page = Page::find($pageData['id']);

            if ($page->isEnabled() !== (bool)$pageData['is_enabled']) {
                $page->toggleOfEnabling()
                    ->save();
            }
        }
    }
}