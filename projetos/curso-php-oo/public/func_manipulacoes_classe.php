<?php
ini_set('display_errors', E_ALL);

class MyClassDad
{

}


class MyClass extends MyClassDad
{
    public $name;
    private $id;
    protected $lastName;

    public function method1() : String
    {
        return 'teste';
    }

    protected function method2() :void
    {

    }

    private function method3() :void
    {

    }
}
$obj = new MyClass;

//$methods = get_class_methods($obj);
//$methods = get_class_methods('MyClass');
$methods = get_class_methods(MyClass::class);
//print_r($methods);

$attributes = get_class_vars(MyClass::class);
//print_r($attributes);

//ACEITA COMO PARAMETRO UM OBJETO, ISTO É, UMA INSTANCIA. NAO ACEITANDO APENAS A CLASSE.
$vars = get_object_vars($obj);
//print_r($vars);

//print_r(get_class($obj));

//echo get_parent_class($obj); //retorna o nome classe pai

//echo is_subclass_of($obj, MyClassDad::class); //verifica se o objeto é subclasse da classe informada no segundo parametro

//echo method_exists($obj, 'method1');
//var_dump(property_exists($obj, 'id'));



//call_user_func EXECUTA UM MÉTODO APENAS INFORMANDO O NOME DELE COMO UMA STRING
//IDEAL PRA ROTAS, COMO NO LARAVEL.
/*function teste($prm1 = 1, $prm2 = 2)
{
    return $prm1."-".$prm2;
}

$functionName = 'teste';
$className = 'MyClass';
$params = [1, 2];

//echo call_user_func($functionName, ... $params);
echo call_user_func('teste');
//PARA USAR EM CLASSES, USAR DENTRO DA PRÓPRIA CLASSE.

*/

//PARA USAR EM CLASSES SÓ QUE FORA DELA, AO CONTRARIO DO CALL_USER_FUNC
//echo call_user_func_array([$obj, 'method1'], []);

$className = 'MyClass';
var_dump(class_exists($className));
new $className;