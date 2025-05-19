<?php
$conn= new mysqli('localhost','root','','groupe');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
      $password=$_POST['password'];
      $sql="SELECT * FROM success WHERE username='$username',AND password='$password'";
      $query=mysqli_query($conn,$sql);
      if($query==true){
        echo"data success";
    
      }else{
        echo"invalid data";
      }
}
      ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tumwine.css">
        <title>Document</title>
      </head>
      <body>
            <form action="select.php"method="POST">
            
<h1>REAL MADRID FANS</h1>
<label>username</label>
<input type="text"placeholder="enter your username"name="username">
<label>password</label>
<input type="text"placeholder="enter your password"name="password">
<button name="submit">submit</button>
    </form>
</body>
</html>
        
      </body>
      </html>