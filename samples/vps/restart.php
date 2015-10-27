<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$vps = ''; # your vps name, ex: vps-XXX

$datas = array('service' => $vps);
$restart = $fh->post('/vps/restart', $datas);

if ($restart)
{

    if ($restart['result'])
    {

        echo 'Restart OK';
    }
    else
    {

        echo 'Restart NOK';
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";