<?php 

interface Command {
    public function execute();
}

interface ElectronicDeviceInterface{
    public function on();
    public function off();
}
class TV implements ElectronicDeviceInterface{
    public function on(){
        echo "\nTv is on\n";
    }
    public function off(){
        echo "\nTv is off\n";
    }
}

class SetTVOn implements Command{
    private $tv;
    public function __construct(ElectronicDeviceInterface $tv)
    {
        $this->tv = $tv;
    }
    public function execute(){
        $this->tv->on();
    }
}

class SetTVOff implements Command{
    private $tv;
    public function __construct(ElectronicDeviceInterface $tv)
    {
        $this->tv = $tv;
    }
    public function execute(){
        $this->tv->off();
    }
}


$tv = new TV;
$setTvOn = new SetTVOn($tv);
$setTvOff = new SetTVOff($tv);

$setTvOn->execute();
$setTvOff->execute();




