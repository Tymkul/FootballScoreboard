@extends('layout')
<div>
    @if(isset($summary))
        @forelse ($summary as $key => $game)
            <div>
                <input type="text"
                       value="{{ $game['home_team'] }} - {{ $game['away_team'] }} : {{ $game['home_score'] }} - {{ $game['away_score'] }}"
                       name="{{ $game['home_team'] }}{{ $game['away_team'] }}" readonly>
            </div>
        @empty
            Empty data
        @endforelse
    @endif
</div>
