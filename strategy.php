<?php 

interface LoggerInterface{
    public function log($data);
}

class Emailer implements LoggerInterface{
    public function log($data){
        echo "\n$data sent to Email\n";
    }
}
class Console implements LoggerInterface{
    public function log($data){
        echo "\n$data sent to Console\n";
    }
}

class Login{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function doLogin($username , $password){
        // do login with $username and $password
        $this->logger->log(" ** $username successfully logged in. ** ");
    }
}

$email = new Emailer;
$console = new Console; 

$login = new Login($email);
$login->doLogin('Bob','123');

$login2 = new Login($console);
$login2->doLogin('Joe','123');
