<?php
include_once('db.php');

$companyid = $_POST['companyid'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$paid = $_POST['paid'];

$query = "select * from bill where company_idcompany = ".$companyid."";
$querytotalunpaid = "select sum(amount) AS Total from bill where company_idcompany = ".$companyid." AND paid = 0";
$querytotalpaid = "select sum(amount) AS Total from bill where company_idcompany = ".$companyid." AND paid = 1";
$queryheading = 'select name from company where idcompany = '.$companyid.'';


$result = mysql_query($query,$mysql);
$result2 = mysql_query($query,$mysql);
$resultheading = mysql_query($queryheading,$mysql);
$resulttotalunpaid = mysql_query($querytotalunpaid,$mysql);
$resulttotalpaid = mysql_query($querytotalpaid,$mysql);
?>