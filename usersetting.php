<?php
	include('config.php');
	include('session.php');
	
	$query = "SELECT * FROM user WHERE id='".$_SESSION['session_id']."'";
	$result=$conn->query($query);
	$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include('includes/nav-user.php');?>
	  
    <div class="row">
    	<div class="col-md-2">
    		<div class="container-fluid">
				<a href="user-profile.php"><img src="upload/<?php echo $row['photo']; ?> " alt="" class="img-circle" width="30" height="30"> <?php echo $row['firstname']." ".$row['lastname']; ?></a>
    		</div>
    	</div>
    	<div class="col-md-8">
    		<?php include('includes/account-settings.php'); ?>
        
    	<div class="col-md-2">
    	</div>
    </div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>