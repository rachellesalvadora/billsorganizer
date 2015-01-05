<?php
include_once('db.php');
//string
//query

//new query with all details

$query = 'SELECT * from bill JOIN company ON bill.`company_idcompany` = company.`idcompany`';

$result = mysql_query($query);



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
    <h1 class="bills-title paid-title">History</h1>
        <div class="table-responsive">
  <table class="table table-hover">
    <thead>
        <tr>
            <th>Day</th>
            <th>Type</th>
            <th>Company</th>
            <th>Amount</th>
            <th>Transaction</th>

        </tr>
    </thead>
    <tbody>
        <?php
    while ($row = mysql_fetch_assoc($result)) {
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
                    <td>
                     <?php if ($row['paid'] == '0') { 
                      ?>Paid <?php } else { ?> 
                      Unpaid <?php } ?>
                      </td>
                    <td class="edit-button"><button class="btn btn-default edit-button-table" type="submit">Edit</button></td>
                        
                    </tr>
                    <?php } ?>
    </tbody>
  </table>
</div>
    