<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Player;
use App\Models\Position;
use App\Models\Country;
use App\Models\User;
use App\Models\Experience;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'user' => 'nullable|integer|min:1',
            'country' => 'nullable|integer|min:1',
            'league' => 'nullable|integer|min:1',
            'leagueClub' => 'nullable|integer|min:1',
            'positions' => 'nullable|array|min:0',
            'positions.*' => 'nullable|integer|min:1',
            'experiences' => 'nullable|array|min:0',
            'experiences.*' => 'nullable|integer|min:1',
            'minPrice' => 'nullable|numeric|min:0',
            'maxPrice' => 'nullable|numeric|min:0',
            'hasImage' => 'nullable|boolean',
            'sortBy' => 'nullable|in:youngToOld,lowToHigh,highToLow',
        ]);
        //return $request->all();
        $f_q = $request->has('q') ? $request->q : null;
        $f_user = $request->has('user') ? $request->user : null;
        $f_country = $request->has('country') ? $request->country : null;
        $f_league = $request->has('league') ? $request->league : null;
        $f_leagueClub = $request->has('leagueClub') ? $request->leagueClub : null;
        $f_positions = $request->has('positions') ? $request->positions : [];
        $f_experiences = $request->has('experience') ? $request->experiences : [];
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : null;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : null;
        $f_hasImage = $request->has('hasImage') ? $request->hasImage : 0;
        $f_sortBy = $request->has('sortBy') ? $request->sortBy : null;


        $objs = Player::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%')
                    ->orWhere('body', 'like', '%' . $f_q . '%');
            });
        })
            ->when(isset($f_user), function ($query) use ($f_user) {
                return $query->where('user_id', $f_user);
            })
            ->when(isset($f_country), function ($query) use ($f_country) {
                return $query->where('country_id', $f_country);
            })
            ->when(isset($f_league), function ($query) use ($f_league) {
                return $query->where('league_id', $f_league);
            })
            ->when(isset($f_leagueClub), function ($query) use ($f_leagueClub) {
                return $query->where('league_club_id', $f_leagueClub);
            })
            ->when(count($f_positions) > 0, function ($query) use ($f_positions) {
                return $query->whereIn('position_id', $f_positions);
            })
            ->when(count($f_experiences) > 0, function ($query) use ($f_experiences) {
                return $query->whereIn('experience_id', $f_experiences);
            })
            ->when(isset($f_minPrice), function ($query) use ($f_minPrice) {
                return $query->where('price', '>=', $f_minPrice);
            })
            ->when(isset($f_maxPrice), function ($query) use ($f_maxPrice) {
                return $query->where('price', '<=', $f_maxPrice);
            })

            ->with('user', 'country', 'league', 'leagueClub', 'experience', 'position')
            ->when(isset($f_sortBy), function ($query) use ($f_sortBy) {
                if ($f_sortBy == 'lowToHigh') {
                    return $query->orderBy('price');
                } elseif ($f_sortBy == 'highToLow') {
                    return $query->orderBy('price', 'desc');
                } else {
                    return $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                return $query->orderBy('id', 'desc'); // desc => Z-A, asc => A-Z
            })
            ->paginate(40)
            ->withQueryString();

        $users = User::withCount('players')
            ->orderBy('name')
            ->get();
        $countries = Country::withCount('players')
            ->orderBy('name')
            ->get();
        $leagues = League::with('leagueClubs')
            ->withCount('players')
            ->orderBy('name')
            ->get();
        $positions = Position::withCount('players')
            ->orderBy('name')
            ->get();
        $experiences = Experience::withCount('players')
            ->orderBy('name')
            ->get();


return view('players.index')
            ->with([
                'objs' => $objs,
                'users' => $users,
                'countries' => $countries,
                'leagues' => $leagues,
                'positions' => $positions,
                'experiences' => $experiences,
                'f_q' => $f_q,
                'f_user' => $f_user,
                'f_country' => $f_country,
                'f_league' => $f_league,
                'f_leagueClub' => $f_leagueClub,
                'f_positions' => $f_positions,
                'f_experiences' => $f_experiences,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                //'f_credit' => $f_credit,
                //'f_exchange' => $f_exchange,
                'f_hasImage' => $f_hasImage,
                'f_sortBy' => $f_sortBy,
            ]);
    }


    public function show($id)
    {
        $obj = Player::findOrFail($id);

        return view('players.show')
            ->with([
                'obj' => $obj,
            ]);
    }
}
