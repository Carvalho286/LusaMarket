<?php 
session_start();

$_dbHost = "localhost";
$_dbUser = "root";
$_dbPassword = "";

$_dbName = "lusamarket";

$_conn= mysqli_connect($_dbHost, $_dbUser, $_dbPassword, $_dbName);

if (!$_conn) {

    echo "Connection Failed";

}

?>

<h1>
    You're logged <?php echo $_SESSION['name']; ?> as Affiliate!!
</h1>