<?php
include "db.php";
session_start();
if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $sql = "select * from admin where email = '$email' and password = '$password'";
    $run = $conn->prepare($sql);
    $run->execute();

    if($run->rowCount() == 0){
        $row = $run->fetch(PDO::FETCH_ASSOC);
        $_SESSION["uid"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        header("location:showdata.php");


    }
}

?>

<!DOCTYPE html>
<html> 

    <head>
	

       <meta charset="UTF-8"> 
       <title>Login form</title> 
      
	       <link rel="stylesheet" type="text/css" href="style.css"> 
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		   <link rel="stylesheet" type="text/css" href="design.css">
       
       </head> 
       <body> 
 
                <div class="container" style="width:2000px width:100;">  
                
                <nav id="navbar">
			  
                <ul>
                       <button onclick="add()" id='bkb'>Home</button>
                       <script>
                        function add() {
                        location.replace("index.php")
                       }
                      </script>
					  
            
                </ul>
            </nav>
			</div>
 
      <header>
	        <div class="main">
		
	            </ul>
			</div>
	  </header>
      <div class="login-box">

	     <h1>Login Here</h1>
		 
		 <form method="post" action="">
		 
		 <p>Email</p>
		 <input type="email" name="email" placeholder="Enter email" required>	
         <p>Password</p>
         <input type="password" name="pass" placeholder="Enter password" required>
          <input type="submit" name="login"required>	
        	  
		  <a href="#">Forget Password</a>
		 
	  </div>
	  
	</form>  
 </body>
 </html>