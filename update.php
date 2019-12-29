<!DOCTYPE html>

<html>
    <head>
	<link rel="stylesheet" type="text/css" href="design.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  
        
    </head>
    
    <body>
        <?php
        $updateid=-1;

        if(isset($_GET['uid'])) $updateid=$_GET['uid'];

        try{
            $conn=new PDO("mysql:host=localhost:3306;dbname=web",'root','');
            echo "<script>console.log('database connected');</script>";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex){
            echo "<script>window.alert('database connection error');</script>";
        }


        try{
            $searchquery="SELECT * FROM center WHERE id=$updateid";
            $object=$conn->query($searchquery);
            if($object->rowCount() == 1){
                $table=$object->fetchAll();
                ?>
                <form action='showdata.php' method="post">
                 
				   <div class="row"> 
	               <div class="col-sm-3">
	    
		          <hr class="mb-4">
				    <label for="id"><b>ID</b></label>
				    <input class="form-control" type="text" name="sid" value="<?php echo $table[0][0] ?>" readonly> <br/>

					<label for="name"><b>Name</b></label>
                    <input class="form-control"  type="text" name="sname" value="<?php echo $table[0][1] ?>"> <br/>

					<label for="address"><b>Address</b></label>
                    <input class="form-control"  type="text" name="saddress" value="<?php echo $table[0][2] ?>"> <br/>

					<label for="testname"><b>Test Name</b></label>
                     <input class="form-control" type="text" name="stestname" value="<?php echo $table[0][3] ?>"> <br/>

					  <label for="price"><b>Price</b></label>
                   <input class="form-control" type="text" name="sprice" value="<?php echo $table[0][4] ?>"> <br/>

                    <input class="btn btn-primary" type="submit" value="Update"> 
                </form>

					 </div>
		             </div>
	                 </div>
			
				
                <?php
            }
            else{
				///if no data is found then no update operation is needed and again returning back to showdata.php page 
                echo "<script>location.assign('showdata.php');</script>";
            }

        }
        catch(PDOException $ex){
            echo "<script>location.assign('showdata.php');</script>";
        }
        ?>
    </body>
    
</html>