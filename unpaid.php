<?php
include_once('db.php');
//string
$amount = 'SELECT sum(amount) AS Total FROM bill WHERE paid = 0';

//query
$result = mysql_query($amount);

//new query with all details

$unpaid = 'SELECT * from bill JOIN company ON bill.`company_idcompany` = company.`idcompany` WHERE paid = 0';
$result2 = mysql_query($unpaid);



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
     <h4>Total Unpaid Amount: $ <?php while($row = mysql_fetch_assoc($result)){ 

                echo $row['Total']; 

        } ?></h4>
    </div>
    <h1 class="bills-title paid-title">Unpaid</h1>

    <div class="table-responsive">
  <table class="table table-hover">
    <thead>
        <tr>
            <th>Day</th>
            <th>Type</th>
            <th>Company</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
    while ($row = mysql_fetch_assoc($result2)) {
        ?>
            <tr>
                <td><?php 
                    $mysqldate = $row['duedate'];
                    $datephp = strtotime($mysqldate);
                        echo date("m/d/y", $datephp);
                    ?></td>
                    <td><?php
                    echo $row['type'];
                    ?></td>
                    <td><?php
                    echo $row['name'];
                    ?></td>
                    <td>$ <?php 
                    echo $row['amount']; ?>
                    </td>
                    <td class="edit-button"><button class="btn btn-default edit-button-table" type="submit">Edit</button></td>
                        
                    </tr>
                    <?php } ?>
    </tbody>
  </table>
</div>
    