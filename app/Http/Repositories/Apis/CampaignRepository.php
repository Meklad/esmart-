<?php

namespace App\Http\Repositories\Apis;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CampaignRepository
{

    /**
     * Get all Campaigns order by created_at, and check if need pagination.
     *
     * @param bool $withPagination if true than will load the collection with pagination
     * @return Collection
     */
    public function all($withPagination = false) : Collection | LengthAwarePaginator
    {
        if($withPagination) {
            return Campaign::orderBy("created_at", "DESC")->paginate(5);
        }
        return Campaign::orderBy("created_at", "DESC")->get();
    }

    /**
     * Return Campaign using id
     *
     * @param integer $id campaign id
     * @return Campaign
     */
    public function find(int $id) : Campaign
    {
        return Campaign::findOrFail($id);
    }

    /**
     * Create new Campaign.
     *
     * @param Request $request
     * @return Campaign
     */
    public function create(Request $request) : Campaign
    {
        return Campaign::create($request->except('images'));
    }

    /**
     * Update Campaign.
     *
     * @param Campaign $campaign
     * @param Request $request
     * @return Campaign
     */
    public function update(Campaign $campaign, Request $request) : Campaign
    {
        $campaign->update($request->except('images'));
        return $campaign;
    }

    /**
     * Delete the Campaign from database, and return empty array.
     *
     * @param Campaign $campaign
     * @return array
     */
    public function delete(Campaign $campaign) : array
    {
        $campaign->delete();
        return [];
    }
}
