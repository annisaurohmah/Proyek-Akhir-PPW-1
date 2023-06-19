<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datadata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="kas.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <nav class="navbar">
        <div class="container-fluid">
            <div>
              <img src="../gambar/logo2.png" width="35%">
              </div>
              <div>
              <a href="../login/login.php">Keluar</a>
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
                          <a href="../beranda/beranda.php" class="list-group-item list-group-item-action" role="tab">
                            <i class="fa fa-home" style="font-size:24px"></i>  Beranda
                        </a>
                        <a href="../anggota/anggota.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-id-card" style="font-size:24px"></i> Anggota</a>
                        <a href="../jabatan/jabatan.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-group" style="font-size:24px"></i> Jabatan</a>
                        <a href="../arsipSurat/arsipSurat.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-envelope-open-o" style="font-size:24px"></i> Arsip Surat</a>
                        <a href="../keuangan/keuangan.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-money" style="font-size:24px"></i> Keuangan</a>
                        <a href="../kas/kas.php" class="list-group-item list-group-item-action active" role="tab"><i class="fa fa-credit-card" style="font-size:24px"></i> Kas</a>
                  </div>
                </div>
              </div>
            </aside>
      </div>
      <div class="col-md-10">
      <h2><b>DATA KAS ORGANISASI JAVA PERIODE 1444 H</b></h2>
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "java";
        $conn = mysqli_connect($servername, $username, $password, $database);
      ?>
      <div class="container-fluid dua">
      <button style="margin: 0px 0px 10px -10px" type="button" class="btn tambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Tambah Pembayaran
        </button>


      
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
          <div class="modal-body">

            <form method="POST" action="">
                <div class="row g-3 was-validated">
                  <div class="col-12">
                    <label for="validationServer04" class="form-label">Nama</label>
                    <select class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" name="nim" required>
                      <option selected disabled value="">Pilih...</option>
                      <?php
                        $nama = mysqli_query($conn, "select * from kas join anggota on kas.nim = anggota.nim");
                        foreach ($nama as $value) {
                        echo "
                        <option>".$value['nim']." - ".$value['nama']."</option>";
                    }   
                      ?>
                    </select>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                      Pilih nama
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="validationServer08" class="form-label">Bulan</label>
                    <select class="form-select" id="validationServer08" aria-describedby="validationServer08Feedback" name="bulan" required>
                      <option selected disabled value="">Pilih...</option>
                      <?php
                        $dept = mysqli_query($conn, "SELECT * from kas");


                          // Kolom yang akan dikecualikan
                          $excludedColumns = array('nim', 'nama');

                          // Ambil semua nama kolom dan simpan dalam array
                          $columns = array();
                          while ($field = mysqli_fetch_field($dept)) {
                              if (!in_array($field->name, $excludedColumns)) {
                                  $columns[] = $field->name;
                              }
                          }

                          // Contoh tampilan nama-nama kolom yang tidak dikecualikan
                          foreach ($columns as $value) {
                            $uppercaseValue = strtoupper($value);
                            echo "<option>".$uppercaseValue."</option>";
                    }   
                      ?>
                    </select>
                    <div id="validationServer08Feedback" class="invalid-feedback">
                      Pilih bulan
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="validationServer07" class="form-label">Nominal</label>
                    <input type="text" class="form-control" id="validationServer07" name="nominal" required>
                    <div class="invalid-feedback">
                      Nominal tidak boleh kosong
                    </div>
                  </div>


                </div>

              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
              </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
              // Retrieve the form values
              $selected_nim = $_POST['nim'];
              // Extract the id_prodi from the selected value
              $nim = explode(" - ", $selected_nim)[0];
              $month = strtolower($_POST['bulan']);;
              $nominal = $_POST['nominal'];
            
              // Perform the database insert
              $query = "UPDATE kas SET $month = '$nominal' WHERE nim = '$nim'";
            
              if (mysqli_query($conn, $query)) {
                // Insert successful
                echo '<script>alert("Data has been saved to the database.");';  
                echo 'window.open("kas.php", "_self");</script>';
            }       
      } 

            ?>

            </div>
          </div>
        </div>
      </div>

        <div class="row table-responsive">
            <table class="table table-secondary table-striped table-hover">
                <thead>
                  <tr>
                    <th class="header" scope="col">No</th>
                    <th class="header" scope="col">Nama</th>
                    <th class="header" scope="col">NIM</th>
                    <th class="header" scope="col">Januari</th>
                    <th class="header" scope="col">Februari</th>
                    <th class="header" scope="col">Maret</th>
                    <th class="header" scope="col">April</th>
                    <th class="header" scope="col">Mei</th>
                    <th class="header" scope="col">Juni</th>
                    <th class="header" scope="col">Juli</th>
                    <th class="header" scope="col">Agustus</th>
                    <th class="header" scope="col">September</th>
                    <th class="header" scope="col">Oktober</th>
                    <th class="header" scope="col">November</th>
                    <th class="header" scope="col">Desember</th>
                  </tr>
                  
                </thead>
                <tbody>
                <?php
                    $mahasiswa = mysqli_query($conn, "select * from kas join anggota where kas.nim = anggota.nim");
                    $no = 1;
                    foreach ($mahasiswa as $value) {
                    echo "
                    <tr>
                    <td>$no</td>
                    <td>".$value['nama']."</td>
                    <td>".$value['nim']."</td>
                    <td>".$value['januari']."</td>
                    <td>".$value['februari']."</td>
                    <td>".$value['maret']."</td>
                    <td>".$value['april']."</td>
                    <td>".$value['mei']."</td>
                    <td>".$value['juni']."</td>
                    <td>".$value['juli']."</td>
                    <td>".$value['agustus']."</td>
                    <td>".$value['september']."</td>
                    <td>".$value['oktober']."</td>
                    <td>".$value['november']."</td>
                    <td>".$value['desember']."</td>
                    </tr>";
                    $no++;
                }   
              // mysqli_close($conn);
              ?>

                <tr>
                  <th><p></p></th>
                  <th><p></p></th>
                  <th>Total</th>
                  <?php
                  $i = 1;
                  while ($i <= 12) {
                      $query = mysqli_query($conn, "SELECT calculate_total_kas(" . $i . ")");
                      $result = mysqli_fetch_assoc($query);
                      $total = $result['calculate_total_kas(' . $i . ')']; // Access the value using the key
                      echo "<th>" . $total . "</th>";
                      $i++;
                  }
                  ?>
                  </tr>

                </tbody>
              </table>
        </div>

  <h4 style="text-align: center; margin-top: 20px;"><b>Rekapitulasi Anggota yang Belum Membayar Berdasarkan Bulan</b></h4>

  <form method="GET" action="">
  <div class="col-12">
    <label for="validationServer08" class="form-label">Pilih Bulan</label>
    <select class="form-select" id="validationServer08" aria-describedby="validationServer08Feedback" name="bulan" required>
      <?php
      $dept = mysqli_query($conn, "SELECT * from kas");
      $excludedColumns = array('nim', 'nama');
      $columns = array();
      
      while ($field = mysqli_fetch_field($dept)) {
        if (!in_array($field->name, $excludedColumns)) {
          $columns[] = $field->name;
        }
      }
      
      $no = 1;
      foreach ($columns as $value) {
        $uppercaseValue = strtoupper($value);
        echo "<option>".$no." - ".$uppercaseValue."</option>";
        $no++;
      }
      ?>
    </select>
    <div id="validationServer08Feedback" class="invalid-feedback">
      Pilih bulan
    </div>
  </div>
  <button type="submit" class="btn tambah btn-primary" name="submit">Submit</button>
</form>

<div class="row table-responsive">
  <table class="table table-secondary table-striped table-hover">
    <tr>
      <th>Nama</th>
      <th>NIM</th>
    </tr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit'])) {
      $selected_month = $_GET['bulan'];
      $id_m = explode(" - ", $selected_month)[0];
      $query = "CALL generate_unpaid_kas_report($id_m)";
      $result = mysqli_query($conn, $query);

      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $nama = $row['nama'];
          $nim = $row['nim'];
          echo "<tr>";
          echo "<td>".$nama."</td>";
          echo "<td>".$nim."</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='2'>No data available</td></tr>";
      }
    }
    ?>
  </table>
</div>

<footer style="text-align: center">
    <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >

  <p>Created by Annisa Urohmah &copy; 2023</p>
</footer>
          </div>
        </div>
        </div>

        

      </div>
      </div>
</body>
</html>