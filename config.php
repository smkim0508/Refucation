<?php
define('DESERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('db.sql', 'demo');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, db.sql);

if($db === false){
    die("Error: connection error. " .mysqli_connect_error());
}