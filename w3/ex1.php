<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is my first PHP</h1>
    <p>
        <?php
            $x =  $_GET["x"];
            $y =  $_GET["y"];
            $z = $x + $y;
            echo "The sum of x and y is:<br> " . $z;
        ?>
    </p>
</body>
</html>

</html>