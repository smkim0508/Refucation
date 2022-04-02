<?php
define('DESERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', 'password');
define('DBNAME', 'demo');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if($db === false){
    die("Error: connection error. " .mysqli_connect_error());
}