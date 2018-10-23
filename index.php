<?php
include ('function.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Поиск максимального палиндрома</title>
</head>
<body>
<style>

    body{
        max-width: 500px;
        margin: 30px auto;

    }
    input{
        display: block;
        margin: 10px 0;
        padding: 10px 15px;
        border-radius: 3px;
        font-size: 14px;
        width: 100%;
    }
</style>
<form action="#" method="post">
    <label for=""> Начало диапазона
        <input type="number" name="start" placeholder="<?=$_POST['start']?>" min="10" max="10000">
    </label>
    <label for=""> Конец диапазона
        <input type="number" name="end" placeholder="<?=$_POST['end']?>" min="100" max="99999">
    </label>
    <button type="submit">Отправить</button>
</form>
<?php     if(isset($_POST['start'])){
    echo "<p>Максимальный палиндром в диапазоне от ".$_POST['start']." до ".$_POST['end']." получиться при перемножении простых чисел ".getMaxPalindrom()['mnozhiteli']."  = ".getMaxPalindrom()['maxPalindrom']." </p";
}

?>
</body>
</html>
