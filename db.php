<?php
########## MySql details (Replace with yours) #############
$username = "root"; //mysql username
$password = "root"; //mysql password
$hostname = "localhost"; //hostname
$databasename = "mydb"; //databasename

//connect to database
$mysql = mysql_connect($hostname, $username, $password);


if (!mysql_select_db('mydb', $mysql)) {
    echo 'Could not select database';
    exit;
}


?>