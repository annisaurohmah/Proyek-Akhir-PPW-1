<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datadata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="arsipSurat.css" rel="stylesheet">
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
                        <div class="list-group list-group-flush">
                          <a href="../beranda/beranda.php" class="list-group-item list-group-item-action" role="tab">
                            <i class="fa fa-home" style="font-size:24px"></i>  Beranda
                          </a>
                          <a href="../anggota/anggota.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-id-card" style="font-size:24px"></i> Anggota</a>
                          <a href="../jabatan/jabatan.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-group" style="font-size:24px"></i> Jabatan</a>
                          <a href="../arsipSurat/arsipSurat.php" class="list-group-item list-group-item-action active" role="tab"><i class="fa fa-envelope-open-o" style="font-size:24px"></i> Arsip Surat</a>
                          <a href="../keuangan/keuangan.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-money" style="font-size:24px"></i> Keuangan</a>
                          <a href="../kas/kas.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-credit-card" style="font-size:24px"></i> Kas</a>
                        </div>
                </div>
              </div>
            </aside>
      </div>
      <div class="col-md-10">
          <h2><b>DATA PERSURATAN ORGANISASI JAVA PERIODE 1444 H</b></h2>
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
                  <button  id="semua" class="row box aktif" onclick="delAll(this)">Semua Surat</button>
                </div>
                <div>
                  <button id="masuk" class="row box" onclick="delAll(this)" href="smasuk">Surat Masuk</button>
                </div>
                <div>
                  <button id="keluar" class="row box" onclick="delAll(this)" href="skeluar">Surat Keluar</button>
                </div>        
              </div>
          <div class="col-sm-10">
            <div class="container-fluid dua">

              <button style="margin-left: -10px" type="button" class="btn tambah mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah atau Edit Surat
              </button>
              <div id="all" class="row table-responsive" style="display: flex">
                  <table class="table table-secondary table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal Arsip</th>
                          <th scope="col">Tanggal Surat</th>
                          <th scope="col">Jenis Surat</th>
                          <th scope="col">Dari/Kepada</th>
                          <th scope="col">Nomor Surat</th>
                          <th scope="col">Perihal</th>
                          <th scope="col">Departemen</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $surat = mysqli_query(
                          $conn,
                          "SELECT tanggal_surat, tanggal_arsip, dari_kepada, no_surat, perihal, jenis_surat, nama_dept from persuratan join departemen 
                          on persuratan.id_dept = departemen.id_dept;"
                      );
                      $no = 1;
                      foreach ($surat as $value) {
                          echo "
                          <tr>
                          <td>$no</td>
                          <td>" .
                              $value["tanggal_arsip"] .
                              "</td>
                          <td>" .
                              $value["tanggal_surat"] .
                              "</td>
                          <td>" .
                              $value["jenis_surat"] .
                              "</td>
                          <td>" .
                              $value["dari_kepada"] .
                              "</td>
                          <td>" .
                              $value["no_surat"] .
                              "</td>
                          <td>" .
                              $value["perihal"] .
                              "</td>
                          <td>" .
                              $value["nama_dept"] .
                              "</td>
                          </tr>";
                          $no++;
                      }

// mysqli_close($conn);
?>
                      </tbody>
                    </table>
              </div>

              <div id="smasuk" class="row table-responsive"  style="display: none">
                  <table class="table  table-secondary table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal Arsip</th>
                          <th scope="col">Tanggal Surat</th>
                          <th scope="col">Jenis Surat</th>
                          <th scope="col">Dari/Kepada</th>
                          <th scope="col">Nomor Surat</th>
                          <th scope="col">Perihal</th>
                          <th scope="col">Departemen</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $surat = mysqli_query($conn, "SELECT * from surat_masuk");
                      $no = 1;
                      foreach ($surat as $value) {
                          echo "
                          <tr>
                          <td>$no</td>
                          <td>" .
                              $value["tanggal_arsip"] .
                              "</td>
                          <td>" .
                              $value["tanggal_surat"] .
                              "</td>
                          <td>" .
                              $value["jenis_surat"] .
                              "</td>
                          <td>" .
                              $value["dari_kepada"] .
                              "</td>
                          <td>" .
                              $value["no_surat"] .
                              "</td>
                          <td>" .
                              $value["perihal"] .
                              "</td>
                          <td>" .
                              $value["nama_dept"] .
                              "</td>
                          </tr>";
                          $no++;
                      }

// mysqli_close($conn);
?>
                    </tbody>
                  </table>
              </div>


              <div id="skeluar" class="row table-responsive" style="display: none">
                  <table class="table table-secondary table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal Arsip</th>
                          <th scope="col">Tanggal Surat</th>
                          <th scope="col">Jenis Surat</th>
                          <th scope="col">Dari/Kepada</th>
                          <th scope="col">Nomor Surat</th>
                          <th scope="col">Perihal</th>
                          <th scope="col">Departemen</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $surat = mysqli_query(
                          $conn,
                          "SELECT * from surat_keluar"
                      );
                      $no = 1;
                      foreach ($surat as $value) {
                          echo "
                          <tr>
                          <td>$no</td>
                          <td>" .
                              $value["tanggal_arsip"] .
                              "</td>
                          <td>" .
                              $value["tanggal_surat"] .
                              "</td>
                          <td>" .
                              $value["jenis_surat"] .
                              "</td>
                          <td>" .
                              $value["dari_kepada"] .
                              "</td>
                          <td>" .
                              $value["no_surat"] .
                              "</td>
                          <td>" .
                              $value["perihal"] .
                              "</td>
                          <td>" .
                              $value["nama_dept"] .
                              "</td>
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
                    <label for="validationServer04" class="form-label"><b>Hapus Surat</b></label>
                    <select class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" name="noSurat" required>
                      <option selected disabled value="">Pilih...</option>
                      <?php
                      $surat = mysqli_query($conn, "select * from persuratan");
                      foreach ($surat as $value) {
                          echo "
                        <option>" .
                              $value["no_surat"] .
                              "</option>";
                      }
                      ?>
                    </select>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                      Pilih nomor surat
              </div>
          </div>
          <button type="submit" class="btn mt-2 mb-3 tambah" name="hapus">Hapus</button>
          </form>
        <?php if (
            $_SERVER["REQUEST_METHOD"] === "GET" &&
            isset($_GET["hapus"])
        ) {
            // Retrieve the form values
            $id = $_GET["noSurat"];

            // Perform the database insert
            $query = "DELETE from persuratan WHERE no_surat = '$id'";

            if (mysqli_query($conn, $query)) {
                // Insert successful
                echo '<script>alert("Data has been deleted from the database.");';
                echo 'window.open("arsipSurat.php", "_self");</script>';
            } else {
                // Insert failed
                $error = mysqli_error($conn);
                echo '<script>alert("Error: ' . $error . '");</script>';
            }
        } ?>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah atau Edit Surat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form method="POST" action="">
                <div class="row g-3 was-validated">
                <div class="col-12">
                    <label for="validationServer01" class="form-label">Nomor Surat</label>
                    <input type="text" class="form-control" id="validationServer01" name="noSurat" required>
                    <div class="invalid-feedback">
                      Nomor surat tidak boleh kosong
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="validationServer01" class="form-label">Tanggal Surat</label>
                    <input type="date" class="form-control" id="validationServer01" name="tanggalSurat" required>
                    <div class="invalid-feedback">
                      Tanggal surat tidak boleh kosong
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="form-check" class="form-label">Jenis Surat</label>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="validationFormCheck2" name="jenis_surat" value="SURAT MASUK" required>
                      <label class="form-check-label" for="validationFormCheck2">Surat Masuk</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="validationFormCheck3" name="jenis_surat" value="SURAT KELUAR" required>
                      <label class="form-check-label" for="validationFormCheck3">Surat Keluar</label>
                      <div class="invalid-feedback">Pilih jenis surat</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="validationServer05" class="form-label">Dari/Kepada</label>
                    <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" name="dariKepada" required>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                      Tujuan atau asal surat tidak boleh kosong
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="validationServer03" class="form-label">Perihal</label>
                    <input type="text" class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback" name="perihal" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Perihal tidak boleh kosong
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="validationServer08" class="form-label">Departemen Tujuan/Asal</label>
                    <select class="form-select" id="validationServer08" aria-describedby="validationServer08Feedback" name="departemen" required>
                      <option selected disabled value="">Pilih...</option>
                      <?php
                      $dept = mysqli_query($conn, "SELECT * from departemen");
                      foreach ($dept as $value) {
                          echo "
                        <option>" .
                              $value["id_dept"] .
                              " - " .
                              $value["nama_dept"] .
                              "</option>";
                      }
                      ?>
                    </select>
                    <div id="validationServer08Feedback" class="invalid-feedback">
                      Pilih departemen
                    </div>
                  </div>                 
                </div>             
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
              </div>
              </form>
              <?php if (
                  $_SERVER["REQUEST_METHOD"] === "POST" &&
                  isset($_POST["save"])
              ) {
                  // Retrieve the form values
                  $noSurat = $_POST["noSurat"];
                  $tanggalSurat = $_POST["tanggalSurat"];
                  $jenis_surat = $_POST["jenis_surat"];
                  $tujuan_asal = $_POST["dariKepada"];
                  $perihal = $_POST["perihal"];
                  $selected_dept = $_POST["departemen"];
                  // Extract the id_prodi from the selected value
                  $id_dept = explode(" - ", $selected_dept)[0];

                  $check = mysqli_query(
                      $conn,
                      "SELECT no_surat FROM persuratan"
                  );
                  $existingNims = []; // Create an array to store existing no_surat values

                  while ($row = mysqli_fetch_assoc($check)) {
                      $existingNims[] = trim($row["no_surat"]); // Add trimmed no_surat values to the array
                  }

                  if (in_array(trim($noSurat), $existingNims)) {
                      $query = "UPDATE persuratan SET tanggal_surat = '$tanggalSurat',
                                  dari_kepada = '$tujuan_asal',
                                  perihal = '$perihal',
                                  jenis_surat = '$jenis_surat',
                                  id_dept = '$id_dept'
                                  WHERE no_surat = '$noSurat'";

                      // Execute the update query
                      if (mysqli_query($conn, $query)) {
                          // Update successful
                          echo '<script>alert("Data has been updated in the database.");';
                          echo 'window.open("arsipSurat.php", "_self");</script>';
                      } else {
                          // Update failed
                          $error = mysqli_error($conn);
                          echo '<script>alert("Error updating data: ' .
                              $error .
                              '");</script>';
                      }
                  } else {
                      $query = "INSERT INTO persuratan (tanggal_surat, dari_kepada, no_surat, perihal, jenis_surat, id_dept)
                                VALUES ('$tanggalSurat', '$tujuan_asal', '$noSurat', '$perihal', '$jenis_surat', '$id_dept')";

                      // Perform the database insert
                      if (mysqli_query($conn, $query)) {
                          // Insert successful
                          echo '<script>alert("Data has been saved to the database.");';
                          echo 'window.open("arsipSurat.php", "_self");</script>';
                      } else {
                          // Insert failed
                          $error = mysqli_error($conn);
                          echo '<script>alert("Error inserting data: ' .
                              $error .
                              '");</script>';
                      }
                  }
              } ?>


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