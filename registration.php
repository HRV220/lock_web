<?php
if (isset($_POST["login"]) && isset($_POST["password"])) {
      
    $conn = new mysqli("localhost", "phpmyadmin", "raspberry1", "zamok_bd");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $login = $conn->real_escape_string($_POST["login"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $sql1 = "SELECT id FROM users WHERE login='".$login."'";
    $result = $conn->query($sql1);
    $id = $result->fetch_assoc();
    if($id==null){
    	$sql = "INSERT INTO users (login, password,admin) VALUES ('$login', '$password','0')";
	$conn->query($sql);
	header("Location: /index.html");
    }
    else{
	echo '<script type ="text/javascript">alert("Такой пользователь уже существует")</script>';
	}

    $conn->close();
}
?>
