<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>TEST LOGIN PAGE</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         pre {
            color: blue;
            font-weight: bold;
            text-align: center;
         }
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #b1caf2;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
            <pre color="blue">
  =================================================================
  _____  ______ _____  _______     __   _____       _______ ______
  |  __ \|  ____|  __ \|  __ \ \   / /  / ____|   /\|__   __|___  /
 | |  | | |__  | |__) | |__) \ \_/ /  | |       /  \  | |     / /
  | |  | |  __| |  _  /|  ___/ \   /   | |      / /\ \ | |    / /  
 | |__| | |____| | \ \| |      | |    | |____ / ____ \| |   / /__
  |_____/|______|_|  \_\_|      |_|     \_____/_/    \_\_|  /_____|
 
  =================================================================
</pre>
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
      <!-- 
         todo:
         - Make database
         - Connect loginform to database
         - Ensure it's save
         - Add it to the main page
      -->
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'daan' && 
                  $_POST['password'] == 'ilovecats') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'daan';
                  
                  echo 'You have entered a valid username and password';
               }else {
                  echo 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         
      </div> 
      
   </body>
</html>