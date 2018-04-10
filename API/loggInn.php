<?php
session_start();
include_once '../BLL/bankLogikk.php';
header('Content-Type: application/json');


if(isset($_GET["test"]))
{
    $bank=new Bank(new DBStub()); 
}
else
{
    $bank = new Bank();
}

$personnummer = $_GET["personnummer"];
$passord =$_GET["passord"];

$OK= $bank->sjekkLoggInn($personnummer, $passord);
if($OK=="OK")
{
    $_SESSION["loggetInn"]=$personnummer;
    echo json_encode($OK);
}
else
{
    unset($_SESSION["loggetInn"]);
    echo json_encode("Feil i innlogging");
}    

