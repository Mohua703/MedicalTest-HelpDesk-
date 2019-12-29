<!DOCTYPE html>

<html>
    <body>
        
        <div>
            <input type="search" id="search" name="search" placeholder="Search Here">
            <input type="button" id="sbtn" value="Search">
        </div>
        
        <table style="width:100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Test Name</th>
                    <th>price</th>
                </tr>
            </thead>
            <tbody id="table">
                <?php
                try{
                    $conn=new PDO("mysql:host=localhost:3306;dbname=web",'root','');
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $ex){
                    echo "<script>window.alert('db connection errror')</script>";
                }
                
                $sqlquery="Select * from center";
                try{
                    $object=$conn->query($sqlquery);
                    $table=$object->fetchAll();
                    
                    foreach($table as $row){
                        ?>
                            <tr>
                                <td><?php echo $row[0] ?></td>    
                                <td><?php echo $row[1] ?></td>    
                                <td><?php echo $row[2] ?></td>    
                                <td><?php echo $row[3] ?></td>    
                                <td><?php echo $row[4] ?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $e){
                    echo "<script>window.alert('errror!!!!')</script>";
                }
                ?>
            </tbody>
        </table>
        
        <script>
            var searchdata=document.getElementById('search');
            
            var shbtn=document.getElementById('sbtn');
            sbtn.addEventListener('click',ajaxfn);
            
            function ajaxfn(){
                var ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','ajaxserve.php?search='+searchdata.value);
                
                ajaxreq.onreadystatechange=function (){
                    
                    if(this.readyState===XMLHttpRequest.DONE && this.status==200){
                        var tablebody=document.getElementById('table');
                        tablebody.innerHTML=ajaxreq.responseText;
                    }
                };
                
                ajaxreq.send();
                
            }
        </script>
        
    </body>

</html>