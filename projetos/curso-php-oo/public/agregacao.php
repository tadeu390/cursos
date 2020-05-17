<?php
ini_set('display_errors', E_ALL);

class Cart
{
    private $itens = [];

    public function add(Product $produto)
    {
        array_push($this->itens, $produto);
    }

    public function all() : array
    {
        return $this->itens;
    }
}

class Product
{
    public $name;
}
echo '<pre>';

$p1 = new Product;
$p1->name = 'DVD';

$p2 = new Product;
$p2->name = 'Vaso';

$p3 = new Product;
$p3->name = 'Roupa';


$cart = new Cart;
$cart->add($p1);
$cart->add($p2);
$cart->add($p3);
print_r($cart->all());