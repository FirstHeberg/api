<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$vps = ''; # your vps name, ex: vps-XXX

$datas = array('service' => $vps);
$stop = $fh->post('/vps/stop', $datas);

if ($stop)
{

    if ($stop['result'])
    {

        echo 'Stop OK';
    }
    else
    {

        echo 'Stop NOK';
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";