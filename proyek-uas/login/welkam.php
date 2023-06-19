<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datadata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="welkam.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "java";
    $conn = mysqli_connect($servername, $username, $password, $database);                
    ?>
    <nav class="navbar">
        <div class="container space-between">
            <div>
              <img src="../gambar/logo2.png" width="100px">
            </div>
            <div>
            <a href="login.php"><button class="button">
                    <p class="text">Masuk</p>
                </button></a>
            </div>
        </div>
    </nav>
    <div class="container-fluid first">
        <div class="text-center p-5" style="color: white;">
            <b><h1><?php
                $query = mysqli_query($conn, 'SELECT * from profil');
                $result = mysqli_fetch_assoc($query);
                echo $result['nama'];
              ?>
              <br> Universitas Gadjah Mada</b></h1>
            <h5>Profil Organisasi</h5>
            <hr style="border: 5px solid white; height: 5px;">
            <img class="m-3" style="border-radius: 50%;" src="../gambar/java.jpeg">
        </div>
    </div>
    <div class="container-fluid four">
        <b><h2 class="text-left" style="color: #3e1f47;">Data Organisasi</b></h2>
        <hr style="background-color:#3e1f47;border: 5px solid #3e1f47; height: 5px; width: 100px">
        <div class="row">
            <div class="col-md-6" style="align-items: center;">
                <table class=" table table-secondary table-hover table-striped-columns">
                    <tr>
                    <th>Nama</th>
                    <?php
                        $query = mysqli_query($conn, 'SELECT * from profil');
                        $result = mysqli_fetch_assoc($query);
                        echo "<td bgcolor='transparent'>".$result['nama']."</td>"
                    ?>
                    </tr>
                    <tr>
                    <th>Alamat</th>
                    <?php
                        $query = mysqli_query($conn, 'SELECT * from profil');
                        $result = mysqli_fetch_assoc($query);
                        echo "<td bgcolor='transparent'>".$result['alamat']."</td>"
                    ?>
                    </tr>
                    <tr>
                    <th>Nomor Induk</th>
                    <?php
                        $query = mysqli_query($conn, 'SELECT * from profil');
                        $result = mysqli_fetch_assoc($query);
                        echo "<td bgcolor='transparent'>".$result['nomor_induk']."</td>"
                    ?>            </tr>
                    <tr>
                    <th>Periode</th>
                    <?php
                        $query = mysqli_query($conn, 'SELECT * from profil');
                        $result = mysqli_fetch_assoc($query);
                        echo "<td bgcolor='transparent'>".$result['periode']."</td>"
                    ?>
                    </tr>
                    <tr>
                    <th>Tahun berdiri</th>
                    <?php
                        $query = mysqli_query($conn, 'SELECT * from profil');
                        $result = mysqli_fetch_assoc($query);
                        echo "<td bgcolor='transparent'>".$result['tahun_berdiri']."</td>"
                    ?>
                    </tr>
                    <tr>
                    <th>Ketua umum</th>
                    <?php
                        $query = mysqli_query($conn, 'SELECT * from profil');
                        $result = mysqli_fetch_assoc($query);
                        echo "<td bgcolor='transparent'>".$result['ketua']."</td>"
                    ?>
                    </tr>
                </table>
            </div>
            <div class="col-md-6" style="align-items: center;">
            <iframe width="100%" height="280" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.152223200553!2d110.3711182733592!3d-7.7736783771139555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599a665b6545%3A0x1a8839e30b81544a!2sDepartemen%20Teknologi%20Hayati%20dan%20Veteriner!5e0!3m2!1sen!2sus!4v1687136232958!5m2!1sen!2sus" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            </iframe><br/>

            </div>
        </div>

    </div>



    <div class="container-fluid third">
        <div class="dua" >
        <b><h2 class="text-center pb-0" style="color: #3e1f47;">Statistik</b></h2>
        <hr style="margin-right:auto; margin-left: auto ;background-color:#3e1f47;border: 5px solid #3e1f47; height: 5px; width: 100px">
        <div class="row menu">
        <div class="col box">
            <p><b>Jumlah Anggota</b></p>
            <?php
              $count = mysqli_query($conn, "SELECT * FROM departemen");
              $total = 0;
              $dept = 0;
              foreach ($count as $value) {
                  $id_dept = $value['id_dept'];
                  $query = mysqli_query($conn, "SELECT count_anggota_in_department('$id_dept')"); // Call the function with the connection parameter
                  $result = mysqli_fetch_assoc($query);
                  $hitung = (int)$result["count_anggota_in_department('$id_dept')"];
                  $total = $total + $hitung;
                  $dept++;
              }
              echo "<h2>$total</h2>";
              ?>

            <p>anggota</p>
          </div>
          <div class="col box">
            <p><b>Jumlah Departemen</b></p>
            <?php 
            echo "<h2>$dept</h2>";
            ?>
            <p>Departemen</p>
          </div>

        </div>
        </div>
            </div>

    <div class="container-fluid second">
        <b><h2 class="p-5  pb-0" style="text-align: center ;color: #3e1f47;">Kegiatan</b></h2>
        <hr style="margin-right:auto; margin-left: auto ;background-color:#3e1f47;border: 5px solid #3e1f47; height: 5px; width: 100px">
        <div style="margin-left: auto; margin-right:auto; gap : 40px; justify-content: center" class="row row-cols-1 row-cols-md-3 mb-md-0 mb-3 space-between">
        <div class="card p-0 mb-5 mb-md-0 col" style="width: 18rem;">
            <img src="https://dpmdsos.baritotimurkab.go.id/wp-content/uploads/2022/03/277306172_5315907888421583_5479546827023802628_n-720x475.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Kegiatan Bakti Sosial pada bulan Agustus.</p>
            </div>
        </div>

        <div class="card p-0 mb-5 mb-md-0 col" style="width: 18rem;">
            <img src="https://i.pinimg.com/originals/23/18/fa/2318fa1c43e81139f4022d93076685ec.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Outbonding anggota JAVA 1444 H.</p>
            </div>
        </div>

        <div class="card p-0 mb-5 mb-md-0 col" style="width: 18rem;">
            <img src="https://organisasi.paserkab.go.id/contentku38/uploads/WhatsApp_Image_2019-10-09_at_09.26.26.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Rapat dengan Dewan Pembina.</p>
            </div>
        </div>
        </div>
    </div>


    <div class="container-fluid second">
        <b><h2 class="text-center p-5 pb-0" style="color: #3e1f47;">Media Sosial</b></h2>
        <hr style="margin-right:auto; margin-left: auto ;background-color:#3e1f47;border: 5px solid #3e1f47; height: 5px; width: 100px">
        <div class="cards pt-3">
            <div class="card red">
                <a href="https://instagram.com/javaugm">
                <p class="tip"><i class='fa fa-instagram' style='font-size:50px'></i></p>
                <p class="second-text">Instagram</p>
                </a>
            </div>
            
            <div class="card blue">
                <a href="https://youtube.com">
                <p class="tip"><i class='fa fa-youtube' style='font-size:50px'></i></p>
                <p class="second-text">Youtube</p>
                </a>
            </div>
            <div class="card green">
                <a href="https://twitter.com">
                <p class="tip"><i class='fa fa-twitter' style='font-size:50px'></i></p>
                <p class="second-text">Twitter</p>
                </a>
            </div>
        </div>
    </div>

    <footer style="text-align: center">
    <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

  <div class="container pt-5 border-bottom">
    <div class="col" style="justify-content: center">
      <div class="col-md-9 col-sm-12" style="margin: 0px auto;" >

        <div class="col-md-3 col-sm-6 col-6 p-0 mb-3 "style="margin: 0px auto">
          <h5 class="mb-4 font-weight-bold text-uppercase">Solutions</h5>
        <ul class="list-group">
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#">Management</a></li>
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#">Project Management</a></li>
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#">Workforce</a></li>
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#"> E-Commerce</a></li>
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#">Finance</a></li>
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#">Business Apps</a></li>
        </ul>
        </div>

        <div class="col-md-3 col-sm-6 col-6 p-0 mb-3" style="margin: 0px auto">
          <h5 class="mb-4 font-weight-bold text-uppercase">Developers</h5>
        <ul class="list-group">
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#">Open Source</a></li>
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#">Technology</a></li>
        </ul>
        </div>

        <div class="col-md-3 col-sm-6 col-6 mb-3 p-0" style="margin: 0px auto"> 
          <h5 class="mb-4 font-weight-bold text-uppercase">Company</h5>
        <ul class="list-group">
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#"></i>About</a></li>
          <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a style="  color: #0B525B;" href="#"></i> Blog</a></li>
        </ul>
        </div>

    </div>
    <div class="col-md-12" >
          <div class="py-4 d-flex justify-content-center align-items-center">
            <a class="mr-4"style="  color: #0B525B;" href="#">Privacy & terms</a>
            <a style="  color: #0B525B;" href="#">Sitemap</a>
          </div>
        </div>
  </div>
</footer>
    
</body>
</html>