<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campaigns = Campaign::orderBy('updated_at', 'asc')->get()->where('status', 1);
        return view('home')
        ->with('campaigns', $campaigns)
        ;
    }
    
    public function show(Request $request)
    {
        $user = Auth::user();
        
        $campaign = DB::table('campaigns')->get()->where('id', $request->id);
        $campaign = $campaign[$request->id-1];
        
        $pledge = DB::table('user_campaign')->get()->where('user_id', Auth::id())->where('campaign_id', $request->id)->count();
        
        $pledge = ($pledge ? true : false);
        
        return view('campaigns.show_public')
        ->with('campaign', $campaign)
        ->with('pledge', $pledge);        
    }
    
    public function pledge(Request $request)
    {
        $campaign_id = $request->id;
        
        $user = Auth::user();
        
        DB::table('user_campaign')->insert([
            'campaign_id' => $campaign_id,
            'user_id' => Auth::id(),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        
        return redirect()->route('view_campaign', $campaign_id);
    }
}