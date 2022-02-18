<?php

namespace App\Service;

use App\Models\Events;
use Carbon\Carbon;

class ArchiveEventsService
{
    public function __construct()
    {
        $this->archiveEvents();
    }

    private function archiveEvents()
    {
        $events = Events::query()->where('finish_date', '<', Carbon::now())->get();
        foreach ($events as $event) {
            $event->delete();
        }
    }
}
