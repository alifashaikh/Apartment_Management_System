<html>
    <head>
        <title>Apartment management</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('img/hj.jpg');">
        <?php
        include 'anav.php';
        include 'conn.php';
include 'avalidate.php';


        //new reccord
        if(isset($_POST['submit'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $pass= $_POST['pass'];
            $mobile= $_POST['mobile'];
            $owned=$_POST['owned'];
            
             $qry="insert into owner(name,email,password,mobile,owned) value('$name','$email','$pass','$mobile','$owned');";
            $run= mysqli_query($conn,$qry);
            
        }
        ?>
        <div class="row">
         <div class="col-md-4">
        <div style=" margin-top: 1.5%;background:black;color:white; box-shadow: 0px 0px 5px cyan;padding:20px">
        <div style='text-align: center;padding:30px;color:cyan;font-size:20px;text-decoration:blink;     border-radius: 25% 25% 0% 0%'>Owner Registration</div>
            <legend></legend>
            <form class="form-horizontal" action="oregistration.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
         
             <div class="form-group" style="margin-top: 5px"> 
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input style="width: 150%" name="name" placeholder=" Name" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
          <div class="form-group" style="margin-top: 1px">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input  name="email" style="width: 150%" placeholder="you@example.org" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            
          <div class="form-group" style="margin-top: 1px">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input  name="pass" style="width: 150%" placeholder=" Password" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
       <div class="form-group" style="margin-top: 1px">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  name="mobile" style="width: 150%" placeholder=" +91<10 digit>" required="" pattern="[0-9]{10}"class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            
                  <div class="form-group" style="margin-top: 1px">
  <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <select class="form-control" style="display:inline; width: 150%;" name="owned" id="building" >
                 <option>Select Building</option>
                    <?php 
                                include 'conn.php';
                                $qry="select * from building";
                                if ($result = $conn->query($qry)) {

    /* fetch object array */
                                  
    while ($row = $result->fetch_assoc()) {
                    ?> 
               
                    <option value="<?php echo $row['id' ]; ?>"><?php echo $row['Name']; ?>
                        </option>
               <?php 
    }
    }
    ?> </select>



    
            </div>
  </div></div>
            
          
            <button type='submit' class="btn btn-warning" name="submit" style= "background-color:cyan; color: black;margin-left: 150px" value="submit" >Register</button>
          </div></div>
               </form>

               <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed" style="margin-top: 5% ;background:black;color:cyan;box-shadow: 0px 0px 5px">
            <thead style="background:black;color:white">
            <th>ID</th>
             <th>Name</th>
              <th>Email</th>
               <th>Mobile No</th>
               <th>BuildingID</th>
             <th>Building Name</th>
               <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select o.id,o.name,o.email,o.mobile,o.owned,b.Name
                 from owner o,building b
                 where o.owned=b.id;";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){     
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['owned'];?></td>
                   <td><?php echo $row['Name'];?></td>
                   
                    <td><a href="deleteowner.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php 
                }
                }
                ?>
            </tbody>
        </table>
                    </div>
                </div>
        














        
        <script>
//      let planrates = new Map(); 
          $("#building").change(function(){
                    console.log("Reached building change");
                    var bid=$("#building").val();
                      console.log("bid:"+bid);
            $.get("restful/getAprts.php?bid="+bid, function(data, status){
               
                $('#aprt').html(data);
                console.log("success");
            });
         });
         </script>
    </body>