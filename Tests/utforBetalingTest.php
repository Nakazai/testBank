<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class utforBetalingTest extends PHPUnit_Framework_TestCase {

    public function test_utforBetaling_Feil() 
    {
        // arrange
        $bank=new Bank(new DBStub());
        $TxID="3";
        
        // act
        $ok = $bank->utforBetaling($TxID);
        
        // assert
        $this->assertEquals("Feil",$ok); 
    }
    
    public function test_utforBetaling_OK() 
    {
        // arrange
        $bank=new Bank(new DBStub());
        $TxID="1";
        
        // act
        $ok = $bank->utforBetaling($TxID);
        
        // assert
        $this->assertEquals("OK",$ok); 
    }

}