<?php
require_once "pdo.php";
//authenciticate user
    session_start();
    if ( isset($_POST["account"]) && isset($_POST["pw"]) ) {
        unset($_SESSION["account"]);  // Logout current user
        $pid=$_POST["account"];
        $sql = $pdo->query("SELECT passw FROM shop WHERE p_id=$pid");
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ( $rows as $row ) {
            $pin = $row['passw'];
        }
        
        if ( $_POST['pw'] == $pin ) {
            $_SESSION["account"] = $_POST["account"];
            $_SESSION["success"] = "Logged in.";

            header( 'Location: displayperson.php' ) ;
            return;
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header( 'Location: personlogin.php' ) ;
            return;
        }
    }
?>
//to show errors
<?php
    if ( isset($_SESSION["error"]) ) {
        echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
        unset($_SESSION["error"]);
    }
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

    <div class="my-5">
        <center>
            <h1>Customer Login</h1>
        </center>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 ">
            </div>
            <div class="col-sm-6 orange my-5 p-3">
                <form method="post">
                    <div class="form-floating my-3">
                        <input type="text" name="account" class="form-control" id="floatingInput" placeholder="Account No">
                        <label for="floatingInput">Account No</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" name="pw" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-3">

            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

</html>