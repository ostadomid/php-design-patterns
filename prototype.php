<?php

interface Clonable{
    public function clone() : Clonable;
}

class Sheep implements Clonable{

    private $color;
    private $weight;

    public function __construct($color,$weight)
    {
        $this->color = $color;
        $this->weight = $weight;
    }

    public function clone():Clonable{
        $clone = new Sheep($this->color,$this->weight);
        return $clone;
    }
}

$primary = new Sheep('Black',140);
$clone = $primary->clone();

var_dump($primary);
var_dump($clone);