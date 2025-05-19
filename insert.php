<?php
$conn= new mysqli('localhost','root','','groupe');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
     $email=$_POST['email'];
      $password=$_POST['password'];
      $sql="INSERT INTO success(username,email,password)VALUES('$username','$email','$password')";
      $query=mysqli_query($conn,$sql);
      if($query==true){
        echo"data inserted";
        header('location:select.php');
      }else{
        echo"data not inserted";
      }
}
?>