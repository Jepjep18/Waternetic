<?php
	include('config.php');
	include('session.php');
	
	$query = "SELECT * FROM user WHERE id='".$_SESSION['session_id']."'";
	$result=$mysqli->query($query);
	$row = mysqli_fetch_array($result);
	$author = $row['firstname']." ".$row['lastname'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php include('includes/nav-admin.php');?>
    <div class="row">
    	<div class="col-md-2">
    		<div class="container-fluid">
				<a href="admin-profile.php"><img src="upload/<?php echo $row['photo']; ?> " alt="" class="img-circle" width="30" height="30"> <?php echo $row['firstname']." ".$row['lastname']; ?></a>
    		</div>
    	</div>
    	<div class="col-md-8">
    		<h2>Users</h2>
    		<hr />
			<div class="container-fluid">
				
    		<?php
    			$query1 = "SELECT *FROM user ";
    			$result1=$conn->query($query1);	
    		?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newuser">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> New
				</button>
			</div>
			  <div class="panel-body">
				<table class="table" >
				  <tr>
					<th></th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th>Username</th>
					<th></th>
				  </tr>

				   <?php
				  if($result1->num_rows > 0){
    				while($row1 = mysqli_fetch_array($result1)){
    					?>
				  <tr>
					<td><img src="upload/<?php echo $row1['photo']; ?> " alt="" class="img-rectangle" width="30" height="30"></td>
					<td><?php echo $row1['firstname']; ?></td>
					<td><?php echo $row1['middlename']; ?></td>
					<td><?php echo $row1['lastname']; ?></td>
					<td><?php echo $row1['username']; ?></td>
					<td><a href="admin-users_view.php?id=<?php echo $row1['id']; ?>">Edit<a> | <a href="admin-users_delete.php?id=<?php echo $row1['id']; ?>">Delete<a></td>
				  </tr>
				  <?php
					}
					}
					mysqli_close($conn);
				  ?>
				</table>
			  </div>
			</div>
			<hr>
    	<div class="col-md-2">
    	</div>
    </div>
	
	<!-- Modal -->
	<div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="editLabel">
	  <form method="POST" action="admin-users_new.php" enctype="multipart/form-data">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><h4><b>Users Information</b></h4>
		  </div>
		  <div class="modal-body">
				<div class="form-group">
					<div class="input-group">
					  <span class="input-group-addon" id="sizing-addon2"></span>
					  <input type="text" name="firstname" class="form-control" placeholder="First Name" aria-describedby="sizing-addon2">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
					  <span class="input-group-addon" id="sizing-addon2"></span>
					  <input type="text" name="middlename" class="form-control" placeholder="Middle Name" aria-describedby="sizing-addon2">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
					  <span class="input-group-addon" id="sizing-addon2"></span>
					  <input type="text" name="lastname" class="form-control" placeholder="Last Name" aria-describedby="sizing-addon2">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
					  <span class="input-group-addon" id="sizing-addon2"></span>
					  <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
					  <span class="input-group-addon" id="sizing-addon2"></span>
					  <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">User Type</label>
					<div class="input-group">
					  <span class="input-group-addon" id="sizing-addon2"></span>
					  <select name="usertype" class="form-control">
						  <option>User</option>
						  <option>Manager</option>
						  <option>Administrator</option>
					  </select>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">File input</label>
					<input type="file" name="file" id="exampleInputFile">
					<p class="help-block">Upload photo here</p>
				 </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
	  </div>
	  </form>
	</div>

	<?php include('includes/admin-new_article.php');?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>