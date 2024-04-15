<?php
use App\Models\User;
use App\Events\TugilganKun;
use Carbon\Carbon;
$today = Carbon::today();
echo count(User::whereRaw("DATE_FORMAT(tkun, '%m-%d') = ?", [$today->format('m-d')])->get());