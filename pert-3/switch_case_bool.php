<?php
$x = -4;

$boolExpr = ($x < 0);
switch ($boolExpr) {
    case TRUE:
        echo "Harga mutlak : " . $x;
        break;
    case FALSE:
        echo "Harga mutlak : " . $x;
        break;

    default :
        echo "Harga mutlak default";
        break;
}