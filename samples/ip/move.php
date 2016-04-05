<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$ip = ''; # your failover ip address
$to_ip = ''; # your server/vps ip address

$datas = array('service' => $ip, 'to' => $to_ip);
$update = $fh->post('/ip/move', $datas);

if ($update)
{

    if ($update['result'])
    {

        echo 'Routing updated';
    }
    else
    {

        echo 'Routing NOK';
        echo "\n";
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";
