<?php
function checkAuth(string $login, string $password): array
{
    $conn = mysqli_connect("localhost", "phpmyadmin", "raspberry1", "zamok_bd");
    if($conn->connect_error)
    {
        echo "error";
        die("Ошибка: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users";
    if($result = $conn->query($sql))
    {
        $answer = false;
        $rowsCount = $result->num_rows; // количество полученных строк
        foreach($result as $row)
        {
            if ($row['login'] == $login && $row['password'] == $password)
            {
                $answer = true;
		$lvl_admin = $row['admin'];
            }
        }
        $result->free();
        return array($answer,$lvl_admin);
    }
}
?>
