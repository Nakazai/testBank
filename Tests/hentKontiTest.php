<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit_Framework_TestCase {

    public function test_hentKonti() 
    {
        // arrange
        $bank=new Bank(new DBStub());
        $personnummer="01010110523";
        
        // act
        $konto= $bank->hentKonti($personnummer);
        
        // assert
        $this->assertEquals($personnummer,$konto[0]->personnummer); 
        $this->assertEquals("105010123456",$konto[0]->kontonummer);
        $this->assertEquals($personnummer,$konto[1]->personnummer); 
        $this->assertEquals("22334412345",$konto[1]->kontonummer);
    }
}