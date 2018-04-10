<?php
include_once 'apiBankHeader.php';

$kontoNr = $_GET["kontoNr"];
$fraDato =$_GET["fraDato"];
$tilDato =$_GET["tilDato"];

$konto= $bank->hentTransaksjoner($kontoNr, $fraDato, $tilDato);
echo json_encode($konto);
 
    