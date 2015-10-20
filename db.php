<?php
try
{
    $hostname   = 'localhost';
    $database   = 'tp_miniged';
    $username   = 'root';
    $password   = '';
    //$bdd        = new PDO('mysql:host=localhost;dbname=tp_miniged;charset=utf8', 'root', '');
    $bdd        = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', ''.$username.'', ''.$password.'');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
