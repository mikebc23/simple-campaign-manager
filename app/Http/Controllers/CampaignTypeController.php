<?php

namespace App\Http\Controllers;

use App\CampaignType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaign_types = CampaignType::query('deleted_at',null)->paginate(8);
        return view('admin.campaign_type.index')
            ->with('campaign_types', $campaign_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaign_type.create')
            ->with('campaign_type', (new CampaignType()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campaign_type = CampaignType::create($request->input());
        return redirect()->action('CampaignTypeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CampaignType  $campaignType
     * @return \Illuminate\Http\Response
     */
    public function show(CampaignType $campaignType)
    {
        dd($campaignType);
        return view('admin.campaign_type.show', ['campaign_type' => $campaignType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CampaignType  $campaignType
     * @return \Illuminate\Http\Response
     */
    public function edit(CampaignType $campaignType)
    {
        return view('admin.campaign_type.edit')
            ->with('campaign_type', $campaignType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CampaignType  $campaignType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampaignType $campaignType)
    {
        $campaignType->fill($request->input());
        $campaignType->save();
        return redirect()->action('CampaignTypeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CampaignType  $campaignType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignType $campaignType)
    {
        $campaignType->delete();
        return redirect()->action('CampaignTypeController@index');

    }
}
