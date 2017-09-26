<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$vps = ''; # your vps name, ex: vps-XXX
$enable = true;

$datas = array('service' => $vps, 'enable' => $enable);
$rescue = $fh->post('/vps/rescue', $datas);

if ($rescue)
{

    if ($rescue['result'])
    {

        echo 'Rescue OK';
    }
    else
    {

        echo 'Rescue NOK';
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";
