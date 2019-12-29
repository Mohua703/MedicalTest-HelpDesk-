<!DOCTYPE html>
<html>
    <head>
       <meta charset="UTF-8">
        <title>Admin panel!!</title>
		<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 
    </head>
    
    <body>
	 <nav id="navbar">
			  
                <ul>
			
                    <button onclick="fun()" id='bk'>SignOut</button>
			         <script>
                       function fun() {
                       location.replace("signout.php")
                       }
                       </script>

					 
					   
					 
            
                </ul>
            </nav>
	
	
	
        <h4 style="text-align:center;">Diagnostic centers and test list!!</h4>
		<div>
		<input class="btn btn-primary" type="button" value="Add Entry" onclick="adddata();">
		</div>
        
        <table style="width:100%;">
		
		
		
		<script>
		function adddata(id){
                location.assign('add.php?add='+id);
            }
		</script

            <thead>

                <tr>
				<br/>
				<br/>
				<br/>
                    <th>Id</th>
                    <th>Name</th>
					<th>Address</th>
                    <th>Test Name</th>
                    <th>Price</th>
                    <th>Update/Delete</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
				///establishing a connection to the database and setting the error mode to exception
                try{
                    $conn=new PDO("mysql:host=localhost:3306;dbname=web",'root','');
                    echo "<script>console.log('database connected');</script>";
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $ex){
                    echo "<script>window.alert('database connection error');</script>";
                }
                
				///if this page is reloaded for delete operation then 
				///isset($_GET['delete']) will return true and delete operation will be performed.
				if(isset($_GET['delete'])){
					$id=$_GET['delete'];
					
					try{
						$delquery="DELETE FROM center WHERE id=$id";
						$conn->exec($delquery);
						echo "<script>window.alert('deletion successful');</script>";
					}
					catch(PDOException $ex1){
						echo "<script>window.alert('deletion error');</script>";
					}
				}
			
				
				///if this page is reloaded from update.php page to perform update operation then
				///the request method will be post and we will receive the data from update.php page by accessing $_POST array.
				if($_SERVER['REQUEST_METHOD']=="POST"){
					try{
						if(isset($_POST['sname']) && isset($_POST['saddress']) && isset($_POST['stestname']) && isset($_POST['sprice']) && isset($_POST['sid'])){
							$updatequery="UPDATE center SET name='".$_POST['sname']."', address='".$_POST['saddress']."',testname='".$_POST['stestname']."',price='".$_POST['sprice']."' WHERE id=".$_POST['sid'];

							$conn->exec($updatequery);
							echo "<script>console.log('update successful.');</script>";
						}
						else{
							echo "<script>window.alert('invalid update operation.');</script>";
						}
					}
					catch(PDOException $ex){
						echo "<script>window.alert('update error');</script>";
					}
				}
                    
                ///showing the whole database table here
                try{
                    $sqlquery="SELECT * FROM center";
                    $object=$conn->query($sqlquery);
                    
                    if($object->rowCount() == 0){ /// 0 meaning no data exists in the database
                        ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">
                                    No Data Found!!!
                                </td>
                            </tr>
                        <?php  
                    }
                    else{
                        ///meaning data exists in the database table
                        $table=$object->fetchAll();
                        foreach($table as $row){
                            ?>
                            <tr>
                                <td><?php echo $row[0]  ?></td>
                                <td><?php echo $row[1]  ?></td>
                                <td><?php echo $row[2]  ?></td>
                                <td><?php echo $row[3]  ?></td>
                                <td><?php echo $row[4]  ?></td>
                                <td>
									<!-- dynamically creating events for each button with different paramenters -->
								
                                    <input class="btn btn-primary" type="button" value="Update" onclick="updatedata(<?php echo $row[0]  ?>);">
                                    <input class="btn btn-primary" type="button" value="Delete" onclick="deleterow(<?php echo $row[0]  ?>);">
                                </td>
					
                            </tr>
                            <?php
                        }
                    }
                    
                }
                catch(PDOException $e){
                    echo "<script>window.alert('table show error');</script>";
                }
                ?>
            </tbody>
        </table>
        
        <script>
		   
            function deleterow(id){
				///reloading this page again with an extra parameter passed through get method named "delete"
                location.assign('showdata.php?delete='+id);
            }
            
            function updatedata(id){
				///loading the update.php page to perform the update operation
                location.assign('update.php?uid='+id);
            }
        </script>
    </body>
</html>