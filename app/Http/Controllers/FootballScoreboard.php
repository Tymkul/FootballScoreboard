<?php

namespace App\Http\Controllers;

use App\Models\FootballGame;
use Illuminate\Support\Facades\Cache;
class FootballScoreboard extends Controller
{
    public function home()
    {
        Cache::flush();

        $footballGame = new FootballGame();

        return view('home', ['games' => $footballGame->generateFutureMatches()]);
    }

    public function startGame(string $key)
    {
        $footballGame = new FootballGame();

        $futureMatches = $footballGame->removeMatch('scoreboardKeys');
        $game = $footballGame->startMatch($key);

        Cache::put('scoreboardKeys', $footballGame->scoreboardKeys);
        Cache::put('scoreboard', $game);

        return view('home', [
            'games' => $futureMatches,
            'gamesNow' => $game,
            'endGames' => Cache::get('completedMatches')
        ]);
    }

    public function updateGame(string $key)
    {
        $footballGame = new FootballGame();

        $futureMatches = $footballGame->removeMatch('scoreboardKeys');
        $scoreboard = $footballGame->updateGame($key);

        Cache::put('scoreboard', $scoreboard);

        return view('home', [
            'games' => $futureMatches,
            'gamesNow' => $scoreboard,
            'endGames' => Cache::get('completedMatches')
        ]);
    }

    public function endGame(string $key)
    {
        $footballGame = new FootballGame();
        $scoreboard = Cache::get('scoreboard');

        $finishMatch = $footballGame->endGame($key, $scoreboard);
        $futureMatches = $footballGame->removeMatch('scoreboardKeys');

        unset($scoreboard[$key]);

        Cache::put('scoreboard', $scoreboard);
        Cache::put('completedMatches', $finishMatch);

        return view('home', [
            'games' => $futureMatches,
            'gamesNow' => $scoreboard,
            'endGames' => $finishMatch
        ]);
    }

    public function getSummary()
    {
        $footballGame = new FootballGame();
        $completedMatches = Cache::get('completedMatches');

        return view('summary', ['summary' => $footballGame->sortSummary($completedMatches)]);
    }
}
