<?php session_start(); ?>
<?php ob_start(); ?>
<?php include '../db.php'; 
$name=$_SESSION['name'];

                  $query="SELECT * FROM companies WHERE name='$name'";
                  mysqli_query($connection,$query);
?>




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
           <li><a href="hello.php"  ><i class="fa fa-fw"></i>Dashboard</a></li>
           
           <li><a href=#  class="active"><i class="fa  fa-fw"></i>Applied Students</a></li>
           <li><a href="c_eligibility.php" ><i class="fa  fa-fw"></i>Company Eligibility</a></li>
          
           <li><a href="logout.php"><i class="fa  fa-fw"></i>Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
      

        <div class="templatemo-content-container">

          <div class="templatemo-content-widget no-padding">
		  	<a href="bgo.php" class="templatemo-blue-button">applied students</a>
            <div class="panel panel-default table-responsive">


              <?php


                  $c_id=$_SESSION['c_id'];

                  $query="SELECT * FROM applied_comp WHERE c_id='$c_id'";
                  $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query)){

                                  $uname=$row['name'];
                                  $mquery="SELECT * FROM student WHERE name='$uname'";
                                  $select_all_query=mysqli_query($connection,$mquery);

                                  while($row=mysqli_fetch_assoc($select_all_query)){

?>
                                  <div class="panel panel-default table-responsive" style="border:2px solid cyan;padding:10px;margin:10px;box-shadow:3px 3px">


                                    <p><b>Name:</b><?php echo $row['name'] ?></p>
                                    <p><b>Email:</b><?php echo $row['email'] ?></p>
                                    <p><b>Contact:</b><?php echo $row['contact'] ?></p>

                                    <p><b>CGPA:</b><?php echo $row['cgpa'] ?></p>
                                    <p><b>SAP ID:</b><?php echo $row['sapid'] ?></p>
                                    <p><b>Department:</b><?php echo $row['dept'] ?></p>
                                    <a  href=app_students.php?name=<?php echo $uname; ?> ><button type="button" class="templatemo-blue-button width-20" name="select">Select</button></a>
                                    <a  href=app_students.php?name=<?php echo $uname; ?> ><button type="button" class="templatemo-blue-button width-20" name="reject">Reject</button></a>

                                  </div>

                <?php  }}


                if(isset($_GET['name'])){

                    $id=$_GET['name'];


                    $cquery="DELETE FROM applied_comp WHERE name='$id' AND c_id='$c_id'";
                    $cresult=mysqli_query($connection,$cquery);
                    header("Location:app_students.php");
                      if(!$cresult){
                        die("Deletion Failed ".mysqli_error($connection));
                      }

                    ?>


                  <?php

               }

               if(isset($_GET['name'])){

                   $uname=$_GET['name'];

                     $cquery="SELECT name FROM selected_stud WHERE name='$uname' AND c_id='$c_id'";
                     $cresult=mysqli_query($connection,$cquery);

                     if(mysqli_num_rows($cresult)==0){


                       $kquery="INSERT INTO selected_stud(sapid,c_id) VALUES('{$id}','{$c_id}')";
                       $kresult=mysqli_query($connection,$kquery);
                         if(!$kresult){
                           die("Deletion Failed ".mysqli_error($connection));
                         }

                     }else{

                       ?>
                         <script>
                           alert('Already Selected!');
                         </script>

                       <?php
                     }




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
