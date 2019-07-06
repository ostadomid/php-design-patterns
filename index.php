<?php
use DI\ContainerBuilder;

require __DIR__.'./vendor/autoload.php';

class Person {
    public $name;
    public function sayHello(){
        echo "\nHello\n";
    }
    public static function sayPI(){
        echo "\n3.1415\n";
    }
}

function call(callable $f){
    if(is_array($f)){
        $obj = $f[0];
        $met = $f[1];
        $obj->$met();
    }
    else if(is_string($f)){

    }
}

$p = new Person;




$container = (new ContainerBuilder)->build();

$container->call('Person::sayPI');
$container->call('Person::sayHello');
$container->call(['Person','sayHello']);


[$p,'sayPI']();
[$p,'sayHello']();
['Person','sayPI']();
['Person','sayHello'](); // sayHello is not a static method so we need an object to call this and the first parameter is not an object 
'Person::sayPI'();
'Person::sayHello'(); // 



