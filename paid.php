<?php
include_once('db.php');
//string
$amount = 'SELECT sum(amount) AS Total FROM bill WHERE paid = 1';

//query
$result = mysql_query($amount);

//new query with all details

$unpaid = 'SELECT * from bill JOIN company ON bill.`company_idcompany` = company.`idcompany` WHERE paid = 1';
$result2 = mysql_query($unpaid);

$echo = "SELECT * from bill JOIN company ON bill.`company_idcompany` = company.`idcompany`";
$resultecho = mysql_query($echo,$mysql);
$resultecho2 = mysql_query($echo,$mysql);



$success = 0;
$success = $_GET['success'];
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
    <h1 class="bills-title paid-title">Paid</h1>

    <?php if ($success == 1) { ?>
        <div class="company-content alert alert-success" role="alert">Successfully added!</div>
        <?php } ?>

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
     <tr>
    <form class="form-horizontal" action="addpaid.php" method="post">
        <td>
        <div class="form-group">
                <label for="date" ></label>

                
                  <input name="date" type="date" class="addnew"></input>
        </div>
        </td>

        <td>
        <div class="form-group">
                <label for="type"></label>

                <select name="type" class="addnew">
                   <?php 
                   while ($row = mysql_fetch_assoc($resultecho)) {
                    ?>
                    <option value="<?php echo $row['type']; ?>">

                      <?php
                      echo $row['type'];
                      ?>
                    </option>
                    <?php } ?>
                  </select>
        </div>
        </td>

        <td>
        <div class="form-group">
                <label for="type"></label>

                <select name="companyid" class="addnew">
                   <?php 
                   while ($row = mysql_fetch_assoc($resultecho2)) {
                    ?>
                    <option value="<?php echo $row['idcompany']; ?>">

                      <?php
                      echo $row['name'];
                      ?>
                    </option>
                    <?php } ?>
                  </select>
        </div>
        </td>

        <td>
        

        <div class="form-group">
                <label for="amount" ></label>
                $
                <input type="number" min="0.00" step="1.0" max="99999999" name="amount" class="amount-input">
                </input>
        </div>

        </td> 
        

        <td class="edit-button"><button class="btn btn-default edit-button-table" type="submit">Add</button></td> 

        </form>  

        </tr>

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
    