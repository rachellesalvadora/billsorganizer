<?php
include_once('db.php');

if (!empty($_POST)) {
	Redirect('form-calculate.php', false);
}
else {

$companyid = $_POST['companyid'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];

$date = "SELECT * from mytable where date between ".$startdate." and ".$endate."";
$query = "SELECT * from bill where ('company_idcompany') = (".$companyid.")";
$querytotalpaid = "SELECT sum(amount) AS Total from bill where date between ".$startdate." and ".$endate."";
$queryheading = 'select name from company where idcompany = '.$companyid.'';
$total = "";


$result = mysql_query($query,$mysql);
$result2 = mysql_query($query,$mysql);
$resultdate = mysql_query($date,$mysql);

$resultheading = mysql_query($queryheading,$mysql);
$resulttotalunpaid = mysql_query($querytotalunpaid,$mysql);
$resulttotalpaid = mysql_query($querytotalpaid,$mysql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bills</title>

    <link href='http://fonts.googleapis.com/css?family=Muli:300,400' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
      <a href="index.html"><button type="button" class="btn btn-primary btn-lg home-button">HOME</button></a>
      <div class="container">
        <div class="total-paid">
            <h4>Total Unpaid Amount: $ <?php while($rowtotalunpaid = mysql_fetch_assoc($resulttotalunpaid) && $row['paid'] == '0'){ 

                echo $rowtotalunpaid['Total']; 

        } ?></h4>
        <h4>Total Paid Amount: $ <?php while($rowtotalpaid = mysql_fetch_assoc($resulttotalpaid) && $row['paid'] == '1'){ 

           echo $rowtotalpaid['Total']; 

    } ?></h4>
</div>
<h1 class="bills-title paid-title"><?php 
    while($rowheading = mysql_fetch_assoc($date)){ 
        echo "Calculate"; 
    }
    ?></h1>

    
    <h3>Unpaid</h3>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
            <tr>
                <th>Day</th>
                <th>Type</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
    while ($row = mysql_fetch_assoc($result)) {
        ?>
            <?php
                if ($row['paid'] == 0) {
                ?>
                <tr>
                    <td><?php 
                        
                        $mysqldate = $row['duedate'];
                        $datephp = strtotime($mysqldate);
                        echo date("m/d/y", $datephp);
                        ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td class="edit-button"><button class="btn btn-default edit-button-table" type="submit">Edit</button></td>
                        
                    </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>

        <h3>Unpaid</h3>     
        <div class="table-responsive">
      <table class="table table-hover">
        <thead>
            <tr>
                <th>Day</th>
                <th>Type</th>
                <th>Amount</th> 
            </tr>
        </thead>
        <tbody>
            <?php
    while ($row3 = mysql_fetch_assoc($result2)) {
        ?>
            <?php
            if ($row3['paid'] == 1) {
                ?>
                <tr>
                    <td>
                        <?php 
                        $mysqldate = $row3['duedate'];
                        $datephp = strtotime($mysqldate);
                        echo date("m/d/y", $datephp);
                        ?></td>
                        <td><?php echo $row3['type']; ?></td>
                        <td><?php echo $row3['amount']; ?></td>
                        <td class="edit-button"><button class="btn btn-default edit-button-table" type="submit">Edit</button></td>
                        
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>

        <?php } ?>



