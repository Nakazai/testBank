<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class endreKundeInfoTest extends PHPUnit_Framework_TestCase {
    
    public function testEndreKundeInfo_Feil() 
    {
        // arrange
        $postnr="1234";
        $kunde=$postnr;
        $bank=new Bank(new DBStub());
        
        // act
        $OK= $bank->endreKundeInfo($kunde);
        
        // assert
        $this->assertEquals("Feil",$OK);
    }
    
    public function testEndreKundeInfo_OK() 
    {
        // arrange
        $postnr="1234";
        $kunde=$postnr;
        $bank=new Bank(new DBStub());
        
        // act
        $OK= $bank->endreKundeInfo($kunde);
        
        // assert
        $this->assertEquals("OK",$OK);
    }

}
