<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class registrerKundeTest extends PHPUnit_Framework_TestCase {
    
    public function testRegistrerKunde_FeilPost() 
    {
        // arrange
        $kunde= new kunde();
        $kunde->postnr="0234";
        $admin=new Admin(new DBStub());
        
        // act
        $OK= $admin->registrerKunde($kunde);
        
        // assert
        $this->assertEquals("Feil",$OK);
    }
    
    public function testRegistrerKunde_OK() 
    {
        // arrange
        $kunde= new kunde();
        $kunde->fornavn="Per";
        $kunde->etternavn="Hansen";
        $kunde->adresse="Osloveien 82";
        $kunde->postnr="1234";
        $kunde->telefonnr="12345678"; 
        $kunde->passord="Hei";
        $kunde->personnummer="12345678901";
        $admin=new Admin(new DBStub());
        
        // act
        $OK= $admin->registrerKunde($kunde);
        
        // assert;
        $this->assertEquals("OK",$OK);
    }
    
    public function testRegistrerKunde_Feil() 
    {
        // arrange
        $kunde= new kunde();
        $kunde->postnr="123";
        $admin=new Admin(new DBStub());
        
        // act
        $OK= $admin->registrerKunde($kunde);
        
        // assert
        $this->assertEquals("Feil",$OK);
    }
}
