<?php

namespace App\Support;

use Carbon\Carbon;

class AppointmentTimeCalculator
{
    public function calculateEndTime(
        string $startTime,
        int $duration
    ): string {
        return Carbon::parse($startTime)
            ->addMinutes($duration)
            ->format('H:i');
    }
}
