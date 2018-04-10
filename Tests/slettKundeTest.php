<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class slettKundeTest extends PHPUnit_Framework_TestCase {
    
    public function testSlettKunde_Feil() 
    {
        // arrange
        $personnummer="010101223";
        $admin=new Admin(new DBStub());
        
        // act
        $OK = $admin->slettKunde($personnummer);
        
        // assert
        $this->assertEquals("Feil",$OK);
    }
    
     public function testSlettKunde_OK() 
    {
        // arrange
        $personnummer="01010122344";
        $admin=new Admin(new DBStub());
        
        // act
        $OK = $admin->slettKunde($personnummer);
        
        // assert
        $this->assertEquals("OK",$OK);
    }
}
