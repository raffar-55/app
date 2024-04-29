@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="container py-4">
        <div class="mb-5">
            <div class="h4 text-primary mb-3">
                Countries
            </div>
            <div class="row g-3">
                @foreach ($countries as $country)
                    <div class="col">
                        <div class="border rounded p-2">
                            <div class="h6 mb-0">
                                <a href="{{ route('players.index', ['country' => $country->id]) }}"
                                    class="link-dark text-decoration-none">
                                    {{ $country->name }}
                                </a>
                                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                    {{ $country->players_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <div class="h4 text-primary mb-3">
                Leagues
            </div>
            <div class="row g-3">
                @foreach ($leagues as $league)
                    <div class="col">
                        <div class="border rounded p-2">
                            <div class="h6">
                                <a href="{{ route('players.index', ['$league' => $league->id]) }}"
                                    class="link-dark text-decoration-none">
                                    {{ $league->name }}
                                </a>
                                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                    {{ $league->players_count }}
                                </span>
                            </div>
                            <div>
                                @foreach ($league->leagueClubs as $leagueClub)
                                    <div>
                                        <a href="{{ route('players.index', ['leagueClub' => $leagueClub->id]) }}"
                                            class="link-dark text-decoration-none">
                                            {{ $leagueClub->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
