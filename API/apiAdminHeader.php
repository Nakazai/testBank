<?php
session_start();
include_once '../BLL/adminLogikk.php';
header('Content-Type: application/json');

if(isset($_SESSION["loggetInn"]))
{
    if($_SESSION["loggetInn"]!="Admin")
    {
        echo json_encode("Feil innlogging");
        die();
    }
}
else
{
    echo json_encode("Feil innlogging");
    die();
}

if(isset($_GET["test"]))
{
    $admin = new Admin(new DBStub());
}
else
{
    $admin = new Admin();
}
// etter dette er innlogging godkjent og riktig admin-klasse innstansiert.