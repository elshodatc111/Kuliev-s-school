<?php

namespace App\Listeners;
use\App\Events\createTulov;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserTulov{
    public function __construct(){}
    public function handle(createTulov $event): void{
        $user_id = $event->user_id;
        $naqt = str_replace(",","",$event->naqt);
        $plastik = str_replace(",","",$event->plastik);
        $guruh_id = $event->guruh_id;
        $about = $event->about;

        
    }
}
