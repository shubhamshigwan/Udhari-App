<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION["account"])){
    header("Location: shoplogin.php");
    return;
}

$sid = $_SESSION['account'];
$stmt = $pdo->query("SELECT P.pname,P.pmobile,P.paddress,T.moneey FROM person P NATURAL JOIN transc T where s_id=$sid");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<head></head><body><table border="1">
<?php


foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['pname']);
    echo("</td><td>");
    echo($row['pmobile']);
    echo("</td><td>");
    echo($row['moneey']);
    echo("</td><td>");
    echo($row['pname']);
    echo("</td></tr>\n");
}

?>
</table>
</body>