<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="css/APP_4.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    
    <?php

$errorMsg = "invald username and password";

?>
    

    <div class ="container-fluid">
    
    
        
        
  <div class="form">
      
      <img src="images/tud_logo.png" alt=""/>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="home.php"  method="get">
          
            
            
              <input type="email" id="email" name="email" required autocomplete="off" placeholder="Email"/>
     
          
       
           
            <input type="password" id="staffNumber" name="staffNumber" required autocomplete="off"  placeholder="Password"/>
      
 <?php if (isset($_SESSION['errors'])): ?>
    <div class="form-errors">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
          
         <div id="divText">
          <button class="button button-block">Log In</button>
   
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div>
    
    <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  
    <script src="js/index.js"></script>

   

    
    
    
    
</body>
</html>
