<?php

$_dbHost = "localhost";
$_dbUser = "root";
$_dbPassword = "";

$_dbName = "storebuild";

$_conn= mysqli_connect($_dbHost, $_dbUser, $_dbPassword, $_dbName);

if (!$_conn) {

    echo "Connection Failed";

}