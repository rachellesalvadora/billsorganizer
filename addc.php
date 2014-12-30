<?php
include_once('db.php');

$name = $_POST['company-new'];
$website = $_POST['company-website'];
$number = $_POST['company-number'];
$address = $_POST['company-address'];

$query1 = "INSERT INTO company(name, website, number, address ) VALUES('".$name."','".$website."','".$number."','".$address."')";
$result = mysql_query($query1, $mysql);

if($result == 1)
{
	?>

<script type="text/javascript">
<!--
window.location = "company.php?success=1"
//-->
</script>
<?php 
}
else {
	echo ' fail';
}
?>