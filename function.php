<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 23.10.2018
 * Time: 15:14
 */


function findSimpleNumbers($n)
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

function findMaxPalindrom($start, $finish)
{
    $a = findSimpleNumbers($finish);
    $arr = [];
    $arr3 = [];
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