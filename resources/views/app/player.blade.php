<div class="fw-semibold bg-white border rounded p-3">

    <div class="row g-3 mb-3 px-3">
        <div class="w-50 auto mb-2 col-md-6">
            <img src="{{ asset('img/pg.jpg') }}" alt="" class="img-fluid rounded-circle">
        </div>
        <div class="col-12 fs-4 col-md-6 ">
            {{ $obj->f_q }}
        </div>
        <div class="col-3 text-truncate">
            <span class="text-secondary">Player:</span>
            <span class="{{ isset($f_user) ? 'mark':'' }}">
                {{ $obj->user->name }}
            </span>
        </div>
        <div class="col-3 text-truncate">
            <span class="text-secondary">League:</span>
            <span class="{{ isset($f_league) ? 'mark':'' }}">
                {{ $obj->league->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Position:</span>
            <span class="{{ count($f_positions) > 0 ? 'mark':'' }}">
                {{ $obj->position->name }}
            </span>
        </div>
        <div class="col-3 text-truncate">
            <span class="text-secondary">Nationality:</span>
            <span class="{{ isset($f_country) ? 'mark':'' }}">
                {{ $obj->country->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Club:</span>
            <span class="{{ isset($f_leagueClub) ? 'mark':'' }}">
                {{ $obj->leagueClub->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Professional:</span>
            <span class="{{ count($f_experiences) > 0 ? 'mark':'' }}">
                {{ $obj->experience->name }}
            </span>
        </div>
    <div class="col-3">
        <span class="text-secondary">Date:</span> {{ $obj->created_at->format('d.m.Y') }}
    </div>
    <div class="col-9">
        <span class="text-secondary">Price:</span>
        <span class="{{ (isset($f_minPrice) or isset($f_maxPrice)) ? 'mark':'' }}">{{ number_format($obj->price, 2, '.', ' ') }} <small>$$$</small></span>
    </div>
    <div class="col-12">
        <span class="text-secondary">Description:</span> {{ $obj->body }}
    </div>
    </div>
</div>


