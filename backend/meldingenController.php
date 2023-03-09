<?php

$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];
$type = $_POST["type"];
$overig = $_POST['overig'];
if(isset($_POST['prioriteit']))
{
    $prioriteit = true;
}
else
{
    $prioriteit = false;
}


echo $attractie . " / " . $capaciteit . " / " . $melder . " / " . $type . " / " . $overig . " / " . $prioriteit;

require_once 'conn.php';

$query = "INSERT INTO meldingen (attractie, capaciteit, melder, prioriteit, overige_info, type)
VALUES(:attractie, :capaciteit, :melder, :prioriteit, :overige_info, :type)";

$statement = $conn->prepare($query);

$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":type" => $type,
    ":prioriteit" => $prioriteit,
    ":overige_info" => $overig
]);

$items = $statement->fetchAll(PDO::FETCH_ASSOC);

header("lacation: storingapp/meldingen/index.php?msg= melding opgeslagen");

?>
