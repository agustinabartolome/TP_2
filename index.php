<?php
$servername = getenv('DB_SERVER');
$username   = getenv('DB_USER');
$password   = getenv('DB_PASSWORD');
$dbname     = getenv('DB_NAME');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM libros";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Listado de libros</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Precio</th>
            <th>Fecha de Publicación</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["titulo"]."</td>
                        <td>".$row["autor"]."</td>
                        <td>".$row["isbn"]."</td>
                        <td>".$row["precio"]."</td>
                        <td>".$row["fecha_publicacion"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay libros registrados</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>