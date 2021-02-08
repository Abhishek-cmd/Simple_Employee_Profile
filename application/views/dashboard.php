<html>

<?php
if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['name']);

	$email = ($this->session->userdata['logged_in']['email']);

	$mobile = ($this->session->userdata['logged_in']['mobile']);

	$emp_id = ($this->session->userdata['logged_in']['id']);

	$profile_pic = ($this->session->userdata['logged_in']['image']);
} else {
	header("location: login");
}
?>

    <head>
    <title>Dashboard</title>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style type="text/css">
		
		.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

		small {
			display: block;
			line-height: 1.428571429;
			color: #999;
		}
		.verticalhorizontal {
		    /*display: table-cell;*/
		    display: inline-block;
		    height: 300px;
		    text-align: center;
		    width: 250px;
		    vertical-align: middle;
		}
		/* Fixes dropdown menus placed on the right side */
	    .ml-auto {
	      left: auto !important;
	      right: 5px;
	    }

	    .message{
			position: absolute;
		    font-weight: bold;
		    font-size: 20px;
		    color: #126555;
		    left: 232px;
		    width: 500px;
		    text-align: left;
		}
	</style>
</head>
<!------ Include the above in your HEAD tag ---------->

<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Dashboard</a>
	    </div>
	    <ul class="nav navbar-nav ml-auto">
	      <li class="dropdown right" style="float:right">
	        <a href="<?=site_url('login/logout')?>"><strong>Logout</strong></a>
	      </li>
	    </ul>
	  </div>
	</nav>

	<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-6 col-md-6">
	            <div class="well well-sm">
	                <div class="row">
	                    <div class="col-sm-6 col-md-4 verticalhorizontal">

	                    	<?php
		                    	if(!empty($profile_pic)){

		                    		echo '<img src = "' . base_url('application/assets/uploads/') . $profile_pic . '" alt="Avatar" style="width:80%">';                                  
                                    echo "<br/></br>";
		                    	}else{

		                    		echo '<img src = "' . base_url('application/assets/images/img_avatar.jpg') .'" alt="Avatar" style="width:80%">';                                  
                                    echo "<br/></br>";                                   
		                    	}
	                    	?>

	                    	<label><?php echo $username;?></label>
	                    </div>

	                    <div class="col-sm-6 col-md-8">
	                    	<div class="container">    
						        <div class="col-lg-12">                    
						            <div class="panel panel-info" >
					                    <div class="panel-heading">
					                        <div class="panel-title"><span class="glyphicon glyphicon-user"></span>My Profile</div>
					                    </div>

					                    <?php

									      if (isset($message_display)) {
									        echo "<div class='message'>";
									        echo $message_display;
									        echo "</div>";
									      }

									    ?>      

					                    <div style="padding-top:30px" class="panel-body">

					                    	<br>
											  <!-- Nav tabs -->
											  <ul class="nav nav-tabs">
											    <li class="nav-item">
											      <a class="nav-link active" data-toggle="tab" href="#home">Personal Info</a>
											    </li>
											    <li class="nav-item">
											      <a class="nav-link" data-toggle="tab" href="#menu1">Change Avatar</a>
											    </li>
											    <li class="nav-item">
											      <a class="nav-link" data-toggle="tab" href="#menu2">Change Password</a>
											    </li>
											  </ul>

											  <!-- Tab panes -->
											  <div class="tab-content">

											    <div id="home" class="container tab-pane active"><br>
											     
											        <form action="<?php echo site_url('login/update_user/'. $emp_id); ?>" method="post">
											        	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>"/>
											      	    <div class="form-group">
													        <label for="validationTooltipUsername">Name</label>
													        <div class="input-group">
														        <div class="input-group-prepend">
														          <span class="input-group-text glyphicon glyphicon-user" id="validationTooltipUsernamePrepend"></span>
														        </div>
														        <input type="text" class="form-control" name="user_name" id="name" aria-describedby="validationTooltipUsernamePrepend" required value="<?php echo $username;?>">
														        <div class="invalid-tooltip">
														          Please choose a unique and valid username.
														        </div>
														    </div>
													    </div>

													    <div class="form-group">
													        <label for="validationTooltipUsername">Email Id</label>
													        <div class="input-group">
														        <div class="input-group-prepend">

														          <span class="input-group-text glyphicon glyphicon-envelope" id="validationTooltipUsernamePrepend"></span>
														        </div>
														        <input type="email" class="form-control" name="email" id="email" aria-describedby="validationTooltipUsernamePrepend" required value="<?php echo $email;?>">
														        <div class="invalid-tooltip">
														          Please choose a unique and valid email.
														        </div>
														    </div>
													    </div>

													    <div class="form-group">
													        <label for="validationTooltipUsername">Mobile</label>
													        <div class="input-group">
														        <div class="input-group-prepend">
														          <span class="input-group-text glyphicon glyphicon-phone" id="validationTooltipUsernamePrepend"></span>
														        </div>
														        <input type="number" class="form-control" name="mobile" id="mobile" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $mobile;?>" required>
														        <div class="invalid-tooltip">
														          Please choose a valid mobile.
														        </div>
														    </div>
													    </div>
													  
													  <button type="submit" class="btn btn-primary" value="update">Save Changes</button>
													  <button type="submit" class="btn btn-danger" formnovalidate disabled="disabled">Cancel</button>
													</form>
											    </div>


											    <div id="menu1" class="container tab-pane fade"><br>
											      <form action="<?php echo site_url('login/update_avatar/'. $emp_id); ?>" method="post" enctype="multipart/form-data">
											        	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>"/>

											      	    <div class="form-group">
													        <label for="images">File Input</label>

													        <input type="file" class="form-control" name="profile_pic" id="profile_pic" required>
													        <div class="invalid-tooltip">
													          Please choose valid images types.
													        </div>
													    </div>

													    <button type="submit" class="btn btn-primary" value="update_img">Save Changes</button>
													    <button type="submit" class="btn btn-danger" disabled="disabled">Cancel</button>

													</form>
											    </div>

											    <div id="menu2" class="container tab-pane fade"><br>
											      
											      <form action="<?php echo site_url('login/update_password/'. $emp_id); ?>" method="post">
											        	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>"/>
											      	    <div class="form-group">
													        <label for="validationTooltipUsername">Old Password</label>
													        <div class="input-group">
														        <div class="input-group-prepend">
														          <span class="input-group-text glyphicon glyphicon-lock" id="validationTooltipUsernamePrepend"></span>
														        </div>
														        <input type="text" class="form-control" name="old_pass" id="old_pass" required>
														        <div class="invalid-tooltip">
														          Please enter old password.
														        </div>
														    </div>
													    </div>

													    <div class="form-group">
													        <label for="validationTooltipUsername">New Password</label>
													        <div class="input-group">
														        <div class="input-group-prepend">

														          <span class="input-group-text glyphicon glyphicon-lock" id="validationTooltipUsernamePrepend"></span>
														        </div>
														        <input type="password" class="form-control" name="new_pass" id="new_pass" required>
														        <div class="invalid-tooltip">
														          Please enter New password.
														        </div>
														    </div>
													    </div>

													    <div class="form-group">
													        <label for="validationTooltipUsername">Confirm Password</label>
													        <div class="input-group">
														        <div class="input-group-prepend">
														          <span class="input-group-text glyphicon glyphicon-lock" id="validationTooltipUsernamePrepend"></span>
														        </div>
														        <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" required>
														        <div class="invalid-tooltip">
														          Please enter Confirm password.
														        </div>
														    </div>
													    </div>&nbsp;

													    <span class="registrationFormAlert" id="CheckPasswordMatch" style="color:green;"></span><br/><br/>
													  
													  <button type="submit" class="btn btn-primary" value="update_pass">Save Changes</button>
													  <button type="submit" class="btn btn-danger" disabled="disabled">Cancel</button>
													</form>

											    </div>
											  </div>

					                    </div>

					                </div>
					            </div>
					        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
       $("#confirm_pass").keyup(checkPasswordMatch);      
    });

    function checkPasswordMatch() {
        var password = $("#new_pass").val();
        var confirmPassword = $("#confirm_pass").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").html("Passwords match.");
    }
    
</script>
