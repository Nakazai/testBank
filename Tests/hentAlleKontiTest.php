<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class hentAlleKontiTest extends PHPUnit_Framework_TestCase {

    public function test_hentAlleKontiTest() 
    {
        // arrange
        $admin=new Admin(new DBStub());
        
        // act
        $konti = $admin->hentAlleKonti();
        
        // assert
        $this->assertEquals("01010110523",$konti[0]->personnummer); 
        $this->assertEquals("105010123456",$konti[0]->kontonummer);
        $this->assertEquals("720",$konti[0]->saldo);
        $this->assertEquals("Lønnskonto",$konti[0]->type);
        $this->assertEquals("NOK",$konti[0]->valuta);
        $this->assertEquals("01010110523",$konti[1]->personnummer); 
        $this->assertEquals("22334412345",$konti[1]->kontonummer);
        $this->assertEquals("10234.5",$konti[1]->saldo);
        $this->assertEquals("Brukskonto",$konti[1]->type);
        $this->assertEquals("NOK",$konti[1]->valuta);
        $this->assertEquals("01010110523",$konti[2]->personnummer); 
        $this->assertEquals("105020123456",$konti[2]->kontonummer);
        $this->assertEquals("100500",$konti[2]->saldo);
        $this->assertEquals("Sparekonto",$konti[2]->type);
        $this->assertEquals("NOK",$konti[2]->valuta);
    }
}