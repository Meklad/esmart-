<?php

namespace App\Http\Controllers\Apis;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Apis\CampaignRepository;
use App\Http\Resources\Apis\CampaignResource;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CampaignResource::collection($this->_campaignRepository->all(true));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCampaignApiRequest $request)
    {
        return new CampaignResource($this->_campaignRepository->create($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        return new CampaignResource($campaign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignApiRequest $request, Campaign $campaign)
    {
        return new CampaignResource($this->_campaignRepository->update($campaign, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        return new CampaignResource($this->_campaignRepository->delete($campaign));
    }
}
