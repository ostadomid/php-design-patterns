<?php
class BankManager {
    private $balance;
    private $accountNumber;

    public function __construct($acc,$balance)
    {
        $this->accountNumber = $acc;
        $this->balance = $balance;
    }

    public function canWithdraw($amount){
        return $this->balance-$amount>=0;
    }

    public function withdraw($amount){
        
        $this->balance-=$amount;        
    }
    public function canDeposit($amount){
        return $amount>0;
    }
    public function deposit($amount){
        
        $this->balance+=$amount;        
    }
    public function CurrentBalance(){
        return $this->balance;
    }
}

class BankFacade{

    private $account;
    public function __construct(BankManager $account)
    {
        $this->account = $account;
    }
    public function Deposit($amount){
        if( $this->account->canDeposit($amount) ){
            $this->account->deposit($amount);
        }
    }
    public function Withdraw($amount){
        if( $this->account->canWithdraw($amount) ){
            $this->account->withdraw($amount);
        }
    }
    public function Balance(){
        return $this->account->CurrentBalance();
    }
}


$account = new BankManager("125-62-0080",1000);
$facade = new BankFacade($account);

$facade->Deposit(-1000);
$facade->Deposit(500);
echo $facade->Balance();

