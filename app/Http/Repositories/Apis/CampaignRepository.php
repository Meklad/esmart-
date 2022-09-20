<?php

namespace App\Http\Repositories\Apis;

use App\Models\Campaign;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Requests\Apis\Campaign\{
    CreateCampaignApiRequest,
    UpdateCampaignApiRequest
};
use Illuminate\Http\Request;

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
        $campaign = Campaign::create($request->except('images'));

        $campaign->addMultipleMediaFromRequest(['images'])
        ->each(function ($fileAdder) {
            /** @phpstan-ignore-next-line */
            $fileAdder->toMediaCollection('campaign');
        });

        return $campaign;
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

        if(!empty($request->images)) {
            $campaign->addMultipleMediaFromRequest(['images'])
            ->each(function ($fileAdder) {
                /** @phpstan-ignore-next-line */
                $fileAdder->toMediaCollection('campaign');
            });
        }

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

    /**
     * Delete specific images associated with this campaign using an array of image ids.
     *
     * @param Request $request
     * @return void
     */
    public function deleteCapmaignImages(Request $request) : void
    {
        $media = Media::whereIn("id", $request->images)->get();
        foreach ($media as $image) {
            $image->delete();
        }
    }
}
