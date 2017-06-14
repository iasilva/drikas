<?php
require_once './vendor/autoload.php';

session_start();
$a = unserialize($_SESSION['cart']);
foreach ($a as $item) {
    echo $item->getProduct()->getDescription()."<br>";
}
echo "<hr>";

