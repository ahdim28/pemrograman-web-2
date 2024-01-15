<?php

$bilangan = $_POST['bilangan'];

if ($bilangan % 2 == 0) {
    echo "$bilangan adalah bilangan BULAT";
} else {
    echo "$bilangan adalah bilangan GANJIL";
}
