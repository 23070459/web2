<?php
//setCookie.php
//TODO: Fix the security concern here
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    setcookie("username", $username, time() + 60 * 60 * 24 * 30);
    echo 'Set cookie successfully<br/>"';
    echo 'Click <a href="index.php">here</a> to go back';
}
?>