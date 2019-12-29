
<!DOCTYPE html>

<html>
<head>
    
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   
	<link rel="stylesheet" type="text/css" href="design.css">
        
    </head>
<body>
    <form action="add.php" method="post">   
        

		 <div class="container">
	 
	 <div class="row"> 
	   <div class="col-sm-3">
	    
		     <hr class="mb-3">
	        	<label for="id"><b>ID</b></label>
		        <input class="form-control" id="sid" type="text" name="sid">
		
		        <label for="name"><b>Name</b></label>
	         	<input class="form-control" id="sname" type="text" name="sname">
		
		        <label for="address"><b>Address</b></label>
		        <input class="form-control" id="saddress" type="text"  name="saddress">
		
		        <label for="testname"><b>Test Name</b></label>
		        <input class="form-control" id="stestname" type="text" name="stestname" >
		
		        <label for="price"><b>Price</b></label>
		        <input class="form-control" id="sprice" type="text" name="sprice">
		        <hr class="mb-3">
		        <input class="btn btn-primary" type="submit"  value="Add">
		
		 </div>
		</div>
	 </div>
    </form>
    
    <?php
	
	

	/*if(isset($_POST['Add']))
	{
	
		$sname = $_POST['sname'];
		$saddress = $_POST['saddress'];
		$stestname = $_POST['stestname'];
		$sprice = sha1($_POST['sprice']);
		
		$sql= "INSERT INTO center (sname,saddress,stestname,sprice) VALUES(?,?,?,?)";
		$stminsert = $db->prepare($sql);
		$result = $stminsert->execute([$sname,$saddress,$stestname,$sprice]);
		if($result)
		{
		  echo 'Successfully Registered ';
		}
		else{
		    echo 'error';
		}
	}*/ 


	
	
	
	if($_SERVER['REQUEST_METHOD']=="GET"){
            /// nothing to do
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            $sid=$sname=$semail=$sdob=$saddress="";
            
           if(isset($_POST['sid'])) $sname=$_POST['sid'];
            if(isset($_POST['sname'])) $sname=$_POST['sname'];
            if(isset($_POST['saddress'])) $saddress=$_POST['saddress'];
            if(isset($_POST['stestname'])) $stestname=$_POST['stestname'];
            if(isset($_POST['sprice'])) $sprice=$_POST['sprice'];
            
            try{
                $conn=new PDO("mysql:host=localhost;dbname=web;",'root','');
                echo "<script>console.log('connection successful');</script>";
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "<script>window.alert('connection error');</script>";
            }
            
            try{
                $sqlquery="INSERT INTO center VALUES ($sid, '$sname', '$saddress','$stestname','$sprice')";

                $conn->exec($sqlquery);
                echo "<script>window.alert('insertion successful');</script>";
            }
            catch(PDOException $e){
                echo "<script>window.alert('insertion error');</script>";
            }
            
            
        } 
    
    ?>
    
</body>

</html>