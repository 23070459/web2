<?php
//Should fix the security concern here.
    if(isset($_COOKIE['username'])){
        $username = $_COOKIE['username'];
        echo "Welcome " . $username . "<br/>";
?>
<form action="removeCookie.php" method="post">
    <input type="submit" value="Remove cookie"/>
</form>
<?php
    }else{
?>
        <form action="setCookie.php" method="post">
            User name: <input type="text" name="username"/>
            <input type="submit"/>
        </form>
<?php
}
?>