<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="login.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- <div class="container"> -->
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "java";
        $conn = mysqli_connect($servername, $username, $password, $database);
      ?>
        <div class="row">
            <div class="col-sm-5 pa-5 kiri">
                <p>
                    <img src="../gambar/logo4.png" style="height: 30px;">
                </p>
                <p> Let's build your bank data!</p>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="2000">
                        <img src="../gambar/carousel11.png" class="d-block w-100" alt="organisation">
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="../gambar/carousel33.png" class="d-block w-100" alt="organisation">
                      </div>
                      <div class="carousel-item">
                        <img src="../gambar/carousel22.png" class="d-block w-100" alt="organisation">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  <p> 2023 <br> by Annisa Urohmah </p>
                  <footer style="font-size: 7px;">
                    <a style="color: cyan;" href="https://www.freepik.com/free-vector/business-team-brainstorm-idea-lightbulb-from-jigsaw-working-team-collaboration-enterprise-cooperation-colleagues-mutual-assistance-concept-pinkish-coral-bluevector-isolated-illustration_11667116.htm#query=organisation&position=47&from_view=search&track=sph">Image by vectorjuice</a> on Freepik
                    <br><a style="color: cyan;" href="https://www.freepik.com/free-vector/team-programmers-working-software-flat-illustration_16990685.htm#query=organisasi&position=39&from_view=search&track=sph">Image by pch.vector</a> on Freepik
                </footer>
            </div>
            <div class="col-sm-7 kanan pa-5">
                <div style="margin-bottom: 30px;">
                <h1 style="font-weight: 900;">Admin Login</h1>
                <p>Welcome back! Enter your credentials to access your database.</p>
                </div>
                <div>
                <form method="POST" class="container p-0 pe-md-2">
                <label for="username"><b>Username</b></label>
                <input id="username"name="username" type="text">
                <small></small>
                <label for="pass"><b>Password</b></label>
                <input id="pass" name="pass" type="password">
                <small><a href="#" onclick="create()" class="forgot">Forgot password?</a></small>
                <button type="submit" name="cont" id="continue" class="btn btn-primary">Continue</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cont'])) {
                $login = mysqli_query($conn, "SELECT * FROM profil");
                $username = $_POST['username'];
                $pass = $_POST['pass'];

                while ($row = mysqli_fetch_assoc($login)) {
                    if ($username === $row['username'] && $pass === $row['password']) {
                      echo "<script>window.location.href = '../beranda/beranda.php';</script>";
                      exit();
                    } else {
                        echo "<script>alert('Username atau password salah');</script>";
                    }
                }
            }
            ?>


                   <small>Don't have an account? <a onclick="create()" href="#">Create account</a></small>
                   <script>
                    function create(){
                      alert("Hubungi Annisa Urohmah di instagram @annisa.urohmah")
                    }
                  </script>
                </div>
                
            </div>
            
        </div>

    <!-- </div> -->


</body>
</html>