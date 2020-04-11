<?php session_start(); ?>
<?php include '../db.php'; ?>
<?php ob_start(); ?>




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
		  $Welcome = "Department";
          echo "<h1>" . $_SESSION['dept'] . "<br>". $Welcome . "</h1>";
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
            <li><a href="hello.php"  ><i class="fa fa-fw"></i>Dashboard</a></li>
            <li><a href="clist.php"><i class="fa  fa-fw"></i>Companies</a></li>
            
            <li><a href=#  class="active"  ><i class="fa  fa-fw"></i>Applied Students</a></li>
            <li><a href="selected.php" ><i class="fa  fa-fw"></i>Selected Students</a></li>
            
            <li><a href="logout.php"><i class="fa  fa-fw"></i>Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        
        <div class="templatemo-content-container">

          <div class="templatemo-content-widget no-padding">
		  	<a href="bgo.php" class="templatemo-blue-button">PROFILE</a>
            <div class="panel panel-default table-responsive">

<br>
			 

              <?php

                  $dept=$_SESSION['dept'];

                  $query="SELECT * FROM student WHERE dept='{$dept}'";
                  $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query)){

                              $cname=null;
                              $name=$row['name'];
                              $sapid=$row['sapid'];
                              $email=$row['email'];
                              $contact=$row['contact'];
                              $cgpa=$row['cgpa'];



                              $mquery="SELECT * FROM applied_comp WHERE name='$name'";
                              $done=mysqli_query($connection,$mquery);
                              while($rom=mysqli_fetch_assoc($done)){

                                $cc_id=$rom['c_id'];

                                $kquery="SELECT name FROM companies WHERE c_id={$cc_id}";
                                $test=mysqli_query($connection,$kquery);


                                while($rok=mysqli_fetch_assoc($test)){

                                    $cname=$rok['name'].",".$cname;

                                }

                              }
                            ?>
  <div class="panel panel-default table-responsive" style="border:2px solid cyan;padding:10px;margin:10px;box-shadow:3px 3px">
                                <p><b>Name:</b><?php echo $name; ?></p>
                                <p><b>SAP ID:</b><?php echo $sapid; ?></p>
                                <p><b>Email:</b><?php echo $email; ?></p>
                                <p><b>Contact:</b><?php echo $contact; ?></p>
                                <p><b>CGPA:</b><?php echo $cgpa; ?></p>


                                <?php



                                if($cname===null){
                                  ?>
                                    <p><b>Applied Companies:</b>None</p>
                                    <?php
                                }else{
                                  ?>
                                    <p><b>Applied Companies:</b><?php echo $cname ?></p>

                                    <?php
                                }

                                ?>

                                    <a  href=applied.php?name=<?php echo $name; ?> ><button type="button" class="templatemo-blue-button width-20" name="delete">Reject</button></a>


                                    </div>

                                <?php

                              }

                                if(isset($_GET['name'])){

                                    $g_id=$_GET['name'];
                                    $equery="DELETE FROM student WHERE name='$g_id'";
                                    $pquery="DELETE FROM applied_comp WHERE name='$g_id'";
                                    $zquery="DELETE FROM selected_stud WHERE name='$g_id'";
                                    $eject=mysqli_query($connection,$pquery);
                                    $reject=mysqli_query($connection,$equery);
                                    $ect=mysqli_query($connection,$zquery);
                                    header('Location:applied.php');

                                }

                    ?>



			  </div>
			  </div>
			  </div>



        </div>
      </div>
    </div>
  </body>
</html>
