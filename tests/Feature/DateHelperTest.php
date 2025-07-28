<?php

namespace Tests\Feature;

use Tests\TestCase;
use Awtechs\DateHelper\DateHelper;
use Illuminate\Support\Carbon;

class DateHelperTest extends TestCase
{
    protected DateHelper $dateHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dateHelper = app(DateHelper::class);
    }

    /** @test */
    public function it_formats_date_to_human_readable_string()
    {
        $fiveMinutesAgo = Carbon::now()->subMinutes(5);

        $result = $this->dateHelper->human($fiveMinutesAgo);

        $this->assertStringContainsString('ago', $result);
        $this->assertTrue(str_contains($result, 'minute'));
    }

    /** @test */
    public function it_formats_date_with_given_format()
    {
        $date = Carbon::create(2025, 7, 28, 14, 30);

        $result = $this->dateHelper->format($date, 'd/m/Y H:i');

        $this->assertEquals('28/07/2025 14:30', $result);
    }
}
