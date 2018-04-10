<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class hentAlleKunderTest extends PHPUnit_Framework_TestCase {

public function testHentAlleKunder() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        
        // act
        $kunder= $admin->hentAlleKunder();
        
        // assert
        $this->assertEquals("01010122344",$kunder[0]->personnummer); 
        $this->assertEquals("Per Olsen",$kunder[0]->navn);
        $this->assertEquals("Osloveien 82 0270 Oslo",$kunder[0]->adresse);
        $this->assertEquals("12345678",$kunder[0]->telefonnr); 
        $this->assertEquals("01010122344",$kunder[1]->personnummer); 
        $this->assertEquals("Line Jensen",$kunder[1]->navn);
        $this->assertEquals("Askerveien 100, 1379 Asker",$kunder[1]->adresse);
        $this->assertEquals("92876789",$kunder[1]->telefonnr); 
        $this->assertEquals("02020233455",$kunder[2]->personnummer); 
        $this->assertEquals("Ole Olsen",$kunder[2]->navn);
        $this->assertEquals("Bærumsveien 23, 1234 Bærum",$kunder[2]->adresse);
        $this->assertEquals("99889988",$kunder[2]->telefonnr); 
    }
}