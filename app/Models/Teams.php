<?php

namespace App\Models;

class Teams
{
    public function getAllMatches()
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
