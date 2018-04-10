<?php
    include_once '../Model/domeneModell.php';
    include_once '../BLL/adminLogikk.php';
   
    class DBStub
    {
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
    
        function endreKundeInfo($kunde)
        {
            $this->db->autocommit(false);
            // Sjekk om nytt postnr ligger i Poststeds-tabellen, dersom ikke legg det inn
            $sql = "Select * from Poststed Where Postnr = '$kunde->postnr'";
            $resultat = $this->db->query($sql);
            if($this->db->affected_rows!=1)
            {
                // ligger ikke i poststedstabellen 
                $sql = "Insert Into Poststed (Postnr, Poststed) Values ('$kunde->postnr','$kunde->poststed')";
                $resultat = $this->db->query($sql);
                if($this->db->affected_rows < 1)
                {
                    $this->db->rollback();
                    return "Feil";
                }
            }
            // oppdater Kunde-tabellen
            $sql =  "Update Kunde Set Fornavn = '$kunde->fornavn', Etternavn = '$kunde->etternavn',";
            $sql .= " Adresse = '$kunde->adresse', Postnr = '$kunde->postnr',";
            $sql .= " Telefonnr = '$kunde->telefonnr', Passord ='$kunde->passord'";
            $sql .= " Where Personnummer = '$kunde->personnummer'";
            $resultat = $this->db->query($sql);
            $this->db->commit();
            return "OK";
        }

        function registrerKunde($kunde)
        {
            {
                if($kunde->postnr!=3270)
                {
                    if($kunde->postnr < 1)
                    {
                        return "Feil";
                    }
                }

                $kunde->fornavn="Per";
                $kunde->etternavn="Hansen";
                $kunde->adresse="Osloveien 82";
                //$kunde->postnr="1234";
                $kunde->telefonnr="12345678"; 
                $kunde->passord="Hei";
                $kunde->personnummer="12345678901";

                if($kunde->postnr=="1234")
                {
                    //$this->db->commit();
                    return "OK";
                }
                else
                {
                    //$this->db->rollback();
                    return "Feil";
                }
            }
        }
        
        function slettKunde($personnummer)
        {
            if($personnummer==="01010122344")
            {
                return "OK";
            }
            else
            {
                return "Feil";
            }    
        }
        
        function registerKonto($konto)
        {
            if($konto->personnummer!="01010110523")
            {
                echo json_encode("Feil i personnummer");
                //die();
            }

            if($konto->personnummer=="01010110523")
            {
                return "OK";
            }
            else
            {
                return "Feil";
            } 
        }
        
        function endreKonto($konto)
        {
            if($konto->personnummer!="01010110523")
            {
                echo json_encode("Feil i personnummer");
                //die();
            }
            
            if($konto->kontonummer!="105010123456")
            {
                echo json_encode("Feil i kontonummer");
                //die();
            } 

            $konto->personnummer="01010110523";
            $konto->kontonummer="105010123456";
            $konto->saldo="720";
            $konto->type="Lønnskonto";
            $konto->valuta="NOK";
            return "OK";
        }
        
        function hentAlleKonti()
        {
            $alleKonti = array();
            $konti1 = new konto();
            $konti1->personnummer="01010110523";
            $konti1->kontonummer="105010123456";
            $konti1->saldo="720";
            $konti1->type="Lønnskonto";
            $konti1->valuta="NOK";
            $alleKonti[]=$konti1;

            $konti2 = new konto();
            $konti2->personnummer="01010110523";
            $konti2->kontonummer="22334412345";
            $konti2->saldo="10234.5";
            $konti2->type="Brukskonto";
            $konti2->valuta="NOK";
            $alleKonti[]=$konti2;
            
            $konti3 = new konto();
            $konti3->personnummer="01010110523";
            $konti3->kontonummer="105020123456";
            $konti3->saldo="100500";
            $konti3->type="Sparekonto";
            $konti3->valuta="NOK";
            $alleKonti[]=$konti3;
            
            return $alleKonti;
            
        }

        function slettKonto($kontonummer)
        {
            if($kontonummer!="105010123456")
            {
                echo json_encode("Feil kontonummer");
                //die();
            }
            return "OK";
        }
    }