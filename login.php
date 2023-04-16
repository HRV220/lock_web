0;32;53M0;32;53m
<?php
session_start();
if (!empty($_POST)) {
    require __DIR__ . '/auth.php';

    $login = $_POST['login'] ?? '';
    $_SESSION["login"] = $login;
    $password = $_POST['password'] ?? '';
    $_SESSION["password"] = $password;
    $arr = CheckAuth($login, $password);
    if ($arr[0]) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
	if($arr[1]){
            header('Location: /index.php');}
	else{ 
		header('Location: /user.php');}
    } else {
        header('Location: /index.html');       
    }
}
?>
