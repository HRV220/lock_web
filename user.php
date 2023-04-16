<!DOCTYPE html>
<html>
<head>
    <title>METANIT.COM</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <style>
   h2 {
    font-size: 26px;
    text-align: center;
    margin: 10px;
   }
   p {
       margin: 30px;
       text-align: center;
   }
   div {
       width: 100%;
       margin: auto;
       padding: 20px;
   }
   table {
        width: 100%;
        border: 1px solid #dddddd;
        border-collapse: collapse;
    }
    table th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #dddddd;
    }
    table td {
        border: 1px solid #dddddd;
        padding: 5px;
    }
  </style>
</head>
<body>
<h2>Пользователь</h2>

<?php
session_start();
$conn = mysqli_connect("localhost", "phpmyadmin", "raspberry1", "zamok_bd");
if($conn->connect_error){
    echo "error";
    die("Ошибка: " . $conn->connect_error);
}


$sql = "SELECT * FROM zamki";
if($result = $conn->query($sql))
{
    echo "
    <div>
    <table>
        <tr>
            <th>user</th>
            <th>room</th>
            <th>status</th>
        </tr>";
    foreach($result as $row)
    {
        if($row['login'] == $_SESSION['login']){
	    $status = ($row['status']) ? 'открыт' : 'закрыт';
            echo "<tr>";
            	echo "<td>" . $row["login"] . "</td>";
            	echo "<td>" . $row["num_room"] . "</td>";
            	echo "<td>" . $status . "</td>";
            echo "</tr>";
            break;
        }
    }
    echo "</div></table>";
    $result->free();
}
else
{
    echo "nope";
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</body>
</html>
