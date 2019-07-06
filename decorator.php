<?php
namespace Decorator;

interface SandwichInterface{
    public function make();
}
class Sandwich implements SandwichInterface{
    private $type;
    
    public function __construct(string $type) {
        $this->type = $type;
    }
    public function make(){
        return "\n$this->type sandwich is ready ;)\n";
    }
}

class RedSauce{
    private $sandwich;
    public function __construct(SandwichInterface $sandwich) {
        $this->sandwich = $sandwich;
    }
    public function apply(){
        echo $this->sandwich->make() . "\nRed sauce is on top of it!\n";
    }
}



$sandwich = new Sandwich('Steak');
(new RedSauce($sandwich))->apply();
