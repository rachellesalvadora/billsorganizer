<?php require_once('db.php');

//MySQLi query
//get all records from add_delete_record table

$selectcompany = "select * from company";
$resultcompany = mysql_query($selectcompany,$mysql);


$success = 0;
$success = $_GET['success'];

?>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bills: type</title>

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
    <h1 class="bills-title">Type</h1>

    <div class="type-form">
      <form class="form-horizontal" action="choose-type.php">
        <div class="form-group">
          <label for="type" class="col-sm-5 control-label">Choose Type:</label>

        <div class="col-sm-6">
          <select name="type" class="select-company-name">
            <option>Tax</option>
            <option>Gas</option>
            <option>Grocery</option>
            <option>Electricity</option>
            <option>Others</option>
          </select>
        </div>

        <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
      <button type="submit" class="btn btn-default">Choose</button>
    </div>
  </div>