<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WrapperController extends Controller
{
    public function sharddata()
    {
        $json = Http::get( 'https://na1.api.riotgames.com/lol/status/v3/shard-data?api_key=RGAPI-172fdc39-fb5d-47f9-b9b4-f49668b2eecd')->json();
        return response()->json($json);
    }

    public function championRotations(){
        $json = Http::get( 'https://na1.api.riotgames.com/lol/platform/v3/champion-rotations?api_key=RGAPI-172fdc39-fb5d-47f9-b9b4-f49668b2eecd')->json();
        return response()->json($json);
    }

    public function summonerByName($summonerName){
        $json = Http::get( 'https://na1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'.$summonerName.'?api_key=RGAPI-172fdc39-fb5d-47f9-b9b4-f49668b2eecd')->json();
        return response()->json($json);

    }

    public function  allLeagueEntries($queue,$tier,$division, Request $request, $pge){
        $page = $request->api_key;
        $pges = $pge->page;
        $json = Http::get('https://na1.api.riotgames.com/lol/league/v4/entries/'.$queue.'/'.$tier.'/'.$division.'?'.$pges.'&api_key='.$page)->json();
        return response()->json($json);
    }

    public function featured(){
        $json = Http::get('https://na1.api.riotgames.com/lol/spectator/v4/featured-games?api_key=RGAPI-172fdc39-fb5d-47f9-b9b4-f49668b2eecd')->json();
        return response()->json($json);
    }


}

