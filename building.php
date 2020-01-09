<?php
include 'avalidate.php';
include 'conn.php';

//For update
$id = $name= $add= $dev = "";
if(isset($_GET['update'])){
 $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $sql = "select * from building where id=$id;";
                $result=mysqli_query($conn,$sql);
                if($result){
                    if($row = $result->fetch_assoc()){
                        $id= $row['id'];
                         $name= $row['Name'];
                          $add= $row['Address'];
                           $dev= $row['Developer'];
                    }
                    }
    
}

// for new record
if(isset($_POST['submit'])){
    
    $name=$_POST['bname'];
    $address=$_POST['address'];
    $developer=$_POST['developer'];
    
    if(isset($_POST['id']) && $_POST['id']){
        $id= $_POST['id'];
        $qry = "update building set Name='$name',Address='$address',Developer='$developer' where id=$id";
       
     }else{
         
        $qry="insert into building(Name,Address,Developer) values('$name','$address','$developer')";
     }
//     echo $qry;
    $run=mysqli_query($conn,$qry);
    if($run==true){
        if(isset($_POST['id'])){
        //echo 'record Updated';
        $id = $name= $add= $dev = "";
        }
    }
    else{
        echo 'error executing query';
    }
}
?>
<html>
    <head>
        <title>Apartment management</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    </head>
    <body style="background-image:url('img/indi.jpg') ; background-size: cover; background-repeat: no-repeat;">
      <nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="building.php">Home</a>
      <a class="navbar-brand" href="admindet.php">Admins</a>
    </div>
    <ul class="nav navbar-nav pull-right">
     
        <li><a href="building.php">Buildings</a></li>
        <li><a href="apartment.php">Apartments</a></li>
         <li><a href="oregistration.php">Owner Registration</a></li>
         <li><a href="rentdet.php">Rent Details</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

        <div class="row">
         <div class="col-md-4">
        <div style=" margin-top: 1.5%;background:black;color:white; box-shadow: 0px 0px 5px cyan;padding:20px">
        <div style='text-align: center;padding:30px;color:cyan;font-size:20px;text-decoration:blink;     border-radius: 25% 25% 0% 0%'>Enter Building details</div>
        <form class="form-horizontal" action="building.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div class="form-group" style="margin-top: 5px">
    <label class="control-label col-sm-2" for="building">Building</label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="bname" placeholder="Enter Building Name" value="<?php echo $name;?>"/><br>
    </div>
            </div>
            
            <div class="form-group" style="margin-top: 1px">
    <label class="control-label col-sm-2" for="building">Address </label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo $add;?>"/><br>
    </div>
            </div>
            
            <div class="form-group" style="margin-top: 1px">
    <label class="control-label col-sm-2" for="building">Developer </label>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="developer" placeholder="Developer Name" value="<?php echo $dev;?>"/><br>
    </div>
            </div>
            <button class="btn btn-warning" type="submit" name="submit" style= "background-color:cyan; color: black;margin-left: 150px" value="add">Submit</button>
        </form>
        </div>
        </div>
            <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed" style="margin-top: 5% ;background:black;color:cyan;box-shadow:0px 0px 5px cyan">
            <thead style="background:black;color:white">
            <th>ID</th>
             <th>Name</th>
              <th>Address</th>
               <th>Developer</th>
               <th>Update</th>
               <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from building;";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){
                        
                    
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['Developer'];?></td>
                    <td><a href="building.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="deleteBuilding.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php 
                }
                }
                ?>
            </tbody>
        </table>
                    </div>
                </div>
        </div>
    </body>
</html>
