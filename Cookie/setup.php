<?php
//setupusers.php
require_once './login.php';
$conn = new mysqli($hostname, $username, $password, $database, $port);
if ($conn->connect_error) die("Connect failed: " . $conn->connect_error);

// Salt: Chuỗi ký tự bí mật thêm vào mật khẩu
$salt1 = "qm&h*";
$salt2 = "pg!@";

$forename = 'Bill';
$surname = 'Smith';
$username = 'bsmith';
$password = 'mysecret';
// Mã hóa: hash(thuật toán, salt1 + pass + salt2)
$token = hash('ripemd128', "$salt1$password$salt2");
add_user($conn, $forename, $surname, $username, $token);
$forename = 'Pauline';
$surname = 'Jones';
$username = 'pjones';
$password = 'acrobat';
$token = hash('ripemd128', "$salt1$password$salt2");

// Hàm thêm user vào database
add_user($conn, $forename, $surname, $username, $token);
function add_user($conn, $forename, $surname, $username, $token){
	// Dùng tên cột rõ ràng và escape dữ liệu trước khi chèn
	$f = $conn->real_escape_string($forename);
	$s = $conn->real_escape_string($surname);
	$u = $conn->real_escape_string($username);
	$p = $conn->real_escape_string($token);
	$query = "INSERT INTO users (forename, surname, username, password) VALUES('$f', '$s', '$u', '$p')";
	$result = $conn->query($query);
	if(!$result) {
		// In lỗi nhưng không dừng toàn bộ script để có thể chèn user tiếp theo
		echo "Insert error for user $username: " . $conn->error . "\n";
		return false;
	}
	return true;
}
?>
