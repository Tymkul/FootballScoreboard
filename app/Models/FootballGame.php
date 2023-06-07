<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class FootballGame extends Teams
{
    public $scoreboardKeys;
    public function generateFutureMatches()
    {
        $matches = collect($this->getAllMatches());

        $matches->map(function ($match) {
            $key = $match['home_team'].$match['away_team'];
            Cache::set($key, $match);
        });

        return $matches;
    }

    public function startMatch($key)
    {
        $scoreboard = Cache::get('scoreboard');
        $keys = Cache::get('scoreboardKeys');
        $matchesScoreboard = Cache::get($key);

        $scoreboardKeys = array($key);

        if ($scoreboard) {
            foreach ((array) $keys as $value) {
                $scoreboardKeys[] = $value;
            }
            $scoreboardUpdate = $scoreboard;
        }

        // Add new fields to matches
        if (is_array($matchesScoreboard)){
            $scoreboardUpdate[$key] = array_merge($matchesScoreboard, ['home_score' => 0, 'away_score' => 0]);
        }

        $this->scoreboardKeys = $scoreboardKeys;

        return $scoreboardUpdate;
    }

    public function updateGame($key)
    {
        $scoreboard = Cache::get('scoreboard');
        $randomTeam = collect(['home_score', 'away_score'])->random();

        $match = $scoreboard[$key];
        $match[$randomTeam] = (int) $match[$randomTeam] + 1;
        $scoreboard[$key] = $match;

        return $scoreboard;
    }

    public function endGame($key, $scoreboard)
    {
        $completedMatches = Cache::get('completedMatches');

        if($completedMatches){
            foreach (($completedMatches) as $match){
                $finishMatch[] = $match;
            }
        }

        try {
            $finishMatch[] = $scoreboard[$key];
        } catch (\Exception $exception) {
            return [];
        }

        return $finishMatch;
    }

    public function sortSummary($completedMatches)
    {
        foreach ($completedMatches as $key => $value){
            $total = array_sum([$value['home_score'], $value['away_score']]);
            $completedMatches[$key]['total'] = $total;
        }

        return collect($completedMatches)->sortBy([
            ['total', 'desc'],
        ]);
    }
    public function removeMatch($key)
    {
        $teams = collect($this->getAllMatches());
        $teams->forget(Cache::get($key));

        return $teams;
    }
}
