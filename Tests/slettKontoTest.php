<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class slettKontoTest extends PHPUnit_Framework_TestCase {
    
    public function testSlettKonto_Feil() 
    {
        // arrange
        $kontonummer="22334412345";
        $admin=new Admin(new DBStub());
        
        // act
        $OK = $admin->slettKonto($kontonummer);
        
        // assert
        $this->expectOutputRegex('/Feil kontonummer/',$OK);
    }
    
     public function testSlettKonto_OK() 
    {
        // arrange
        $kontonummer="105010123456";
        $admin=new Admin(new DBStub());
        
        // act
        $OK = $admin->slettKonto($kontonummer);
        
        // assert
        $this->assertEquals("OK",$OK);
    }
}