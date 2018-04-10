<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class endreKontoTest extends PHPUnit_Framework_TestCase {

    public function test_PersonNrFeil() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        $konto=new konto();
        $konto->personnummer="010101105";
        
        // act
        $OK = $admin->endreKonto($konto);
        
        // assert
        $this->expectOutputRegex('/Feil i personnummer/',$OK);
    }
    
    public function test_KontoFeil() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        $konto=new konto();
        $konto->kontonummer="1050101234";

        // act
        $OK = $admin->endreKonto($konto);
        
        // assert
        $this->expectOutputRegex('/Feil i kontonummer/');

    }
    
    public function test_endreKontoOK() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        $konto=new konto();
        $konto->personnummer="01010110523";
        $konto->kontonummer="105010123456";
        $konto->saldo="720";
        $konto->type="Lønnskonto";
        $konto->valuta="NOK";
        
        // act
        $OK = $admin->endreKonto($konto);
        
        // assert
        $this->assertEquals("OK",$OK);
    }
}