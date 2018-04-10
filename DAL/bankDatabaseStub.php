<?php
    include_once '../Model/domeneModell.php';
    include_once '../BLL/bankLogikk.php';
   
    class DBStub
    {
        function hentEnKunde($personnummer)
        {
           $enKunde = new kunde();
           $enKunde->personnummer =$personnummer;
           $enKunde->navn = "Per Olsen";
           $enKunde->adresse = "Osloveien 82, 0270 Oslo";
           $enKunde->telefonnr="12345678";
           return $enKunde;
        }
        
        function hentAlleKunder()
        {
           $alleKunder = array();
           $kunde1 = new kunde();
           $kunde1->personnummer ="01010122344";
           $kunde1->navn = "Per Olsen";
           $kunde1->adresse = "Osloveien 82 0270 Oslo";
           $kunde1->telefonnr="12345678";
           $alleKunder[]=$kunde1;
           $kunde2 = new kunde();
           $kunde2->personnummer ="01010122344";
           $kunde2->navn = "Line Jensen";
           $kunde2->adresse = "Askerveien 100, 1379 Asker";
           $kunde2->telefonnr="92876789";
           $alleKunder[]=$kunde2;
           $kunde3 = new kunde();
           $kunde3->personnummer ="02020233455";
           $kunde3->navn = "Ole Olsen";
           $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
           $kunde3->telefonnr="99889988";
           $alleKunder[]=$kunde3;
           return $alleKunder;
        }
        
        function hentTransaksjoner($kontoNr,$fraDato,$tilDato)
        {
            date_default_timezone_set("Europe/Oslo");
            $fraDato = strtotime($fraDato);
            $tilDato = strtotime($tilDato);
            if($fraDato>$tilDato)
            {
                return "Fra dato må være større enn tildato";
            }
            $konto = new konto();
            $konto->personnummer="010101234567";
            $konto->kontonummer=$kontoNr;
            $konto->type="Sparekonto";
            $konto->saldo =2300.34;
            $konto->valuta="NOK";
            if($tilDato < strtotime('2015-03-26'))
            {
                return $konto;
            }
            $dato = $fraDato;
            while ($dato<=$tilDato)
            {
                switch($dato)
                {
                    case strtotime('2015-03-26') :
                        $transaksjon1 = new transaksjon();
                        $transaksjon1->dato='2015-03-26';
                        $transaksjon1->transaksjonBelop=134.4;
                        $transaksjon1->fraTilKontonummer="22342344556";
                        $transaksjon1->melding="Meny Holtet";
                        $konto->transaksjoner[]=$transaksjon1;
                        break;
                    case strtotime('2015-03-27') :
                        $transaksjon2 = new transaksjon();
                        $transaksjon2->dato='2015-03-27';
                        $transaksjon2->transaksjonBelop=-2056.45;
                        $transaksjon2->fraTilKontonummer="114342344556";
                        $transaksjon2->melding="Husleie";
                        $konto->transaksjoner[]=$transaksjon2; 
                        break;
                    case strtotime('2015-03-29') :
                        $transaksjon3 = new transaksjon();
                        $transaksjon3->dato = '2015-03-29';
                        $transaksjon3->transaksjonBelop=1454.45;
                        $transaksjon3->fraTilKontonummer="114342344511";
                        $transaksjon3->melding="Lekeland";
                        $konto->transaksjoner[]=$transaksjon3;
                        break;
                }
                $dato +=(60*60*24); // en dag i sekunder
            }
            return $konto;
        }

        function hentKundeInfo($personnummer,$postnr)
        {
            $kunde = new kunde();
            $kunde->personnummer = "0101011052";
            $kunde->postnr = "0111";
            
            if($kunde->personnummer!=$personnummer)
            {
                return "Feil";
            }
            
            if($kunde->postnr!=$postnr)
            {
                return "Feil";
            }
            
            return $kunde;
            
        }

        function registrerBetaling($kontoNr, $transaksjon)
        {
            if($kontoNr==="105010123456" AND $transaksjon->fraTilKontonummer==="20102012345")
            {
                return "OK";
            }
            else
            {
                return "Feil";
            }
        }

        function sjekkLoggInn($personnummer,$passord)
        {
            if(!preg_match("/[0-9]{11}/", $personnummer)) //"^...$"???
            {
                return "Feil i personnummer";
            }
            if(!preg_match("/.{6,30}/", $passord)) //"^...$"???
            {
                return "Feil i passord";
            }
           
        }
        
        function hentKonti($personnummer)
        {            
            $alleKonto = array();
            $konto1 = new konto();
            $konto1->personnummer=$personnummer;
            $konto1->kontonummer="105010123456";
            $alleKonto[]=$konto1;

            $konto2 = new konto();
            $konto2->personnummer=$personnummer;
            $konto2->kontonummer="22334412345";
            $alleKonto[]=$konto2;
            
            return $alleKonto;
        }
        
        function hentSaldi($personnummer)
        {            
            $alleSaldo = array();
            $saldo1 = new konto();
            $saldo1->personnummer=$personnummer;
            $saldo1->kontonummer="105010123456";
            $saldo1->saldo="720";
            $saldo1->type="Lønnskonto";
            $saldo1->valuta="NOK";
            $alleSaldo[]=$saldo1;

            $saldo2 = new konto();
            $saldo2->personnummer=$personnummer;
            $saldo2->kontonummer="22334412345";
            $saldo2->saldo="10234.5";
            $saldo2->type="Brukskonto";
            $saldo2->valuta="NOK";
            $alleSaldo[]=$saldo2;
            
            return $alleSaldo;
        }
        
        function hentBetalinger($personnummer)
        {            
            $alleBetalinger = array();
            $betaling1 = new konto();
            $betaling1->personnummer=$personnummer;
            $betaling1->kontonummer="105010123456";
            $betaling1->avventer="1";
            $alleBetalinger[]=$betaling1;
            
            return $alleBetalinger;
        }
        
        function endreKundeInfo($kunde)
        {
            $postnr="1234";

            if($postnr!=3270)
            {
                $postnr="1234";
                $poststed="Oslo";
                
                if($postnr AND $poststed < 1)
                {
                    return "Feil";
                }
            }
            
            $kunde->fornavn="Per";
            $kunde->etternavn="Hansen";
            $kunde->adresse="Osloveien 82";
            $kunde->postnr="1234";
            $kunde->telefonnr="12345678"; 
            $kunde->passord="Hei";
            $kunde->personnummer="12345678901";
            return "OK";
        }
        
        function utforBetaling($TxID)
        {
            $feil = false;
            $TxID="2";
            
            if($TxID!=1)
            {
                $feil = true;
            }
            $belop = "400.4";
            $kontonummer = "105010123456";

            $kontonummer="105010123456";
            if($kontonummer!=1)
            {
                $feil = true;
            }
            $gammelSaldo = "100500";
            $nySaldo = $gammelSaldo - $belop;


            if(!$feil)
            {
                $TxID="1";
                $avventer="0";
                
                if($avventer==0)
                {
                    $kontonummer="105010123456";
                    $resultat=$kontonummer AND $nySaldo;
                    
                    if($resultat)
                    {
                        //$this->db->commit();
                        return "OK";
                    }
                }
            }
            //$this->db->rollback();
            return "Feil";
        }
        
    }