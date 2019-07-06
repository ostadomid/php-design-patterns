<?php 

class Sandwich{
    private $burgerType;
    private $breadType;
    private $sauces=[];

    public function __construct($burger,$bread,$sauces){
        $this->burgerType=$burger;
        $this->breadType = $bread;
        $this->sauces=$sauces;
    }
    public function __toString()
    {
        $sauces = array_reduce($this->sauces, function($old,$new){
            return $old . ", " .$new;
        },"");

        return "$this->burgerType\n$this->breadType\n$sauces";
    }
}

class SandwichMaker{
    private $burgerType;
    private $breadType;
    private $sauces=[];
    

    public function MeetBurger(){
        $this->burgerType='Meet Burger';
    }
    public function CheekenBurger(){
        $this->burgerType='Cheenken Burger';
        return $this;
    }
    public function RegularBread(){
        $this->breadType="Regular Bread";
        return $this;
    }
    public function FrenchBread(){
        $this->breadType="French Bread";
        return $this;
    }
    public function WithWhiteSauce(){
        if(!in_array('White Sauce',$this->sauces)){
            $this->sauces[]='White Sauce';
        }
        return $this;
    }
    public function WithRedSauce(){
        if(!in_array('Red Sauce',$this->sauces)){
            $this->sauces[]='Red Sauce';
        }
        return $this;
    }
    public function Make(){
        return new Sandwich($this->burgerType,$this->breadType,$this->sauces);
    }
    
}

$maker  = new SandwichMaker;

$sandwich = $maker->CheekenBurger()
    ->FrenchBread()
    ->WithRedSauce()
    ->WithWhiteSauce()
    ->WithWhiteSauce()
    ->Make();

echo (string)$sandwich;


