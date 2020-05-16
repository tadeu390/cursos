<?php
use \App\Controllers\HomeController;


require('../vendor/autoload.php');

$query = new \conf\DB\Query;

var_dump($query->query());

$home = new HomeController();

var_dump($home->index());

//arquivos mapeados automaticamente
//pelo files do composer
var_dump(getTrim(' teste '));

//chamando classes mapeadatas automaticamente
//gra�as ao class map, por�m toda vez que se 
//adiciona uma classe nova de rodar o autoload do
//composer
$object = new MyClass();
var_dump($object->myMethod());

$object = new MyClass2();
var_dump($object->myMethod2());




