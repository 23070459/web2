<?php
session_start();
header("location:/w5,6/login(1).php");
/* connect to database check user*/
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'login_demo2');

/* create variables to store data */
$name =$_POST['user'];
$pass =$_POST['password'];
$namsinh = (int) $_POST['namsinh'];  
$quoctich = $_POST['quoctich'];
$mssv =(int) $_POST['mssv'];
/* select data from DB */
$s="select * from users where name='$name'";

/* result variable to store data */
$result = mysqli_query($con,$s);

/* check for duplicate names and count records */
$num =mysqli_num_rows($result);
if($num==1){
    echo "Username Exists";
}else{
    $reg = "INSERT INTO users(username, password, namsinh, quoctich) VALUES ('$name', md5('$pass'), '$namsinh', '$quoctich')";    mysqli_query($con,$reg);
    echo "registration successful";
}
