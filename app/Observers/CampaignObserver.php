<?php

namespace App\Observers;

use App\Models\Campaign;
use Cache;

class CampaignObserver
{
    /**
     * Clean The cache.
     *
     * @return void
     */
    private function _clearCache() : void
    {
        for ($page=1; $page <= 100; $page++) {
            $paginationKeyInRedis = "campaigns-page-" . $page;
            if(Cache::has($paginationKeyInRedis)) {
                Cache::forget($paginationKeyInRedis);
            } else {
                break;
            }
        }
    }

    /**
     * Handle the Campaign "created" event.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return void
     */
    public function created(Campaign $campaign) : void
    {
        $this->_clearCache();
    }

    /**
     * Handle the Campaign "updated" event.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return void
     */
    public function updated(Campaign $campaign) : void
    {
        $this->_clearCache();
    }

    /**
     * Handle the Campaign "deleted" event.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return void
     */
    public function deleted(Campaign $campaign) : void
    {
        $this->_clearCache();
    }
}
