<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Country;

class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::withCount('players')
            ->orderBy('name')
            ->get();

        $leagues = League::with('leagueClubs')
            ->withCount('players')
            ->orderBy('name')
            ->get();

        return view('home.index')
            ->with([
                'countries' => $countries,
                'leagues' => $leagues,
            ]);
    }
}
