
<?php require_once('db.php');

//MySQLi query
//get all records from add_delete_record table

$selectcompany = "select * from company";
$resultcompany = mysql_query($selectcompany,$mysql);

$query = "SELECT * FROM bill";
$result = mysql_query($query,$mysql);

$success = 0;
$success = $_GET['success'];

?>
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
    <h1 class="bills-title">Calculate</h1>
      <div class="calculate-form">
      <form class="form-horizontal" action="calculate.php" method="post">
        <div class="form-group">
          <label for="startdate" class="col-sm-5 control-label">Start Date:</label>
        <div class="col-sm-6">
          <input name="startdate" type="date" class="input-company" required></input>
        </div>

        </div>

        <div class="form-group">
          <label for="enddate" class="col-sm-5 control-label">End Date:</label>
        <div class="col-sm-6">
          <input name="enddate" type="date" class="input-company" required></input>
        </div>

        </div>

        <div class="form-group">
          <label for="company" class="col-sm-5 control-label">Company:</label>
        <div class="col-sm-6">
          <select name="companyid" class="select-company-name">
                   <?php 
                   while ($row = mysql_fetch_assoc($resultcompany)) {
                    ?>
                    <option value="<?php echo $row['idcompany']; ?>">
                      <?php
                      if ($row)
                      echo $row['name'];
                      ?> 
                    </option>
                    <?php } ?>
                  </select>
        </div>



        <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
      <button type="submit" class="btn btn-default">Calculate</button>
    </div>
    </div>

    </form>

      

      </div>

      

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

