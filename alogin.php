
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
  body{
    margin:0;
    padding:0;
    background: url(img/signin1.jpg) no-repeat;
    background-size:1500px 682px;
    font-family: sans-serif;

}
ul{
  margin:1px;
  padding:1px;
  list-style:none;
}
ul li{
  float:left;
  width:300px;
  height:40px;
    background-color:black;
    opacity:.8;
    line-height:40px;
    text-align:center;
    float-size:10px;
    margin-right:20px;
    margin-left: 20px;
}

  ul li a{

    text-decoration-color:black;
    color:darkgrey;
    display:block; 
}
ul li a:hover{
  background-color:cyan;
 text-decoration-color: black; 
}
ul li ul li{
  display:none;

}
ul li:hover ul li{
  display:block;
}
</style>
<body>
  <ul>
      <li><a href="index.php">Home</a>


           </li>
       </ul>

  <div class="box" style="background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.8);">
        <h1>ADMIN SIGN IN</h1>
       <form class="form-horizontal" action="loginHandler.php" method="post">
  <div class="form-group">
     <input type="email" class="form-control" name="email" placeholder="E-mail ID"required/>
       <div class="col-sm-10"> 
      <input type="password" class="form-control" name="pwd"placeholder="Password"required/>

      <input class="btn btn-warning" name="adminBtn" type="Submit" class="btn btn-default"value="LOGIN" >
      <a href="register.php" style="font-size: medium;">Don't have an account?Sign Up</a>
      </form>
    </div>
  </div>
</body>


</html>


