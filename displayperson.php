<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION["account"])){
    header("Location: personlogin.php");
    return;
}

$pid = $_SESSION['account'];
$stmt = $pdo->query("SELECT S.sname,S.oname,S.smobile,T.moneey FROM shop S NATURAL JOIN transc T where p_id=$pid");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Udhari App</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color: #CAEBF2;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Udhari App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="personlogin.php">Customer Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="shoplogin.php">Shop Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="personreg.php">Customer Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="shopreg.php">Shop Registration</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <div class="m-5">
            <center><h1>Customer Dashboard</h1></center>
        </div>
        
        <div class="container blue my-5 p-3">
            <h4>Shop Details</h4>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Owner Name</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ( $rows as $row ) {
                        echo "<tr><th scope="row"></th><td>";
                        echo($row['sname']);
                        echo("</td><td>");
                        echo($row['oname']);
                        echo("</td><td>");
                        echo($row['smobile']);
                        echo("</td><td>");
                        echo($row['moneey']);
                        echo("</td></tr>\n");
                    }
                    ?>
                  </tbody>
            </table>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

</html>
