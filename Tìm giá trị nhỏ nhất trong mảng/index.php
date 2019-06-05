<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $arr=[4,-3,5,-45,4,5,3];
    include 'Min.php';
    $min = new Min();
    echo $min->findMin($arr)
    ?>
</body>
</html>
