<?php
include 'avalidate.php';
include 'conn.php';
$id=0;
$bid=$aname=$desc="";
if(isset($_GET['update'])){
    $id = $_GET['id'];
     $qry="select * from apartment where id=$id";
  if ($result = $conn->query($qry)) {
    
    /* fetch object array */
                                  
    if ($row = $result->fetch_assoc()) {
    $bid=$row['bid'];
    $aname=$row['apartmentNum'];
    $desc=$row['description'];
    }
    }
           }

if(isset($_POST['submit'])){
    $bid=$_POST['building'];
    $aname=$_POST['apartment'];
    $desc=$_POST['desc'];
    $id= $_POST['id'];
    
    if($id){
     $qry="Update apartment set bid='$bid',apartmentNum='$aname',description='$desc' where id='$id'";
     $id=0;
     $bid=$aname=$desc="";
    }else{
    $qry="insert into apartment(bid,apartmentNum,description) values('$bid','$aname','$desc')";
    }
    $run=mysqli_query($conn,$qry);
  
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
    <body style="background-image:url('img/i.jpg') ; background-size: cover; background-repeat: no-repeat;">
     <?php
     include 'anav.php';
     ?>
         <div class="row">
         <div class="col-md-4">
        <div style=" margin-top: 1.5%;background:black;color:white; box-shadow: 0px 0px 5px cyan;padding:20px">
        <div style='text-align: center;padding:30px;color:cyan;font-size:20px;text-decoration:blink;     border-radius: 25% 25% 0% 0%'>Enter Apartment Details</div>
        <form class="form-horizontal" action="apartment.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div style="padding-top: 20px;margin-left: 25%">
                <select class="form-control" style="display:inline; width: 80%;" name="building" >
                     <option>Select Building</option>
                    <?php 
                                include 'conn.php';
                                $qry="select * from building";
                                if ($result = $conn->query($qry)) {

    /* fetch object array */
                                  
    while ($row = $result->fetch_assoc()) {
                    ?> 
                    
                     <option value="<?php echo $row['id']; ?>" selected="<?php if($row['id']==$bid){echo 'true';}else{echo 'false';}?>" ><?php echo $row['Name']; ?>
                        </option>
               <?php 
    }
    }
    ?> </select>
            </div><br>
    <div class="form-group" style="margin-top: 5px;">
    <label class="control-label col-sm-2" for="apartment">Apartment </label>
    <div class="col-sm-10" style="margin-top:30px">
        <input type="text" class="form-control" name="apartment" required="" pattern="[0-20]{1-4}" placeholder="Apartment Number" value="<?php echo $aname;?>"/><br>
    </div>
            </div>
            <div style="margin-left: 70px;">
            <div class="form-group" style="margin-top: 2px">
   
    <div class="col-sm-10" style="margin-top:0.1px">
        <textarea class="form-control" name="desc" required="" placeholder="Description" ><?php echo $desc;?></textarea><br>
    </div>
            </div>
            </div>
             <button class="btn btn-warning" type="submit" name="submit" style= "background-color:cyan; color: black;margin-left: 150px" value="add">Submit</button>
        </form>
      </div>
         </div>
        <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed" style="margin-top: 5% ;background:black;color:cyan;box-shadow: 0px 0px 5px">
           <thead style="background:black;color:white">
            <th>ID</th>
             <th>Bid</th>
             <th>Building Name</th>
             <th>Address</th>
              <th>Apartment Num</th>
              <th>Details</th>
              <th>Update</th>
              <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select a.id,a.bid,b.Name,b.Address,a.apartmentNum,a.description
                 from apartment a,building b
                 where a.bid=b.id;";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){
                        
                    
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['bid'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['apartmentNum'];?></td>
                    <td><?php echo $row['description']; ?></td>
                    
                    <td><a href="apartment.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="deleteapartment.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php 
                }
                }
                ?>
            </tbody>
        </table>
                </div>
    </body>
</html>
