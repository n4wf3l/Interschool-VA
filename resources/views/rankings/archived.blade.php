<div class="container">
    <form action="{{ route('rankings.archived') }}" method="GET">
        <div class="form-group">
            <label for="year">Select Year:</label>
            <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                <option value="">Choose a Year</option>
                @foreach ($years as $year)
                <option value="{{ $year }}" {{ $selectedYear==$year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </form>

    {{-- Displaying the Rankings --}}
    @if ($rankings->isNotEmpty())
    <h2>Rankings for {{ $selectedYear ?: 'All Years' }}</h2>
    <ul>
        @foreach ($rankings as $ranking)
        <li>{{ $ranking->teamname }} - {{ $ranking->points }} Points</li>
        @endforeach
    </ul>
    @else
    <p>No rankings available for the selected year.</p>
    @endif
</div>

@if ($rankings->isNotEmpty())
<h2>TopScorer for {{ $selectedYear ?: 'All Years' }}</h2>
<ul>

    <li>{{ $topscorer->topscorer_name }} - {{ $topscorer->topscorer_goals }} Goals</li>

</ul>
@else
<p>No rankings available for the selected year.</p>
@endif
</div>