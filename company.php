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
        <h1 class="bills-title">Company</h1>
        <?php if ($success == 1) { ?>
        <div class="company-content alert alert-success" role="alert">Successfully added!</div>
        <?php } ?>
          <div class="company-content">
            <form class="form-horizontal" method="post" action="companylist.php" >
              <div class="form-group">
                <label for="company-name" class="col-sm-5 control-label">Company Name:</label>

                <div class="col-sm-6">
                  <?php 

                  ?>
                  <select name="companyid" class="select-company-name">
                   <?php 
                   while ($row = mysql_fetch_assoc($resultcompany)) {
                    ?>
                    <option value="<?php echo $row['idcompany']; ?>">

                      <?php
                      echo $row['name'];
                      ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-5">
                    <button type="submit" class="btn btn-default">Choose</button>
                  </div>
                </div>

              </div>

            </form>
          </div>

          <div class="company-content">
            <form class="form-horizontal" action="addc.php" method="post">
              <div class="form-group">
                <label for="company-new" class="col-sm-5 control-label">New Company:</label>

                <div class="col-sm-6">
                  <input name="company-new" type="text" placeholder="New Company Name" class="input-company"></input>
                </div>

              </div>

              <div class="form-group">
                <label for="company-website" class="col-sm-5 control-label">Company Website:</label>

                <div class="col-sm-6">
                  <input name="company-website" type="text" placeholder="New Company Name" class="input-company"></input>
                </div>

              </div>

              <div class="form-group">
                <label for="company-number" class="col-sm-5 control-label">Contact Number:</label>

                <div class="col-sm-6">
                  <input name="company-number" type="number" placeholder="1234567890" class="input-company"></input>
                </div>

              </div>

              <div class="form-group">
                <label for="company-address" class="col-sm-5 control-label">Company Address:</label>

                <div class="col-sm-6"> 
                  <textarea rows="10" cols="30" name="company-address" type="text" placeholder="Company Address" class="input-company address-input"></textarea>
                </div>

              </div>

              <div class="form-group">
               

                <div class="col-sm-6">
                
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-5">
                    <button type="submit" class="btn btn-default">Add Company</button>
                  </div>


                </form>
              </div>



              <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
              <!-- Include all compiled plugins (below), or include individual files as needed -->
              <script src="js/bootstrap.min.js"></script>
            </body>
            </html>