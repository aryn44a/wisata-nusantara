<?php
session_start();
if ((empty($_SESSION['username'])) and (empty($_SESSION['password']))){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Objek Wisata Neosantara</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .posisitengah {
            margin: 0 auto;
        }
    </style>
</head>
<body>
        <div class="container mt-4">
        <div class="col-md-4 posisitengah">
                        <img src="img\neosantara-tour-information-high-resolution-logo.png" class="rounded mx-auto d-block" width="340" height="200" >
            <div class="card">
                <!-- <div class="card-header bg-primary text-white">Form Login</div> -->
                <div class="card-body mt-0,4">
                    <form action="cek_login.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Username</b> :</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Username" required
                            value="<?php echo (isset($_COOKIE["username"])) ? $_COOKIE['username']:'' ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><b>Password</b> :</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required
                            value="<?php echo (isset($_COOKIE["password"])) ? $_COOKIE['password']:'' ?>">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember"
                            <?php echo (isset($_COOKIE["username"])) and (isset($_COOKIE["password"])) ? "checked":"" ?> >
                            <label class="form-check-label" for="exampleCheck1"><b>Remember Me</b></label>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

<?php
    }else{
        echo "<script>window.history.go(-1)</script>";
    }
    ?>