<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams
{
    protected function getAllMatches()
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
