<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 23.10.2018
 * Time: 10:48
 */

function sieve($n)
{
    $S = [];
    $S[1] = 0; // 1 - не простое число
    // заполняем решето единицами
    for ($k = 2; $k <= $n; $k++)
        $S[$k] = 1;

    for ($k = 2; $k * $k <= $n; $k++) {
        // если k - простое (не вычеркнуто)
        if ($S[$k] == 1) {
            // то вычеркнем кратные k
            for ($l = $k * $k; $l <= $n; $l += $k) {
                $S[$l] = 0;
            }
        }
    }
    return $S;
}

echo '<pre>';
$a = sieve(99999);
$arr = [];
$iii = 1;
foreach ($a as $number => $value) {

    if ($number > 10000 && $value == 1) {
        array_push($arr, $number);
    }
}
function findMaxPalindrom($start, $finish)
{
    $a = sieve($finish);
    $arr = [];
    $arr3 = [];
    $iii = 1;
    foreach ($a as $number => $value) {

        if ($number > $start && $value == 1) {
            array_push($arr, $number);
        }
    }

    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            $b = strval($arr[$i] * $arr[$j]);
            $l = strlen($b);
// перемножаем числа и паралельно проверяем их
            if ($l % 2 != 0) {
                $c = str_split(substr($b, 0, floor($l / 2)));
                $d = str_split(substr($b, floor($l / 2) + 1));
                $sum1 = 0;
                $sum2 = 0;
                for ($s = 0; $s < count($c); $s++) {
                    $sum1 += $c[$s];
                }
                for ($s = 0; $s < count($d); $s++) {
                    $sum2 += $d[$s];
                }
                if ($sum1 == $sum2) {
                    $sovpadd = 0;
                    for ($ii = 0, $jj = (count($d) - 1); $ii < count($c); $ii++, $jj--) {
                        if ($c[$ii] == $d[$jj]) {
                            $sovpadd++;
                        } else break;
                    }
                    if ($sovpadd == count($c)) {
                        $arr3Key = "$arr[$i] * $arr[$j]";
                        $res = $arr[$i] * $arr[$j];
                        $arr3[$arr3Key] = $res;
                    }
                }

            }
        }
    }
    return $arr3;
}
function getMaxPalindrom(){
        $finalmass = findMaxPalindrom($_POST['start'],$_POST['end']);
        $maxPalinom =  0;
        $mnozhiteli = '';
        foreach ($finalmass as $key => $value){
            if($value > $maxPalinom){
                $maxPalinom = $value;
                $mnozhiteli = $key;
            }
        }
        $newarr['mnozhiteli'] = $mnozhiteli;
        $newarr['maxPalindrom'] = $maxPalinom;
        return $newarr ;
}

echo '</pre>';
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
        <input type="number" name="start" placeholder="<?=$_POST['start']?>" min="100" max="10000">
    </label>
    <label for=""> Конец диапазона
        <input type="number" name="end" placeholder="<?=$_POST['end']?>" min="200" max="99999">
    </label>
    <button type="submit">Отправить</button>
</form>
<?php     if(isset($_POST['start'])){
    echo "<p>Максимальный палиндром в диапазоне от ".$_POST['start']." до ".$_POST['end']." получиться при перемножении простых чисел ".getMaxPalindrom()['mnozhiteli']."  = ".getMaxPalindrom()['maxPalindrom']." </p";
}

?>
</body>
</html>
