<?php

namespace Tests\Unit\Model;

use App\Models\Teams;
use Tests\TestCase;

class TeamsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_all_matches_return_correct_result()
    {
        $allMatches = (new Teams())->getAllMatches();
        $this->assertIsArray($allMatches);
    }
}
