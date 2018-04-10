<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class registerKontoTest extends PHPUnit_Framework_TestCase {

    public function test_registerPersonNr() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        $konto=new konto();
        $konto->personnummer="010101105";

        // act
        $OK = $admin->registerKonto($konto);
        
        // assert
        $this->expectOutputRegex('/Feil i personnummer/',$OK);
    }
    
    public function test_registerKontoFeil() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        $konto=new konto();
        $konto->personnummer="010101105";
        $konto->kontonummer="1050101234";
        $konto->saldo="7";
        $konto->type="Lønnskontooo";
        $konto->valuta="NOKnok";

        // act
        $OK = $admin->registerKonto($konto);
        
        // assert
        $this->assertEquals("Feil",$OK);
    }
    
    public function test_registerKontoOK() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        $konto=new konto();
        $konto->personnummer="01010110523";

        // act
        $OK = $admin->registerKonto($konto);
        
        // assert
        $this->assertEquals("OK",$OK);
    }
}