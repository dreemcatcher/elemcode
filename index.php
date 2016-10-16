<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div align="center">
    <h1>Домашние работы отсюда http://archive-ipq-co.narod.ru/</h1>

    <?php for($i=1; $i<30; $i++){?>
        <a href="tasks\<?php echo $i?>\index.php"><?php echo $i?></a><br>
    <?php } ?>

</div>
</body>
</html>