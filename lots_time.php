<?php

date_default_timezone_set('Europe/Moskow');

$day = date('d') + 1;
$time_now = time();
$midnight = strtotime($day.'.03.2019');

$ttl_lots_h = floor(($midnight - $time_now) / 3600);
$ttl_lots_m = floor((($midnight - $time_now) % 3600) / 60);
$ttl = $ttl_lots_h . ':' . $ttl_lots_m;

