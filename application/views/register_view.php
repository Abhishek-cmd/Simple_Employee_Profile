<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
   <!--Made with love by Mutiullah Samim -->
   
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">

  <style type="text/css">
    /* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
/*background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');*/
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
/*border:1px solid black;*/
}

.card{
height: 520px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
border:1px solid black;
/*background-color: rgba(0,0,0,0.5) !important;*/
}

.card-body{

}



.card-header h3{
color: black;
/*margin-top: 10px;*/
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: black;
}

.links a{
margin-left: 4px;
}

.error_msg{
  position: absolute;
  color:red;
  font-size: 10px;
  text-align: center;
}

.message{
position: absolute;
font-weight: bold;
font-size: 20px;
color: #6495ED;
left: 262px;
width: 500px;
text-align: center;
}
  </style>
</head>
<body>

<div class="container">

  <div class="d-flex justify-content-center h-100">
    <?php

      if (isset($message_display)) {
        echo "<div class='message'>";
        echo $message_display;
        echo "</div>";
      }

    ?>   
     
    <div class="card">

      <div class="card-header">
        
        <h3>Register</h3>
        <h6>Sign up your account</h6>
        
        <div class="d-flex justify-content-end social_icon">
        </div><br/>

        
      </div>

      <div class="card-body">

        <form action="<?php echo site_url('login/add_register'); ?>" method="post">

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Username" name="input_username" id="input_username" required>       
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Email Id" name="input_email" id="input_email" required>       
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-mobile"></i></span>
            </div>
            <input type="number" minlength="10" maxlength="10" class="form-control" placeholder="Mobile No." name="input_mobile" id="input_mobile" required>       
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="input_password" id="input_password" required>
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>            
          </div>
          <span class="registrationFormAlert" id="CheckPasswordMatch" style="color:green;"></span>
          
          <div class="form-group">
            <input type="submit" value="Register" class="btn btn-primary float-left"/> 
          </div>


        </form>
      </div>




      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Already account?<a href="<?=site_url('login/add_login')?>">Login here</a>
        </div>
      </div>
    </div>



  </div>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
       $("#confirm_password").keyup(checkPasswordMatch);      
    });

    function checkPasswordMatch() {
        var password = $("#input_password").val();
        var confirmPassword = $("#confirm_password").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").html("Passwords match.");
    }
</script>

