




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align="center">
        <form action="index.php" method="post">
            NUMBER:<input type="number" name="num">
            <br><br>
            NAME:<input type="text" name="name">
            <br>
            <br>
            <button type="submit" value=1 name="submit">ADD</button>
            <button type="submit" value=2 name="submit">delet</button>
            <button type="submit" value=3 name="submit">update</button>
            <button type="submit" value=4 name="submit">Search</button>
            </form>
        <br>
        <br>
            <table align=center>
                <thead>
                    <tr>
                        <td>no</td>
                        <td>name</td>
                    </tr>
                </thead>
                
                
                <?php


            $server = "localhost";
            $username = "root";
            $password = "";
            $dbname = "curd";

            $con = mysqli_connect($server,$username,$password,$dbname); 
            
            
            
        //display all data


         
        $sql = "SELECT `no`, `name` FROM `sample`";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
              ?>
           
           <tr><td><?php echo $row["no"];?>  </td>
                 <td><?php echo $row["name"];?>  </td>
           </tr>
           <?php
          }
        }
         ?> 


             
                
            
               
            </table>
                    

</body>
</html>


<?php 




if(isset($_POST['submit']))
{
      //database connection

            $server = "localhost";
            $username = "root";
            $password = "";
            $dbname = "curd";

            $con = mysqli_connect($server,$username,$password,$dbname);

            if(!$con)
            {
                echo"fail";
            }
            

            $no = $_POST['num'];
            $name = $_POST['name'];
           
            $action = $_POST["submit"];
            

// data add btn function

        if($action==1)
            $sql = "INSERT INTO `sample`(`no`, `name`) VALUES ($no,'$name')";

        if(!mysqli_query($con,$sql))
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        // data delete btn function 

        if($action==2)
        {
            
            $sql= "DELETE FROM `sample` WHERE `sample`.`no` = $no";
           $reult=mysqli_query($con,$sql);
           if($result)
           {
               echo " row deleted";
           }
           else{
               echo"delete fail". $sql . mysqli_error($con);
           }
        }
        
//feach all records


    //     $sqll = "SELECT * from `sample`";
        
    //     if ($result = mysqli_query($con, $sqll)) {

    //     // Return the number of rows in result set
    //     $rowcount = mysqli_num_rows( $result );
        
    //     // Display result
    //    // printf("Total rows in this table : %d\n", $rowcount);
    //     }

        // update the data function

        if($action==3)
        {
            $sql="UPDATE `sample` SET `name`='$name' WHERE `no`=$no";
            $result = mysqli_query($con,$sql);
            if(!$result)
            {
                echo "update fail". $sql . mysqli_error($con);
            
            }
            else{
                echo "update succes";
            }
        }

        
        
        // search data from database

        if($action==4)
        {
            $sql="SELECT `no`, `name` FROM `sample` WHERE `no`= $no";
            $result =  mysqli_query($con,$sql);
            if($result)
            {
                $row = mysqli_fetch_assoc($result);
                echo "ID:". $row['no'] ."";
                echo "   NAME  :". $row['name'];  
            }
        }



    }
?>
 
