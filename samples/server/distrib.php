<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$srv = ''; # your server name, ex: srvXXX

$datas = array('service' => $srv);
$distrib = $fh->post('/server/distrib', $datas);

if ($distrib)
{

    if ($distrib['result'])
    {

        echo 'Distrib OK <br>';
        print_r($distrib);
    }
    else
    {

        echo 'Distrib NOK';
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";