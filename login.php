
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
	    $_SESSION['key_admin'] = 2212;
            header('Location: index.php');}
	else{ 
	    $_SESSION['key_user']=2210;
	    header('Location: /user.php');}
    } else {
        header('Location: /index.html');       
    }
}
?>
