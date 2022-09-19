<?php

namespace App\Http\Controllers\Apis;

use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Apis\CampaignRepository;
use App\Http\Resources\Apis\CampaignResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\Apis\Campaign\{
    CreateCampaignApiRequest,
    UpdateCampaignApiRequest
};

class CampaignController extends Controller
{
    /**
     * Campaign Repository
     *
     * @var CampaignRepository
     */
    private CampaignRepository $_campaignRepository;

    /**
     * CampaignController Constuctor.
     *
     * @param CampaignRepository $campaignRepository
     * @return void
     */
    public function __construct(CampaignRepository $campaignRepository)
    {
        $this->_campaignRepository = $campaignRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        return CampaignResource::collection($this->_campaignRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCampaignApiRequest  $request
     * @return CampaignResource
     */
    public function store(CreateCampaignApiRequest $request) : CampaignResource
    {
        return new CampaignResource($this->_campaignRepository->create($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return CampaignResource
     */
    public function show(Campaign $campaign) : CampaignResource
    {
        return new CampaignResource($campaign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCampaignApiRequest  $request
     * @param  \App\Models\Campaign  $campaign
     * @return CampaignResource
     */
    public function update(UpdateCampaignApiRequest $request, Campaign $campaign) : CampaignResource
    {
        return new CampaignResource($this->_campaignRepository->update($campaign, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return CampaignResource
     */
    public function destroy(Campaign $campaign) : CampaignResource
    {
        $this->_campaignRepository->delete($campaign);
        return new CampaignResource([]);
    }
}
