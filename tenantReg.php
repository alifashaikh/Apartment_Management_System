<?php
include 'ovalidate.php';
include 'conn.php';
$login_session1=$_SESSION['oid'];
$que="select owned from owner where id='$login_session1'";
$result= mysqli_query($conn,$que); 
if ($result) {
$rowsq=mysqli_fetch_array($result);
}
$login_session=$rowsq['owned'];
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
<body style="background-image:url('img/contact.jpg');background-size:1380px 660px;">
  </style>
</head>
    <body>
        <?php
        include 'onav.php';
        include 'conn.php';
        
        if(isset($_POST['submit'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $mobile= $_POST['mobile'];
            $building=$_POST['building'];
            $apartment=$_POST['apartment'];
            $rent=$_POST['rent'];
            
            $qry="insert into tenant(tname,email,mobile,building,apartment,rent,date,oid) value('$name','$email','$mobile','$building','$apartment','$rent',CURDATE(),'$oid');";
            $run= mysqli_query($conn,$qry);         
        }
        ?>
       <div class="row">
         <div class="col-md-4">
        <div style=" margin-top: 1.5%;background:black;color:white; box-shadow: 0px 0px 5px cyan;padding:20px">
        <div style='text-align: center;padding:30px;color:cyan;font-size:20px;text-decoration:blink;     border-radius: 25% 25% 0% 0%'>Tenant Registration</div>
            <legend></legend>
                <form class="form-horizontal" action="tenantReg.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
             <div class="form-group" style="margin-top: 5px;margin-left:1%">  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 <input style="width: 350%" name="name" placeholder=" Name" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group" style="margin-left: 1%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input  name="email" style="width: 350%" placeholder="you@example.org" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            
            <div class="form-group" style="margin-left: 1%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  name="mobile" style="width: 350%" placeholder=" +91<10 digit>" required="" class="form-control"  type="text" value="" >
</div>
  </div>
</div>
           
            
           <select class="form-control" style="display:inline; width: 50%;margin-bottom:10px;margin-left: 20px "  name="building" id="building">
                 <option>Select Building</option>
                    <?php 
                                include 'conn.php';
                                $qry="select * from building where id='$login_session';";
                                if ($result = $conn->query($qry)) {

    /* fetch object array */
                                  
    while ($row = $result->fetch_assoc()) {
                    ?> 
               
                    <option value="<?php echo $row['id' ]; ?>"><?php echo $row['Name']; ?>
                        </option>
      <?php 
    }
    }
    ?> 
      </select>
                         <select class="form-control" style="display:inline;  width: 50%;margin-bottom: 10px;margin-left: 20px"  name="apartment" id="apartment">
                 <option>Select Apartments</option>
                    <?php 
                                include 'conn.php';
                                $qry="select * from apartment where bid='$login_session';";
                                if ($result = $conn->query($qry)) {

    /* fetch object array */
                                  
    while ($row = $result->fetch_assoc()) {
                    ?> 
               
                    <option value="<?php echo $row['id' ]; ?>"><?php echo $row['apartmentNum']; ?>
                        </option>
               <?php 
    }
    }
    ?> 
  </select>
   <div class="form-group" style="margin-left:1%;">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
  <input  name="rent" style="width:220%" placeholder=" Rent Amount" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
 <button type='submit' class="btn btn-warning" style="margin-left: 20px"name="submit" value="submit" >Register</button>
          </div></div>
               </form>

               <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed" style="margin-top: 5% ;background:black;color:cyan">
            <thead style="background:black;color:white">
             <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Building</th>
        <th>Apartment Number</th>
        <th>Rent</th>
        <th>Date</th>
          <th>Delete</th>
            </thead>
            <tbody>
                <?php 
         include 'conn.php';
         $sql = "select t.id,t.tname,t.email,t.mobile,b.name,a.apartmentNum,t.rent,t.date
         from tenant t,building b,apartment a
          where oid = $oid
          and t.building=b.id
          and t.apartment=a.id";
         if ($result = $conn->query($sql)) {

    /* fetch object array */
    while ($row = $result->fetch_assoc()) {
       
        ?>
            <tr>
                
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['tname']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['mobile']?></td>
                 <td><?php echo $row['name']?></td>
                 <td><?php echo $row['apartmentNum']?></td>
                 <td><?php echo $row['rent']?></td>
                 <td><?php echo $row['date']?></td>
                <td><a href="deletetenant.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></i></a></td> 
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
            $.get("restful/getAprtsTenant.php?bid="+bid, function(data, status){
               
                $('#aprt').html(data);
                console.log("success");
            });
         });
         </script>
        
    </body>