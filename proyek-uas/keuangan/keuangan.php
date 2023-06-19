<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datadata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="keuangan.css" rel="stylesheet">
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
                        <a href="../keuangan/keuangan.php" class="list-group-item list-group-item-action active" role="tab"><i class="fa fa-money" style="font-size:24px"></i> Keuangan</a>
                        <a href="../kas/kas.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-credit-card" style="font-size:24px"></i> Kas</a>
                  </div>
                </div>
              </div>
            </aside>
      </div>
      <div class="col-md-10">
      <h2><b>DATA KEUANGAN ORGANISASI JAVA PERIODE 1444 H</b></h2>
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "java";
        $conn = mysqli_connect($servername, $username, $password, $database);
      ?>
      <div class="container-fluid isi dua">
        <div class="row">
          <div class="col-sm-2 cbox mb-3">
            <div>
              <button  id="semua" class="row box aktif" onclick="delAll(this)">Semua Transaksi</button>
            </div>
            <div>
              <button id="masuk" class="row box" onclick="delAll(this)" href="smasuk">Uang Masuk</button>
            </div>
            <div>
              <button id="keluar" class="row box" onclick="delAll(this)" href="skeluar">Uang Keluar</button>
            </div>        
          </div>

          <div class="col-sm-10">
            <div class="container-fluid dua">

              <button style="margin: 0px 0px 10px -10px" type="button" class="btn mb-3 tambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah atau Edit Transaksi
              </button>


              <div id="all" class="row table-responsive" style="display: flex">
                  <table class="table table-striped table-secondary table-hover">
                      <thead style="background-color: #3E1F47; color: #ffffff;">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nomor Transaksi</th>
                          <th scope="col">Tipe Transaksi</th>
                          <th scope="col">Tanggal Transaksi</th>
                          <th scope="col">Pilihan Transaksi</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Sumber/Tujuan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $surat = mysqli_query($conn, "SELECT * from keuangan_detail;");
                          $no = 1;
                          foreach ($surat as $value) {
                          echo "
                          <tr>
                          <td>$no</td>
                          <td>".$value['id_transaksi']."</td>
                          <td>".$value['tp']."</td>
                          <td>".$value['tanggal_transaksi']."</td>
                          <td>".$value['pt']."</td>
                          <td>".$value['nominal']."</td>
                          <td>".$value['sumber_tujuan']."</td>
                          </tr>";
                          $no++;
                      }   
                    // mysqli_close($conn);
                    ?>
                      </tbody>
                    </table>
              </div>

              <div id="smasuk" class="row  table-responsive"  style="display: none">
                  <table class="table table-striped table-secondary table-hover">
                      <thead>
                        <tr>
                        <th scope="col">No</th>
                          <th scope="col">Nomor Transaksi</th>
                          <th scope="col">Tipe Transaksi</th>
                          <th scope="col">Tanggal Transaksi</th>
                          <th scope="col">Pilihan Transaksi</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Sumber/Tujuan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $surat = mysqli_query($conn, "SELECT * from keuangan_detail where pt = 'PEMASUKAN'");
                          $no = 1;
                          foreach ($surat as $value) {
                          echo "
                          <tr>
                          <td>$no</td>
                          <td>".$value['id_transaksi']."</td>
                          <td>".$value['tp']."</td>
                          <td>".$value['tanggal_transaksi']."</td>
                          <td>".$value['pt']."</td>
                          <td>".$value['nominal']."</td>
                          <td>".$value['sumber_tujuan']."</td>
                          </tr>";
                          $no++;
                      }   
                    // mysqli_close($conn);
                    ?>
                      </tbody>
                    </table>
              </div>


              <div id="skeluar" class="row table-responsive" style="display: none">
                  <table class="table table-striped table-secondary table-hover">
                      <thead>
                        <tr>
                        <th scope="col">No</th>
                          <th scope="col">Nomor Transaksi</th>
                          <th scope="col">Tipe Transaksi</th>
                          <th scope="col">Tanggal Transaksi</th>
                          <th scope="col">Pilihan Transaksi</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Sumber/Tujuan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $surat = mysqli_query($conn, "SELECT * from keuangan_detail where pt = 'PENGELUARAN'");
                          $no = 1;
                          foreach ($surat as $value) {
                          echo "
                          <tr>
                          <td>$no</td>
                          <td>".$value['id_transaksi']."</td>
                          <td>".$value['tp']."</td>
                          <td>".$value['tanggal_transaksi']."</td>
                          <td>".$value['pt']."</td>
                          <td>".$value['nominal']."</td>
                          <td>".$value['sumber_tujuan']."</td>
                          </tr>";
                          $no++;
                      }   
                    // mysqli_close($conn);
                    ?>
                      </tbody>
                    </table>
                    
              </div>
              </div>
              <div class="row">
      <form method="GET" action="">
      <div class=" g-3 col-12">
                    <label for="validationServer04" class="form-label"><b>Hapus Transaksi</b></label>
                    <select class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" name="id_transaksi" required>
                      <option selected disabled value="">Pilih...</option>
                      <?php
                        $surat = mysqli_query($conn, "select * from keuangan");
                        foreach ($surat as $value) {
                        echo "
                        <option>".$value['id_transaksi']."</option>";
                    }   
                      ?>
                    </select>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                      Pilih nomor transaksi
                    </div>
          </div>
          <button type="submit" class="btn mt-2 mb-3 tambah" name="hapus">Hapus</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hapus'])) {
              // Retrieve the form values
              $id = $_GET['id_transaksi'];
           
              // Perform the database insert
              $query = "DELETE from keuangan WHERE id_transaksi = '$id'";
            
              if (mysqli_query($conn, $query)) {
                // Insert successful
                echo '<script>alert("Data has been deleted from the database.");';
                echo 'window.open("keuangan.php", "_self");</script>';
                      
              

          } else {
              // Insert failed
              $error = mysqli_error($conn);
              echo '<script>alert("Error: ' . $error . '");</script>';
          }
      
      } 

            ?>



      </div>
            </div>


          <script>
                function delAll(tab) {
                  var tabs = document.getElementsByClassName("table-responsive");
                  for (var i = 0; i < tabs.length; i++) {
                    tabs[i].style.display = "none";
                  }

                  var links = document.getElementsByClassName("box");
                  for (var j = 0; j < links.length; j++) {
                    links[j].classList.remove("aktif");
                  }

                  var tabId = tab.getAttribute("id");

                  if (tabId == "semua") {
                    document.getElementById("all").style.display = "flex";
                    tab.classList.add("aktif");
                  } else if (tabId == "masuk") {
                    document.getElementById("smasuk").style.display = "flex";
                    tab.classList.add("aktif");
                  } else if (tabId == "keluar") {
                    document.getElementById("skeluar").style.display = "flex";
                    tab.classList.add("aktif");
                  }
                }

          </script>

      </div>



        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Transaksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
              <form method="POST" action="">
              <div class="col-12 mb-3">
                    <label for="validationServer01" class="form-label">Nomor Transaksi</label>
                    <input type="text" class="form-control" id="validationServer01" placeholder="1111111111" name="noTrans">
                    <div class="feedback">
                      *Hanya diisi jika ingin melakukan perbaruan data yang sudah ada
                    </div>
                  </div>
                <div class="row g-3 was-validated">
                  <div class="col-12">
                    <label for="validationServer08" class="form-label">Tipe Transaksi</label>
                    <select class="form-select" id="validationServer08" aria-describedby="validationServer08Feedback" name="tipe_transaksi" required>
                      <option selected disabled value="">Pilih...</option>
                      <?php
                        $tipe = mysqli_query($conn, "SELECT * from tipe_transaksi");
                        foreach ($tipe as $value) {
                        echo "
                        <option>".$value['id_tipe']." - ".$value['tipe_transaksi']."</option>";
                    }   
                      ?>
                    </select>
                    <div id="validationServer08Feedback" class="invalid-feedback">
                      Pilih tipe transaksi
                    </div>
                  </div> 


                  <div class="col-12">
                    <label for="validationServer01" class="form-label">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="validationServer01" name="tanggalTrans" required>
                    <div class="invalid-feedback">
                      Tanggal transaksi tidak boleh kosong
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="form-check" class="form-label">Pilihan Transaksi</label>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="validationFormCheck2" name="pilihan_transaksi" value="PEMASUKAN" required>
                      <label class="form-check-label" for="validationFormCheck2">Pemasukan</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="validationFormCheck3" name="pilihan_transaksi" value="PENGELUARAN" required>
                      <label class="form-check-label" for="validationFormCheck3">Pengeluaran</label>
                      <div class="invalid-feedback">Pilih pilihan transaksi</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="validationServer05" class="form-label">Nominal</label>
                    <input type="text" class="form-control" id="validationServer05" placeholder="1000000" aria-describedby="validationServer05Feedback" name="nominal" required>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                      Nominal tidak boleh kosong
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="validationServer05" class="form-label">Sumber/Tujuan</label>
                    <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" name="tujuan_sumber" required>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                      Tujuan atau sumber keuangan tidak boleh kosong
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
                $noTrans = $_POST['noTrans'];
                $tanggalTrans = $_POST['tanggalTrans'];
                $tujuan_asal = $_POST['tujuan_sumber'];
                $pil = $_POST['pilihan_transaksi'];
                $nominal = $_POST['nominal'];
                $selected_ma = $_POST['tipe_transaksi'];
                // Extract the id_prodi from the selected value
                $id_ma = explode(" - ", $selected_ma)[0];              
                // Perform the database insert
                
                if ($nominal < 0) {
                  echo '<script>alert("Nominal cannot be less than zero.");</script>';
                } else {
                  $check = mysqli_query($conn, "SELECT id_transaksi from keuangan");
                  $existingNims = array(); // Create an array to store existing nim values
                  
                  while ($row = mysqli_fetch_assoc($check)) {
                    $existingNims[] = $row['id_transaksi']; // Add nim values to the array
                  }
                  
                  if (in_array($noTrans, $existingNims)) {
                    $query = "UPDATE keuangan SET pilihan_transaksi = '$pil', id_tipe = '$id_ma', 
                    nominal = '$nominal', tanggal_transaksi = '$tanggalTrans', sumber_tujuan = '$tujuan_asal' where id_transaksi = $noTrans";
                  } else {
                    $query = "INSERT INTO keuangan (pilihan_transaksi, id_tipe, nominal, tanggal_transaksi, sumber_tujuan)
                    VALUES ('$pil', '$id_ma', '$nominal', '$tanggalTrans', '$tujuan_asal')";                }
                  
  
                  if (mysqli_query($conn, $query)) {
                    // Insert successful
                    echo '<script>alert("Data has been saved to the database.");';
                    echo 'window.open("keuangan.php", "_self");</script>';
                  }
                  else{
                    $error = mysqli_error($conn);
                    echo '<script>alert("Error: ' . $error . '");</script>';
                  }
  
                }
              }

        
              
              ?>

            </div>
          </div>
        </div>


        
      </div>
      
      </div>

      <footer style="text-align: center">
    <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >

  <p>Created by Annisa Urohmah &copy; 2023</p>
</footer>
      </div>
      </div>

</body>
</html>