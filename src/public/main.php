<?php
require_once("Garden.php");

//Этап 1
echo "<h3>Этап 1. Создание сада.</h3>Сад:";
$my_garden = new Garden;

echo "<pre>";
print_r($my_garden->garden);
echo "</pre>";


//Этап 2
echo "<h3>Этап 2. Посадка 10 яблонь и 15 груш.</h3>Сад:";
$my_garden->add('apple', 10);
$my_garden->add('pear', 15);

echo "<pre>";
print_r($my_garden->garden);
echo "</pre>";


//Этап 3
echo "<h3>Этап 3. Сбор и подсчет веса урожая.</h3>";
echo $my_garden->pickAll();

echo "<br><br>Сад:<br>";
echo "<pre>";
print_r($my_garden->garden);
echo "</pre>";