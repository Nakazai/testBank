<?php
include_once 'apiBankHeader.php';

$personnummer = $_SESSION["loggetInn"];
$betalinger= $bank->hentBetalinger($personnummer);
echo json_encode($betalinger);
 