<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';
include_once '../DAL/bankDatabaseStub.php';

class registrerBetalingTest extends PHPUnit_Framework_TestCase {

    public function testRegistrerBetaling_Feil() 
    {
        // arrange
        $bank=new Bank(new DBStub());
        $kontoNr = "10502023523";
        $transaksjon = new transaksjon();
        $transaksjon->fraTilKontonummer = "20102012343";

        // act
        $OK= $bank->registrerBetaling($kontoNr, $transaksjon);
        
        // assert
        $this->assertEquals("Feil",$OK);
        $this->assertEquals("Feil",$OK);
    }
    
    
    public function testRegistrerBetaling_OK() 
    {
        // arrange
        $bank=new Bank(new DBStub());
        $kontoNr = "105010123456"; 
        $transaksjon = new transaksjon();
        $transaksjon->fraTilKontonummer = "20102012345";
 
        // act
        $OK= $bank->registrerBetaling($kontoNr, $transaksjon);
        
        // assert
        $this->assertEquals("OK",$OK);
        $this->assertEquals("OK",$OK);
    }
}
