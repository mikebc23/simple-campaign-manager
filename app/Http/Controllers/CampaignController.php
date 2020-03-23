<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $campaigns = Campaign::with(['users'])->where('user_creator_id', $user->id)->paginate(8);
        return view('campaigns.index')
            ->with('campaigns', $campaigns)
            ->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaign_types = DB::table('campaign_types')->where('deleted_at', null)->get()->pluck('name', 'id');
        $user = Auth::user();

        return view('campaigns.create')
            ->with('user', $user)
            ->with('campaign_types', $campaign_types)
            ->with('campaign', (new Campaign()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campaign = Campaign::create($request->input());

        /*
        DB::table('user_campaign')->insert([
            'campaign_id' => $campaign->id,
            'user_id' => Auth::id(),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        */

        return redirect()->action('CampaignController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        $campaign_types = DB::table('campaign_types')->get()->pluck('name', 'id');
        $user = Auth::user();

        return view('campaigns.show')
            ->with('user', $user)
            ->with('campaign_types', $campaign_types)
            ->with('campaign', $campaign);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $campaign_types = DB::table('campaign_types')->where('deleted_at', null)->get()->pluck('name', 'id');
        $user = Auth::user();

        return view('campaigns.edit')
            ->with('user', $user)
            ->with('campaign_types', $campaign_types)
            ->with('campaign', $campaign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $campaign->fill($request->input());
        $campaign->save();
        return redirect()->action('CampaignController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->action('CampaignController@index');
    }
}
