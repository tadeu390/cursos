<?php
ini_set('display_errors', E_ALL);

abstract class Conta
{
	var $number;
	var $name;

	public function setNumber(String $number)
	{
		$this->number = $number;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function setName(String $name)
	{
		$this->name = $name;
	}
	//impede com que o método getName seja sobrescrito nas classes que extendem dessa classe.
	final public function getName()
	{
		return $this->name;
	}

	//Por estar definido aqui, mostra a mensagem de erro de que
	// é obrigatório sua criação em todas as classes que estendem dessa.
	abstract public function getData();
}

//colocando a palavra final no inicio, impede com que outras classes extendam dessa classe.
final class ContaPfis extends Conta
{
	var $cpf;

	public function setCpf(String $cpf)
	{
		$this->cpf = $cpf;
	}

	public function getCpf() : String
	{
		return $this->cpf;
	}

	public function getData()
	{
		return [
			'Nome' => $this->getName(),
			'Number' => $this->getNumber(),
			'CPF' => $this->getCpf()
		];
	}
}

class ContaPJUR extends Conta
{
	var $cnpj;

	public function setCnpj(String $cnpj)
	{
		$this->cnpj = $cnpj;
	}

	public function getCnpj()
	{
		return $this->cnpj;
	}

	public function setName(String $name)
	{
		$this->name = strtoupper($name);
	}

	public function getData()
	{
		return [
			'Nome' => $this->getName(),
			'Number' => $this->getNumber(),
			'CNPJ' => $this->getCnpj()
		];
	}
}

echo '<pre>';
$tadeu = new ContaPfis;
$tadeu->setNumber('h3e33r');
$tadeu->setName('Tadeu Renó');
$tadeu->setCpf('123.212.123-66');
var_dump($tadeu->getData());

echo '<br />';

$empresa = new ContaPJUR;
$empresa->setNumber('4546456');
$empresa->setName('Empresa');
$empresa->setCnpj('12.123.123/0001-34');
var_export($empresa->getData());