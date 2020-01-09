<?php
  include('conn.php');


 $sql= 'SELECT  id,rent,tid,oid from rent_log' ;
    $result = mysqli_query($conn, $sql);
    $addc = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
	<meta viewport="width-device-width" initial scale="1.0">
</head>
<body style="background-image:url('img/hh.jpg') ; background-size: cover; background-repeat: no-repeat;">
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

  <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed" style="margin-top: 5% ;background:black;color:cyan;box-shadow: 0px 0px 5px">
          <thead style="background:black;color:white">
            <th>ID</th>
             <th>Rent(in Rs)</th>
              <th>Tenant Id</th>
              <th>Tenant Name</th>
              <th>Owner Id</th>
              <th>Owner Name</th>
               <th>Apartment Num</th>
               <th>Building Name</th>
                <th>Address</th>
                <th>Date of Renting</th>

            </thead>
            <tbody>
                <?php
                $sql = "select r.id,r.rent,r.tid,t.tname,r.oid,o.name,b.Name,b.Address,a.apartmentNum,t.date
                        from rent_log r,tenant t,owner o,building b,apartment a
                        where r.tid=t.id
                        and r.oid=o.id 
                        and r.rent=t.rent
                        and t.building=b.id
                        and t.apartment=a.id;";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){
                        
                    
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['rent'];?></td>
                    <td><?php echo $row['tid'];?></td>
                    <td><?php echo $row['tname'];?></td>
                    <td><?php echo $row['oid'];?></td>
                    <td><?php echo $row['name'];?></td> 
                    <td><?php echo $row['apartmentNum'];?></td>
                     <td><?php echo $row['Name'];?></td>
                     <td><?php echo $row['Address'];?></td>
                     <td><?php echo $row['date'];?></td>
                     
                </tr>
                <?php 
                }
                }
                ?>
            </tbody>
        </table>
                </div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
