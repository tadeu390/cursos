<?php

ini_set('display_errors', E_ALL);

class Escola
{
    const PID = 10;
    private static $saldo = 0.0;

    public static function getSaldo()
    {
        return self::$saldo;
    }

    public static function addSaldo(float $valor)
    {
        self::$saldo += $valor;
    }
}

$escola01 = new Escola;
$escola02 = new Escola;
echo $escola01::PID;
echo '<br />';
echo '<hr>';

class Aluno
{
    private $name;
    private $saldo = 0.0;

    public function setSaldo(float $saldo)
    {
        $this->saldo = $saldo;
    }

    public function getSaldo() : float
    {
        return $this->saldo;
    }

    public function recarga($valor)
    {
        $this->saldo += $valor;
    }

    public function novaCompra($valor)
    {
        if ($this->getSaldo() >= $valor) {
            $this->setSaldo($this->getSaldo() - $valor);
            Escola::addSaldo($valor);
        } else {
            return "Saldo insuficiente";
        }
    }
}

echo '<br />';

$aluno01 = new Aluno;
echo $aluno01->getSaldo();
echo '<br />';
$aluno01->setSaldo(50.0);
echo $aluno01->getSaldo();
echo '<br />';
echo $aluno01->novaCompra(20.0);
echo '<br />';
echo $aluno01->getSaldo();
echo '<br />';
echo '<hr>';

$aluno02 = new Aluno;
echo $aluno02->getSaldo();
echo '<br />';
$aluno02->setSaldo(50.0);
echo $aluno02->getSaldo();
echo '<br />';
echo $aluno02->novaCompra(20.0);

echo '<hr>';
echo '<br />';
echo $escola01::getSaldo();
echo '<br />';
echo $escola02::getSaldo();