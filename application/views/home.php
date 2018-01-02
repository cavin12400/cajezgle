<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="<?php echo base_url().'assets/img/shortcut-icon.png'?>" />
  <title>CaJezGle | Sign-Up/Login Form</title>
  <link rel='stylesheet' href="<?php echo base_url().'assets/css/myfont.css'?>" >
  <link rel='stylesheet' href="<?php echo base_url().'assets/css/normalize.min.css'?>" >
  <link rel='stylesheet' href="<?php echo base_url().'assets/css/mystyle.css'?>" >


  
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#loginauth">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">
          
          <form action="" method="POST" >
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" / name="firstname" >
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/ name="lastname" >
            </div>
          </div>
          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/ name="username">
          </div>
          <input type="text" name="type" value="Client" hidden>
          <input type="text" name="status" value="active" hidden>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/ name="email" >
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/ id="password1" name="password" onKeyUp="validate()">
          </div>
          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/ id="password2"  name="password_confirm" onKeyUp="validate()">
          </div>
          <div class="form-group col-md-12 " style="color: red;">
            <?php echo form_error('username');?>
            <?php echo form_error('email');?>
            <?php echo form_error('password');?>
            <?php echo form_error('password2');?>
          </div>
          <?php if(isset($_SESSION['success'])){?>
            <div class="alert alert-success" style="color:lightgreen;"> <?php echo $_SESSION['success']; ?></div><br>
          <?php 
          } ?>
          <?php if(isset($_SESSION['errorlog'])){?>
            <div class="alert alert-success" style="color:red;"> <?php echo $_SESSION['errorlog']; ?></div><br>
          <?php 
          } ?>
          <button type="submit" class="button button-block"/ id="signupbtn" name="addme" disabled>Sign Up</button>
          
          </form>

        </div>
        
        <div id="loginauth">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="POST">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/ name="username">
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/ name="password">
          </div>
          
          <p class="forgot"><a href="<?php echo base_url().'application/views/profile'?>">Forgot Password?</a></p>
          <button class="button button-block"/ name="login">Log In</button>
          
          </form>
        
        </div>
        
      </div>
      
</div> <!-- /form -->
    <script src="<?php echo base_url().'assets/libs/jquery/jquery-2.2.4.js'?>" ></script>
    <script src="<?php echo base_url().'assets/js/indexfinal.js'?>" ></script>

</body>

</html>
