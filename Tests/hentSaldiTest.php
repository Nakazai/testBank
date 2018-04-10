<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentSaldiTest extends PHPUnit_Framework_TestCase {

    public function test_hentSaldi() 
    {
        // arrange
        $bank=new Bank(new DBStub());
        $personnummer="01010110523";
        
        // act
        $saldo = $bank->hentSaldi($personnummer);
        
        // assert
        $this->assertEquals($personnummer,$saldo[0]->personnummer); 
        $this->assertEquals("105010123456",$saldo[0]->kontonummer);
        $this->assertEquals("720",$saldo[0]->saldo);
        $this->assertEquals("Lønnskonto",$saldo[0]->type);
        $this->assertEquals("NOK",$saldo[0]->valuta);
        $this->assertEquals($personnummer,$saldo[1]->personnummer); 
        $this->assertEquals("22334412345",$saldo[1]->kontonummer);
        $this->assertEquals("10234.5",$saldo[1]->saldo);
        $this->assertEquals("Brukskonto",$saldo[1]->type);
        $this->assertEquals("NOK",$saldo[1]->valuta);
    }
}