<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Каталог товаров</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<h1>Каталог товаров</h1>
<ol>
    <?php
    $mysqli = new mysqli("db", "root", "password", "toyshop");
    $result = $mysqli->query("SELECT * FROM products");
    foreach ($result as $row){
        echo "<li>{$row['name']} {$row['price']}руб. {$row['description']}</li>";
    }
    ?>
</ol>

</body>
</html>
