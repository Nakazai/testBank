<?php
include_once 'apiBankHeader.php';

$TxID = $_GET["TxID"];
$OK= $bank->utforBetaling($TxID);

$personnummer = $_SESSION["loggetInn"];
$betalinger = $bank->hentBetalinger($personnummer);
echo json_encode($betalinger);
