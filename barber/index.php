<?php

	session_start(); 
    
    $pageTitle = 'Login';

    // IF THE USER HAS ALREADY LOGGED IN

	if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
	{
		header('Location: dashboard.php');
		exit();
	}

	// ELSE

	include 'connect.php';
	include 'Includes/functions/functions.php';
	include 'Includes/templates/header.php';

	?>

	<div class="login">
    	<form class="login-container validate-form" name="login-form" method="POST" action="index.php" onsubmit="return validateLogInForm()">
     		<span class="login100-form-title p-b-32">
            	Barber Admin Login
          	</span>

          	<!-- PHP SCRIPT WHEN SUBMIT -->

          	<?php

          		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin-button']))
          		{
          			$username = test_input($_POST['username']);
                    $password = test_input($_POST['password']);
                    $hashedPass = sha1($password);

                    //Check if User Exist In database

                    $stmt = $con->prepare("Select admin_id, username,password from barber_admin where username = ? and password = ?");
                    $stmt->execute(array($username,$hashedPass));
                    $row = $stmt->fetch();
                    $count = $stmt->rowCount();

                    // Check if count > 0 which mean that the database contain a record about this username

                    if($count > 0)
                    {

                        $_SESSION['username_barbershop_Xw211qAAsq4'] = $username;
                        $_SESSION['password_barbershop_Xw211qAAsq4'] = $password;
                        $_SESSION['admin_id_barbershop_Xw211qAAsq4'] = $row['admin_id'];
                        header('Location: dashboard.php');
                        die();
                    }
                    else
                    {
                    	?>

                        <div class="alert alert-danger">
								            <button data-dismiss="alert" class="close close-sm" type="button">
            						      <span aria-hidden="true">×</span>
        						        </button>
								            <div class="messages">
                              <div>Username and/or password are incorrect!</div>
								            </div>
                        </div>

                    	<?php
                    }
          		}

          	?>

          	<!-- USERNAME INPUT -->

          	<div class="form-input">
            	<span class="txt1">Username</span>
               	<input type="text" name="username" class = "form-control" oninput = "getElementById('required_username').style.display = 'none'" autocomplete="off">
            	<span class="required-field" id="required_username">Username is required!</span>
          	</div>
          	
          	<!-- PASSWORD INPUT -->

          	<div class="form-input">
            	<span class="txt1">Password</span>
                <input type="password" name="password" class="form-control" oninput = "getElementById('required_password').style.display = 'none'" autocomplete="new-password">
            	<span class="required-field" id="required_password">Password is required!</span>
          	</div>
          	
          	<!-- SIGN IN BUTTON -->

          	<p>
           		<button type="submit" name="signin-button" >Sign In</button>
          	</p>

          	<!-- FORGOT YOUR PASSWORD LINK -->

          	<span class="forgotPW">Forgot your password ? <a href="resetPassword.php">Reset it here.</a></span>
      	</form>
    </div>

<!-- FOOTER BOTTOM -->

<?php include 'Includes/templates/footer.php'; ?>
