

<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
.loginpage{

	margin-left: 5%;
	width: 20%;
}
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */

.clearfix{
	margin-left: 400px;
}
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }

  .loginpage{
  	width: 20px;
  }
}
.text_danger {
  color: red;
}
</style>
<body>

	<?php
  include '../controller/allfunction.php';
  	$obj = new user_management();  	
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = $obj->user_velidation($_POST);
    if (empty($error)) {
  	 $obj->addUser($_POST);
  	 header('location:index.php');
    }  			
  }


?>

<form method="POST" action="" enctype="multipart/form-data" style="border:1px solid #ccc">
  <div class="container">
    <h1 style="text-align: center;">User Registration Form</h1>    
    <hr>

    <label for="name"><b>User Name</b></label>
    <input type="text" placeholder="Enter your full username" name="username" >
	<err>		
    <div class="text_danger">
	<?php 
	if (isset($error['username'])) {
	echo $error['username'];
	}
	?>
  </div>
	</err>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email">    
    <div class="text_danger">
  <?php 
  if (isset($error['email'])) {
  echo $error['email'];
  }
  ?>
  </div>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"> 
    <div class="text_danger">
  <?php 
  if (isset($error['password'])) {
  echo $error['password'];
  }
  ?>
  </div>
    <div class="clearfix">
      <button type="submit" class="signupbtn">Submit</button> <button class="loginpage"> <a href="index.php">go to login page</a></button>
    </div>
  </div>
</form>

</body>
</html>