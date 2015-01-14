<?php 

include_once('db.php');


$date = $_POST['date'];
$type = $_POST['type'];
$companyid = $_POST['companyid'];
$amount = $_POST['amount'];

$insert = "INSERT INTO bill (duedate, type, company_idcompany, amount, paid)
VALUES ('".$date."', '".$type."', '".$companyid."', '".$amount."', '0')";


$insertresult = mysql_query($insert,$mysql);


if($insertresult == 1)
{
	?>

<script type="text/javascript">
<!--
window.location = "unpaid.php?success=1"
//-->
</script>
<?php 
}
else {
	echo ' fail';
}

?>