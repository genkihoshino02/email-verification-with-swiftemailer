<?php 
    require_once 'controllers/authController.php';

    if(!isset($_SESSION["id"])){
        header("location:login.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div mt-5">
            <?php if(isset($_SESSION["message"])): ?>
                <div class="alert <?php echo $_SESSION["alert-class"]; ?>">
                    <?php 
                        echo $_SESSION["message"];
                        unset($_SESSION["message"]);
                        unset($_SESSION["alert-class"]);
                    ?>
                </div>
            <?php endif; ?>
                <h3>Welocme ,<?php echo $_SESSION["username"]; ?></h3>

                <a href="index.php?logout=1" class="logout"> logout</a>

                <?php if(!$_SESSION["verified"]): ?>
                    <div class="alert alert-warning">
                        You need to verify your account.
                        Sign in your email account and click on the verification link we just emailed you at 
                        <strong><?php echo $_SESSION["email"]; ?></strong>
                    </div>
                <?php endif; ?>

                <?php if($_SESSION["verified"]): ?>
                    <button class="btn btn-block btn-lg btn-primary">I am verified!</button>
                <?php endif; ?>

            </div>
        </div>
    </div>



    <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>