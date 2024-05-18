<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Console\Commands\tkun;
use App\Jobs\AllSendMessege;
use App\Jobs\CreateTecherSendMessege;
use App\Jobs\GuruhSendMessege;
use App\Jobs\TashrifMessege;
use App\Jobs\TkunSendMessege;

use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();




 
