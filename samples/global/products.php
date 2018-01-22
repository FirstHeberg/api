<?php
require_once('../config.php');
require_once('../../FirstHeberg.class.php');

$fh = new FirstHeberg(FH_LOGIN, FH_TOKEN);
$datas = array('login' => FH_LOGIN, 'token' => FH_TOKEN);
$listProducts = $fh->get('/global/products', $datas);

if ($listProducts)
{
    echo 'Liste des produits: <br>';
    print_r($listProducts);
}
else
{
    echo 'Vide';
}

echo "\n\n";
