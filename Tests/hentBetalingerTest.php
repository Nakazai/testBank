<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentBetalingerTest extends PHPUnit_Framework_TestCase {

    public function test_hentBetalinger() 
    {
        // arrange
        $bank=new Bank(new DBStub());
        $personnummer="01010110523";
        
        // act
        $betalinger = $bank->hentBetalinger($personnummer);
        
        // assert
        $this->assertEquals($personnummer,$betalinger[0]->personnummer); 
        $this->assertEquals("105010123456",$betalinger[0]->kontonummer);
        $this->assertEquals("1",$betalinger[0]->avventer);
    }

}