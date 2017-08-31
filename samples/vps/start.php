<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$vps = ''; # your vps name, ex: vps-XXX

$datas = array('service' => $vps);
$restart = $fh->post('/vps/start', $datas);

if ($restart)
{

    if ($restart['result'])
    {

        echo 'Start OK';
    }
    else
    {

        echo 'Start NOK';
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";