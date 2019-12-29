<?php
include "config.php";
session_start();

?>



<!DOCTYPE html>
<html>
<head>
   <title>User Registration</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="design.css">
      
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
   
   
           
		   
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

<div>
    <?php
	if(isset($_POST['create']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$mblno = $_POST['mblno'];
		$password = sha1($_POST['password']);
		
		$sql= "INSERT INTO users (firstname,lastname,email,mblno,password) VALUES(?,?,?,?,?)";
		$stminsert = $db->prepare($sql);
		$result = $stminsert->execute([$firstname,$lastname,$email,$mblno,$password]);
		if($result)
		{
		  echo 'Successfully Registered ';
		}
		else{
		    echo 'error';
		}
	}

	?>

</div>
   <div>
     <form action="reg.php" method="post">
	 <div class="container">
	 
	 <div class="row"> 
	   <div class="col-sm-3">
	     <h1>Registration </h1>
		   <p>Fill up the form carefully</p>
		     <hr class="mb-3">
	        	<label for="firstname"><b>First Name</b></label>
		        <input class="form-control" id="firstname" type="text" name="firstname" required>
		
		        <label for="lastname"><b>Last Name</b></label>
	         	<input class="form-control" id="lastname" type="text" name="lastname" required>
		
		        <label for="email"><b>Email Address</b></label>
		        <input class="form-control" id="email type="email" name="email" required>
		
		        <label for="mblno"><b>Mobile No</b></label>
		        <input class="form-control" id="mblno" type="text" name="mblno" required>
		
		        <label for="password"><b>Password</b></label>
		        <input class="form-control" id="password" type="password" name="password" required>
		        <hr class="mb-3">
		        <input class="btn btn-primary" type="submit" id="register" name="create" value="SignUp">
		
		 </div>
		</div>
	 </div>
	 
	  </form>
	  
 </div>	 
    
</body>
</html> 







