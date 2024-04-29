<div>
    <form action="{{ url()->current() }}" method="get">

        <div class="mb-3 ">
            <label for="q" class="form-label fw-semibold">Search</label>
            <input type="search" class="form-control" id="q" name="q" placeholder="" value="{{ $f_q ?: '' }}" autofocus>
        </div>

        <div class="mb-3">
            <label for="user" class="form-label fw-semibold">Player</label>
            <select class="form-select" id="user" name="user">
                <option value>-</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $f_user ? 'selected':'' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label fw-semibold">Country</label>
            <select class="form-select" id="country" name="country">
                <option value>-</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->id == $f_country ? 'selected':'' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="league" class="form-label fw-semibold">League</label>
            <select class="form-select" id="league" name="league">
                <option value>-</option>
                @foreach($leagues as $league)
                    <option value="{{ $league->id }}" {{ $league->id == $f_league ? 'selected':'' }}>
                        {{ $league->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="leagueClub" class="form-label fw-semibold">league Club</label>
            <select class="form-select" id="leagueClub" name="leagueClub">
                <option value>-</option>
                @foreach($leagues as $league)
                    @foreach($league->leagueClubs as $leagueClub)
                        <option value="{{ $leagueClub->id }}" {{ $leagueClub->id == $f_leagueClub ? 'selected':'' }}>
                            {{ $league->name }} / {{ $leagueClub->name }}
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="positions" class="form-label fw-semibold">Positions</label>
            <select class="form-select" id="positions" name="positions[]" multiple size="3">
                @foreach($positions as $position)
                    <option value="{{ $position->id }}" {{ in_array($position->id, $f_positions) ? 'selected':'' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="experiences" class="form-label fw-semibold">Professional</label>
            <select class="form-select" id="experiences" name="experiences[]" multiple size="3">
                @foreach($experiences as $experience)
                    <option value="{{ $experience->id }}" {{ in_array($experience->id, $f_experiences) ? 'selected':'' }}>
                        {{ $experience->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row g-2 mb-3">
            <div class="col">
                <label for="minPrice" class="form-label fw-semibold">Min Price</label>
                <input type="number" class="form-control" id="minPrice" name="minPrice" value="{{ $f_minPrice ?: '' }}">
            </div>
            <div class="col">
                <label for="maxPrice" class="form-label fw-semibold">Max Price</label>
                <input type="number" class="form-control" id="maxPrice" name="maxPrice" value="{{ $f_maxPrice ?: '' }}">
            </div>
        </div>
     </div>
        <div class="mb-3">
            <label for="sortBy" class="form-label fw-semibold">Sort By</label>
            <select class="form-select" id="sortBy" name="sortBy">
                <option value {{ 'youngToOld' == $f_sortBy ? 'selected':'' }}>
                    Young To Old
                </option>
                <option value="lowToHigh" {{ 'lowToHigh' == $f_sortBy ? 'selected':'' }}>
                    Low To High
                </option>
                <option value="highToLow" {{ 'highToLow' == $f_sortBy ? 'selected':'' }}>
                    High To Low
                </option>
            </select>
        </div>

        <div class="row g-2">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col">
                <a href="{{ url()->current() }}" class="btn btn-secondary w-100">Clear</a>
            </div>
        </div>

    </form>
</div>
