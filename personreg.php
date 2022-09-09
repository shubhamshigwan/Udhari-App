<?php
require_once "pdo.php";
//send registration details to db
if ( isset($_POST['pname']) && isset($_POST['pmobile']) 
     && isset($_POST['paddress']) && isset($_POST['passw'])) {
    $sql = "INSERT INTO person (pname, pmobile, paddress, passw) 
              VALUES (:pname, :pmobile, :paddress, :passw)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':pname' => $_POST['pname'],
        ':pmobile' => $_POST['pmobile'],
        ':paddress' => $_POST['paddress']
        ':passw' => $_POST['passw']));
}

$stmt = $pdo->query("SELECT pname, pmobile, paddress, p_id FROM person");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- <?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['pname']);
    echo("</td><td>");
    echo($row['pmobile']);
    echo("</td><td>");
    echo($row['paddress']);
    echo("</td></tr>\n");
    
}
?>
</table> -->


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
    <div class="container ">
        <center>
            <h1 class="my-4">Customer Registration</h1>
        </center>
        <div class="container blue my-5">
            <form method="post">
                <div class="m-3 py-3">
                    <h3>Person Name</h3>
                    <input type="text" name="pname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="m-3 py-3">
                    <h3>Person Mobile</h3>
                    <input type="text" name="pmobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="m-3 py-3">
                    <h3>Person Address</h3>
                    <input type="text" name="paddress" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="m-3 py-3">
                    <h3>Password</h3>
                    <input type="password" name="passw" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary m-3">Submit</button>
            </form>
        </div>
        
    </div>
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

</html>