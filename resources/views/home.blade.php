@extends('layout')

<div>
    <div>
        <div style="display: flex">
            @if(isset($games))
                <div style="padding: 20px">
                    <h3>Future games:</h3>
                    @forelse ($games as $key => $game)
                        <div>
                            <input type="text"
                                   value="{{ $game['home_team'] }} - {{ $game['away_team'] }}"
                                   name="{{ $game['home_team'] }}{{ $game['away_team'] }}"
                                   readonly>

                            <a href="/startGame/{{ $game['home_team'] }}{{ $game['away_team'] }}"
                               class="btn btn-primary">
                                Start Game
                            </a>
                        </div>
                    @empty
                        Empty data
                    @endforelse
                </div>
            @endif
            @if(isset($gamesNow))
                <div style="padding: 20px">
                    <h3>Now games:</h3>
                    @forelse ($gamesNow as $key => $game)
                        <div>
                            <input type="text"
                                   value="{{ $game['home_team'] }} - {{ $game['away_team'] }} : {{ $game['home_score'] }} - {{ $game['away_score'] }}"
                                   name="{{ $game['home_team'] }}{{ $game['away_team'] }}"
                                   readonly>

                            <a href="/updateGame/{{ $game['home_team'] }}{{ $game['away_team'] }}"
                               class="btn btn-primary">Update Game</a>

                            <a href="/endGame/{{ $game['home_team'] }}{{ $game['away_team'] }}"
                               class="btn btn-primary">End Game</a>
                        </div>
                    @empty
                        Empty data
                    @endforelse
                </div>
            @endif
            @if(isset($endGames))
                <div style="padding: 20px">
                    <h3>Past games:</h3>
                    @forelse ($endGames as $key => $game)
                        <div>
                            <input type="text"
                                   value="{{ $game['home_team'] }} - {{ $game['away_team'] }} : {{ $game['home_score'] }} - {{ $game['away_score'] }}"
                                   name="{{ $game['home_team'] }}{{ $game['away_team'] }}" readonly>
                        </div>
                    @empty
                        Empty data
                    @endforelse
                    <a href="/getSummary"
                       class="btn btn-primary">Get a summary</a>
                </div>
            @endif
        </div>
    </div>
</div>

