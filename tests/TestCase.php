<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createAllMatches()
    {
        return [
            'MexicoCanada' => [
                'home_team' => 'Mexico',
                'away_team' => 'Canada',
            ],
            'SpainBrazil' => [
                'home_team' => 'Spain',
                'away_team' => 'Brazil',
            ],
            'GermanyFrance' => [
                'home_team' => 'Germany',
                'away_team' => 'France',
            ],
            'UruguayItaly' => [
                'home_team' => 'Uruguay',
                'away_team' => 'Italy',
            ],
            'ArgentinaAustralia' => [
                'home_team' => 'Argentina',
                'away_team' => 'Australia',
            ],
        ];
    }
}
