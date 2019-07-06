<?php

abstract class Chainable{
    private $next;

    abstract public function Process($data);
    public function Next($data){

        if(isset($this->next)){
            return $this->next->Process($data);
        }
        return false;
    }
    public function SetNext($n){
        $this->next = $n;
    }
}

class Locks extends Chainable{
    public function Process($data){
        if($data['locks']==true){
            return "\nLocks are set\n" . $this->Next($data);
        }
        return "\nLocks are not set!!!\n";
    }
}

class Doors extends Chainable{
    public function Process($data){
        if($data['doors']==true){
            return "\nDoors are closed.\n".$this->Next($data);
        }
        return "\nDoors are not closed!!!\n";
    }
}

$status = [ 'locks'=> true , 'doors'=>false];

$locks = new Locks;
$doors = new Doors;

$locks->SetNext($doors);

echo $locks->Process($status);





