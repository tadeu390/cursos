<?php
ini_set('display_errors', E_ALL);

class Endereco
{
    public $rua;
    public $numero;
    public $bairro;
}

class Usuario
{
    public $name;
    private $endereco;

    public function setEndereco($rua, $numero, $bairro)
    {
        $endereco = new Endereco;
        $endereco->rua = $rua;
        $endereco->numero = $numero;
        $endereco->bairro = $bairro;

        $this->endereco = $endereco;
    }

    public function getEndereco() : array
    {
        return [
            'Rua' => $this->endereco->rua,
            'numero' => $this->endereco->numero,
            'bairro' => $this->endereco->bairro
        ];
    }
}

echo '<pre>';

$usuario = new Usuario;
$usuario->name = 'Tadeu';
$usuario->setEndereco('Rua dos paranaue', '234', 'louco');

echo $usuario->name;
echo '<br />';
print_r($usuario->getEndereco());