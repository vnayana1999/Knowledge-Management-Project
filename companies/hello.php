<?php session_start(); ?>
<?php include "../db.php"; ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

   

  </head>
  <body>
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <?php
		  $Welcome = "Welcome";
          echo "<h1>" . $Welcome."," . "<br>".$_SESSION['name']. "</h1>";
		 echo "<br>";

		  ?>
        </header>
        
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
              
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">
          <ul>
         <ul>
            <li><a href=# class="active" ><i class="fa fa-fw"></i>Dashboard</a></li>
            
            <li><a href="app_students.php"><i class="fa  fa-fw"></i>Applied Students</a></li>
            <li><a href="c_eligibility.php"><i class="fa  fa-fw"></i>Company Eligibility</a></li>
            <li><a href="logout.php"><i class="fa  fa-fw"></i>Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
       

        <div class="templatemo-content-container">

          <div class="templatemo-content-widget no-padding">
		  	<a href="bgo.php" class="templatemo-blue-button">Details</a>
            <div class="panel panel-default table-responsive">


			 


              <?php

                  $name=$_SESSION['name'];

                  $query="SELECT * FROM companies WHERE name='{$name}'";
                  $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query)){

                              $email=$row['email'];
                              $contact=$row['contact'];
                              $name=$row['name'];
                              $intake=$row['intake'];
                              $c_id=$row['c_id'];
                    }
              ?>
			 

<div class="panel panel-default table-responsive" style="border:2px solid cyan;padding:10px;margin:10px;box-shadow:3px 3px">


<h1 style="text-decoration:underline"><?php echo $name ?></h1>
    <p><b>Email:</b><?php echo $email ?></p>
      <p><b>Intake:</b><?php echo $intake ?></p>
      <p><b>Contact:</b><?php echo $contact ?></p>

      <p><b>Company Id:</b><?php echo $c_id ?></p>


      </div>














			  </div>
			  </div>
			  </div>



        </div>
      </div>
    </div>
  </body>
</html>
