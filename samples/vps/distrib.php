<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$vps = ''; # your vps name, ex: vps-XXX

$datas = array('service' => $vps);
$distrib = $fh->post('/vps/distrib', $datas);

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
