<?php

require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);

$vps = ''; # your vps name, ex: vps-XXXX
$system = ''; # ex: debian7-64
$password = ''; # root password, if empty a random one'll be generated

$datas = array('service' => $vps, 'system' => $system, 'password' => $password);
$reinstall = $fh->post('/vps/reinstall', $datas);

if ($reinstall)
{

    if ($reinstall['result'])
    {

        echo 'Reinstall OK';
    }
    else
    {

        echo 'Reinstall NOK';
    }
}
else
{

    echo 'CURL Error';
}

echo "\n\n";