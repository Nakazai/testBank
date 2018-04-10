<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class sjekkLoggInnTest extends PHPUnit_Framework_TestCase {

    public function test_sjekkLoggInn_Feil() 
    {
        // arrange
        $personnummer = "01010112*"; 
        $passord = "";
        $bank=new Bank(new DBStub());
        
        // act
        $OK= $bank->sjekkLoggInn($personnummer, $passord);
        
        // assert
        $this->assertRegexp("/Feil i personnummer/",$OK); 
        $this->assertRegexp("//",$OK);
    }
}