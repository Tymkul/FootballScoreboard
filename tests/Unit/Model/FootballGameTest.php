<?php

namespace Tests\Unit\Model;

use App\Models\FootballGame;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class FootballGameTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_start_match()
    {
        $matches = $this->createAllMatches();

        Cache::set('scoreboard', $matches);
        Cache::set('scoreboardKeys', array_keys($matches));

        $game = (new FootballGame())->startMatch('GermanyFrance');

        $this->assertIsArray($game);
        $this->assertArrayHasKey('home_score', $game);
        $this->assertArrayHasKey('away_score', $game);
    }

    public function test_update_game()
    {
        $matches = $this->createAllMatches();

        Cache::set('scoreboard', $matches);

        $game = (new FootballGame())->updateGame('GermanyFrance');

        $this->assertIsArray($game);
        $this->assertIsNumeric($game['home_score']);
        $this->assertIsNumeric($game['away_score']);
    }

    public function test_end_game()
    {
        $matches = $this->createAllMatches();
        Cache::set('completedMatches', $matches[0]);

        $game = (new FootballGame())->endGame('GermanyFrance', []);

        $this->assertIsArray($game);
    }

    public function test_sort_summary()
    {
        $game = (new FootballGame())->sortSummary(
            $this->createAllMatches()
        );

        $this->assertArrayHasKey('total', $game->toArray());
    }
}
