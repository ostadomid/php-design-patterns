<?php
namespace Decorator2;

interface PizzaItemInterface{
    public function apply();
    public function cost();
}

class Bread implements PizzaItemInterface{
    private $pizzaItem;
    public function __construct(PizzaItemInterface $pi = null) {
        $this->pizzaItem = $pi;
    }
    public function apply(){
        if(isset($this->pizzaItem)){
            $this->pizzaItem->apply();
        }
        echo "\n- Bread Applied \n";
    }
    public function cost(){
        $itemCost = 0;
        if(isset($this->pizzaItem)){

            $itemCost = $this->pizzaItem->cost();
        }
        return 10 + $itemCost;
    }
}


class Chicken implements PizzaItemInterface{
    private $pizzaItem;
    public function __construct(PizzaItemInterface $pi=null) {
        $this->pizzaItem = $pi;
    }
    public function apply(){
        if(isset($this->pizzaItem)){
            $this->pizzaItem->apply();
        }
        echo "\n- Chicken Applied \n";
    }
    public function cost(){
        $itemCost = 0;
        if(isset($this->pizzaItem)){

            $itemCost = $this->pizzaItem->cost();
        }
        return 30 + $itemCost;
    }
}

class RedSauce implements PizzaItemInterface{
    private $pizzaItem;
    public function __construct(PizzaItemInterface $pi=null) {
        $this->pizzaItem = $pi;
    }
    public function apply(){
        if(isset($this->pizzaItem)){
            $this->pizzaItem->apply();
        }
        echo "\n- RedSauce Applied \n";
    }
    public function cost(){
        $itemCost = 0;
        if(isset($this->pizzaItem)){

            $itemCost = $this->pizzaItem->cost();
        }
        return 5 + $itemCost;
    }
}

class WhiteSauce implements PizzaItemInterface{
    private $pizzaItem;
    public function __construct(PizzaItemInterface $pi=null) {
        $this->pizzaItem = $pi;
    }
    public function apply(){
        if(isset($this->pizzaItem)){
            $this->pizzaItem->apply();
        }
        echo "\n- WhiteSauce Applied \n";
    }
    public function cost(){
        $itemCost = 0;
        if(isset($this->pizzaItem)){

            $itemCost = $this->pizzaItem->cost();
        }
        return 5 + $itemCost;
    }
}


$simple_pizza = ( new Chicken( new Bread));
$simple_pizza->apply();
echo $simple_pizza->cost();

$full_pizza = (new RedSauce(new WhiteSauce( new Chicken( new Bread))));
$full_pizza->apply();
echo $full_pizza->cost();




