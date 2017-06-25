<?php

session_start();

require './vendor/autoload.php';
$a = new \Thirday\Json\JsonFormater();
$a->startObject("Homem");
$a->bind("amor","adrieli");
$a->bind("carro", "i30");
$a->startObject("preferências");
$a->bind("sexo", "masculino");
$a->bind("Comida", "parmesão");
$a->endObject();
$a->bind("corrida","Fórmula1");
$a->endObject();

$a->around();

$b= json_decode(file_get_contents('config.json'));
var_dump($b);


