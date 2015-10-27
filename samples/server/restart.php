<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$srv = ''; # your server name, ex: srvXXX

$datas = array('service' => $srv);
$restart = $fh->post('/server/restart', $datas);

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