


<h2>Account Settings</h2>
    		<hr />
			<div class="container-fluid">
				
    		<?php
    			$query1 = "SELECT *FROM user ORDER BY id DESC";
    			$result1=$conn->query($query1);

    			mysqli_close($conn);
    		?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
				</button>
			</div>
			  <div class="panel-body">
				<table class="table" >
				  <tr>
					<td>First Name</td>
					<td><?php echo $row['firstname']; ?></td>
				  </tr>
				  <tr>
					<td>Middle Name</td>
					<td><?php echo $row['middlename']; ?></td>
				  </tr>
				  <tr>
					<td>Last Name</td>
					<td><?php echo $row['lastname']; ?></td>
				  </tr>
				  <tr>
					<td>Username</td>
					<td><?php echo $row['username']; ?></td>
				  </tr>
				</table>
			  </div>
			</div>
			<hr>
			
			<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel">
  <form method="POST" action="user-update.php">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><h4><b>Account Settings</b></h4>
      </div>
      <div class="modal-body">
			<div class="form-group">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>"> 
				<label for="exampleInputEmail1">First Name</label>
				<div class="input-group">
				  <span class="input-group-addon" id="sizing-addon2"></span>
				  <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Middle Name</label>
				<div class="input-group">
				  <span class="input-group-addon" id="sizing-addon2"></span>
				  <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>"class="form-control" placeholder="Middle Name" aria-describedby="sizing-addon2">
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Last Name</label>
				<div class="input-group">
				  <span class="input-group-addon" id="sizing-addon2"></span>
				  <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<div class="input-group">
				  <span class="input-group-addon" id="sizing-addon2"></span>
				  <input type="text" name="username" value="<?php echo $row['username']; ?>"class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Password</label>
				<div class="input-group">
				  <span class="input-group-addon" id="sizing-addon2"></span>
				  <input type="password" name="password" value="<?php echo $row['password']; ?>"class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
				</div>
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