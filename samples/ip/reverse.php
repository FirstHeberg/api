<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$ip = ''; # your ip address (server, failover...)
$reverse = ''; # the reverse needed

/*
 * Please note your reverse hostname must return your ip address
 */

$datas = array('service' => $ip, 'reverse' => $reverse);
$update = $fh->post('/ip/reverse', $datas);

if ($update)
{

    if ($update['result'])
    {

        echo 'Reverse OK';
    }
    else
    {

        echo 'Reverse NOK';
        echo "\n";
        echo 'Verification: ' . $update['datas']['verification'];
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";
