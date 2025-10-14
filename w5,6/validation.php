<?php
session_start();

/* connect to database check user*/
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'login_demo2');

/* create variables to store data */
$name =$_POST['user'];
$pass =$_POST['password'];
$date of birth = $_POST['namsinh'];
$country = $_POST['quoctich'];
$mssv = $_POST['mssv'];
/* select data from DB */
// Mã hóa mật khẩu người dùng nhập vào
$hashed_pass = md5($pass); 

// So sánh username và mật khẩu đã mã hóa
$s = "select * from users where username='$name' and password='$hashed_pass'";
/* result variable to store data */
$result = mysqli_query($con,$s);

/* check for duplicate names and count records */
$num =mysqli_num_rows($result);
if($num==1){
  /* Storing the username and session */
    $_SESSION['username'] =$name;
    header('location:/w5,6/home.php');
}else{
    header('location:login.php');
}
