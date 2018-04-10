<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentKundeInfoTest extends PHPUnit_Framework_TestCase {
    
    public function testKundeInfo_FeilPers() 
    {
        // arrange
        $personnummer = "0101011053";
        $postnr = "0113";
        $bank=new Bank(new DBStub());
        
        // act
        $kunde= $bank->hentKundeInfo($personnummer,$postnr);
        
        // assert
        $this->assertEquals("Feil",$kunde);
        $this->assertEquals("Feil",$kunde);
    } 
}