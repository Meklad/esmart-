<?php

namespace App\Http\Repositories\Apis;

use App\Models\Campaign;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Apis\Campaign\{
    CreateCampaignApiRequest,
    UpdateCampaignApiRequest
};

class CampaignRepository
{

    /**
     * Get all Campaigns order by created_at, and check if need pagination.
     *
     * @return LengthAwarePaginator
     */
    public function all() : LengthAwarePaginator
    {
        return Campaign::orderBy("created_at", "DESC")->paginate(5);
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
     * @param CreateCampaignApiRequest $request
     * @return Campaign
     */
    public function create(CreateCampaignApiRequest $request) : Campaign
    {
        return Campaign::create($request->except('images'));
    }

    /**
     * Update Campaign.
     *
     * @param Campaign $campaign
     * @param UpdateCampaignApiRequest $request
     * @return Campaign
     */
    public function update(Campaign $campaign, UpdateCampaignApiRequest $request) : Campaign
    {
        $campaign->update($request->except('images'));
        return $campaign;
    }

    /**
     * Delete the Campaign from database, and return empty array.
     *
     * @param Campaign $campaign
     * @return void
     */
    public function delete(Campaign $campaign) : void
    {
        $campaign->delete();
    }
}
