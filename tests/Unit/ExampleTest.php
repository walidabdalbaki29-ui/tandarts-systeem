<?php

namespace Tests\Unit;

use App\Support\AppointmentTimeCalculator;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_it_calculates_the_end_time_of_an_appointment(): void
    {
        $calculator = new AppointmentTimeCalculator();

        $endTime = $calculator->calculateEndTime('10:00', 30);

        $this->assertSame('10:30', $endTime);
    }

    public function test_it_calculates_the_end_time_for_a_longer_treatment(): void
    {
        $calculator = new AppointmentTimeCalculator();

        $endTime = $calculator->calculateEndTime('10:00', 60);

        $this->assertSame('11:00', $endTime);
    }

    public function test_it_calculates_the_end_time_when_the_hour_changes(): void
    {
        $calculator = new AppointmentTimeCalculator();

        $endTime = $calculator->calculateEndTime('10:45', 30);

        $this->assertSame('11:15', $endTime);
    }
}
