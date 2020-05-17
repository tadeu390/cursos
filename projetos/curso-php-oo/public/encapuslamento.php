<?php

ini_set('display_errors', E_ALL);

class Pessoa
{
    private $name;
    private $fullName;

    public function setName(String $name)
    {
        $this->name = $name;
    }

    public function getName() : String
    {
        return $this->name;
    }
}

$tadeu = new Pessoa;
$tadeu->setName(1);

echo $tadeu->getName();