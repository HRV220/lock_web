<!DOCTYPE html>
<html>
<head>
    <title>METANIT.COM</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="/style.css">
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
<h2>Список пользователей</h2>
<?php
session_start();
if($_SESSION['key_admin']==2212){
$conn = mysqli_connect("localhost", "phpmyadmin", "raspberry1", "zamok_bd");
if($conn->connect_error){
    echo "error";
    die("Ошибка: " . $conn->connect_error);
}


$sql = "SELECT * FROM zamki";
if($result = $conn->query($sql))
{
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "
    <div>
    <table>
        <tr>
            <th>Id</th>
            <th>login</th>
            <th>status</th>
            <th>room</th>
        </tr>";
    foreach($result as $row)
    {
        echo "<tr>";
            echo "<td> <a href='#'>" . $row["id"] . "</a></td>";
            echo "<td>" . $row["login"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["num_room"] . "</td>";
        echo "</tr>";
    }
    echo "</div></table>";
    $result->free();
} 
else
{
    echo "nope";
    echo "Ошибка: " . $conn->error;
}
$conn->close();}
else { header('Location: /index.html');}
?>
</body>
</html>
