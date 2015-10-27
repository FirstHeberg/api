<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$vps = ''; # your vps name, ex: vps-XXX
$timeframe = 'hour'; # hour, day, week, month

$datas = array('service' => $vps, 'timeframe' => $timeframe);
$graphs = $fh->post('/vps/graphs', $datas);

if ($graphs)
{

    if ($graphs['result'])
    {

        echo 'Graphs OK';

        $cpu = base64_decode($graphs['datas']['cpu']);
        $mem = base64_decode($graphs['datas']['mem']);
        $disk = base64_decode($graphs['datas']['disk']);
        $net = base64_decode($graphs['datas']['net']);

        /*
          file_put_contents($vps.'-cpu.png', $cpu);
          file_put_contents($vps.'-mem.png', $mem);
          file_put_contents($vps.'-disk.png', $disk);
          file_put_contents($vps.'-net.png', $net);
         */
    }
    else
    {

        echo 'Graphs NOK';
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";
