<?php
ini_set('display_errors', E_ALL);

class MyClass
{
    private $nome;
    private $cpf;
    private $idade;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}

/* $obj = new MyClass;
$obj->nome = 'Tadeu';
$obj->cpf = '123123123';
$obj->idade = '25';
echo $obj->nome; */


################################################################
/**
 * NA CHAMADA DE UM MÉTODO, SE O MESMO NÃO EXISTIR NA CLASSE, O MÉTODO CALL OU CALLSTATIC
 * É CHAMADO POSSUINDO O NOME DO METODO QUE TENTARAM ACESSAR E OS ARGUMENTOS PASSADOS
 */
class Str
{
    public function __call($name, $arguments)
    {
        if ($name == 'upper') {
            return strtoupper($arguments[0]);
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name == 'upper') {
            return strtoupper($arguments[0]);
        }
    }

    /**
     * Retorna o que quiser conforme for definido dentro do método
     * a chamada dele ocorre quando se chama o objeto instanciado ex.: echo $obj;
     */
    public function __toString()
    {
        return "10";
    }
}

$obj = new Str;
echo $obj->upper('valor');
echo '<br />';
echo $obj;
echo '<hr>';

echo Str::upper('valor static');










