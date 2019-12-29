
<?php
include "db.php";
session_start();
if(isset($_POST["login"])){
	
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "select * from users where email = '$email' and password = '$password'";
	
	try{
    $run = $conn->prepare($sql);
    $run->execute();

    if($run->rowCount() == 0){
        $row = $run->fetch(PDO::FETCH_ASSOC);
        $_SESSION["uid"] = $row["id"];
        $_SESSION["email"] = $row["email"];
        header("location:newcart.php");

	}
	
	}
	catch(PDOException $ex){
    echo "<script>window.alert('connection errror')</script>";
}

    
}
	

?>


<!DOCTYPE html>

<html lang="en-US">

    <head>
        <meta charset="utf-8">
        
        
<!--        setting the title and icon-->
        <title>HelpDesk</title>
        
    
<!--        adding the design sheet-->
        <link rel="stylesheet" href="design.css" type="text/css">
		
		  <link rel="stylesheet" type="text/css" href="style.css">
        
<!--        adding the javascript page-->
        <script src="clientscript.js" async defer></script>
    </head>
    
    <body onload="setheight();" onscroll="checkbackground();">
        
        <div>
            <div class="logo">
                <a href="#">HelpDesk</a>
            </div>

            <nav id="navbar">
                <ul>
                   
					 <button onclick="myyyFunction()" id='bkb'>HOME</button>
                       <script>
                        function myyyFunction() {
                        alert("You are already in the Homepage!");
                       }
                      </script>
					  
		
                      <button onclick="myFunction()" id='bk'>CONTACT US</button>
			         <script>
                       function myFunction() {
                       location.replace("contact.html")
                       }
                       </script>
					   
					 <button onclick="admin()" id='bk'>ADMIN</button>
			         <script>
                       function admin() {
                       location.replace("admin.php")
                       }
                       </script>
            
                </ul>
            </nav>

            <button onclick="myFunc()" id='bkbtn'>Free Registration</button>
			<script>
                       function myFunc() {
                       location.replace("reg.php")
                       }
                       </script>
        </div>
		
        
        <header id="headersec">
            <div id="intro">
                <h2>Welcome to </h2>
                <h1>HelpDesk</h1>
                 We are here for your medical tests!!!
				 
				 
				 
	<div class="login-box">
	  <img src="pic2.jpg" class="avatar">
	     <h1>Login Here</h1>
		 
		<form method="post" action="">
		 
		 <label>Email</label>
		 <input type="email"  name="email" placeholder="Enter email" required>	
		 
         <label>Password</label>
         <input type="password"  name="password" placeholder="Enter password" required>
          <input type="submit"  name="login"required>	
		
        	  
        	  
		  <a href="#">Forget Password</a>
		 
	  </div>
				 
				 
				 
				 
				 
				 
            </div>
            
        </header>
         
        <main>
            
            <div id="section1">
                <div id="desc1">
                    <h4> &gt; &gt; &gt; WELCOME &lt; &lt; &lt; </h4>
					<br/>
					<br/>
                   <h1>CEO & Founder</h1>
	 
	              
	
                   <div class="row">
                   <div class="column">
                   <div class="card">
                      <img src="mm.jpg"  width="190" height="190">
	              <div class="container">
                   <h2>Rukaiya Mohua</h2>
				   <br/>
                    <h3>mohua@gmail.com</h3>
					<br/>
					<p>Our main motto is to provide medical tests at your doorstep.Keep believing us.For more details or enquiries visit out contact page & mail us</p>
					<br/><br/>
					<p>Thank You for visiting</p>
 
               </div>
            </div>
				
                </div>
            </div>
					
					
					
                </div>
            </div>
            
            
        </main>
        
        <footer>
   
            <div>
                <h4 style="color:floralwhite;border-bottom:2px solid rgb(255, 71, 26);">Visit Us</h4>
                <span id="branch-1">
                 
					
					  <a href="#">Adabor-road 3,house-339,Mohammadpur Dhaka</a><br/>
					  <a href="#">Email Address- helpdesk@gmail.com</a><br/><br/>
                </span>
           
            </div>
        </footer>
    </body>

</html>