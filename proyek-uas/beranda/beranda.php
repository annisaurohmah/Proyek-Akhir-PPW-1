<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datadata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="beranda.css" rel="stylesheet">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <nav class="navbar">
        <div class="container-fluid space-between">
            <div>
              <img src="../gambar/logo2.png" width="35%">
            </div>
            <div>
              <a href="../login/welkam.php">Keluar</a>
            </div>
        </div>
      </nav>
      <div class="container-fluid satu">
        <div class="row">
        <div class="col-md-2 aside">
            <aside class="left-sidebar">
              <div class="sidebar" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="body">
                    <div>
                        <div class="list-group list-group-flush">
                          <a href="../beranda/beranda.html" class="list-group-item list-group-item-action active" role="tab">
                            <i class="fa fa-home" style="font-size:24px"></i>  Beranda
                        </a>
                        <a href="../anggota/anggota.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-id-card" style="font-size:24px"></i> Anggota</a>
                        <a href="../jabatan/jabatan.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-group" style="font-size:24px"></i> Jabatan</a>
                        <a href="../arsipSurat/arsipSurat.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-envelope-open-o" style="font-size:24px"></i> Arsip Surat</a>
                        <a href="../keuangan/keuangan.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-money" style="font-size:24px"></i> Keuangan</a>
                        <a href="../kas/kas.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-credit-card" style="font-size:24px"></i> Kas</a>
                  </div>
                </div>
              </div>
            </aside>
      </div>
      <div class="col-md-10">
      <div class="welkam">
            <h1 style="color: #3E1F47;"><b>Halo,          
          </b></h1>
            <h5>Selamat datang kembali!</h5> 
      </div>

      <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >
      <!-- <h3><b>Dashboard</b></h3>
      <h5 class="h5">Profil Organisasi</h5> -->
      <h3 style="text-align: center"><b>Profil</b></h3>

      <div class="container-fluid dua">
        <div class="row">
        <div class="col-sm-3 cbox">
          <div class="row box">
            <p><b>Logo Organisasi </b></p>
          <img id="logo" src="../gambar/java.jpeg">
          </div>
        </div>
        <div class="col-sm-9">
          <table class="table table-hover table-striped-columns">
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
        </div>
          </div>
          <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >
          <h3 style="text-align: center"><b>Statistik</b></h3>
          <div class="container-fluid dua">
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

          <div class="col box">
            <p><b>Jumlah Surat Masuk</b></p>
            <?php 
            $count = mysqli_query($conn, "SELECT * FROM persuratan where jenis_surat = 'SURAT MASUK'");
            $total = 0;
            foreach ($count as $value){
                $total++;
              }
            echo "<h2>$total</h2>";
            ?>
            <p>Surat</p>
          </div>

          <div class="col box">
            <p><b>Jumlah Surat Keluar</b></p>
            <?php 
            $count = mysqli_query($conn, "SELECT * FROM persuratan where jenis_surat = 'SURAT KELUAR'");
            $total = 0;
            foreach ($count as $value){
                $total++;
              }
            echo "<h2>$total</h2>";
            ?>
            <p>Surat</p>
    </div>
        </div>
        <div class="row menu" style="gap: 20px">
              
    <div class="col box">
            <p><b>Total Pemasukan</b></p>
            <p> Rp
            <?php 
            $totalQuery = mysqli_query($conn, "SELECT SUM(nominal) FROM keuangan WHERE pilihan_transaksi = 'PEMASUKAN'");
            $totalRow = mysqli_fetch_row($totalQuery);
            $total = $totalRow[0];

            echo "<span style='font-size: 40px'>$total</span>";
            ?>
            ,-
            </p>
    </div>
    <div class="col box">
            <p><b>Total Pengeluaran</b></p>
            <p> Rp
            <?php 
              $totalQuery = mysqli_query($conn, "SELECT SUM(nominal) FROM keuangan WHERE pilihan_transaksi = 'PENGELUARAN'");
              $totalRow = mysqli_fetch_row($totalQuery);
              $total = $totalRow[0];
              echo "<span style='font-size: 40px'>$total</span>";
            ?>
            ,-
            </p>

    </div>
    </div>
    <footer style="text-align: center">
      <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >
      <p>Created by Annisa Urohmah &copy; 2023</p>
    </footer>
      </div>
    </div>
    </div>
      </div>
</body>
</html>