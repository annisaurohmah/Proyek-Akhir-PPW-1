<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datadata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="anggota.css" rel="stylesheet">
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
                            <i class="fa fa-home" style="font-size:24px"></i>  Beranda </a>
                          <a href="../anggota/anggota.php" class="list-group-item list-group-item-action active" role="tab"><i class="fa fa-id-card" style="font-size:24px"></i> Anggota</a>
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
          <h2><b>DATA ANGGOTA ORGANISASI JAVA PERIODE 1444 H</b></h2>
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "java";
            $conn = mysqli_connect($servername, $username, $password, $database);
          ?>
          <div class="container-fluid dua">
              <button style="margin: 0px 0px 10px -10px" type="button" class="btn tambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Tambah atau Edit Anggota
              </button>
              <div class="row table-responsive">
                  <table class="table table-secondary table-striped table-hover">
                      <thead>
                        <tr>
                          <th class="header" scope="col">No</th>
                          <th class="header" scope="col">Nama</th>
                          <th class="header" scope="col">NIM</th>
                          <th class="header" scope="col">Jenis Kelamin</th>
                          <th class="header" scope="col">Program Studi</th>
                          <th class="header" scope="col">Alamat</th>
                          <th class="header" scope="col">Nomor Telepon</th>
                          <th class="header" scope="col">Email</th>
                          <th class="header" scope="col">Departemen</th>
                          <th class="header" scope="col">Jabatan</th>
                          <th class="header" scope="col">Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $mahasiswa = mysqli_query($conn, "select nim, nama, alamat, no_telp, email, jenis_kel, 
                          nama_prodi, nama_dept, nama_jab, keterangan from anggota join departemen 
                          on anggota.id_dept = departemen.id_dept join jabatan on anggota.id_jab = jabatan.id_jabatan 
                          join prodi on anggota.id_prodi = prodi.id_prodi;");
                          $no = 1;
                          foreach ($mahasiswa as $value) {
                          echo "
                          <tr>
                          <td>$no</td>
                          <td>".$value['nama']."</td>
                          <td>".$value['nim']."</td>
                          <td>".$value['jenis_kel']."</td>
                          <td>".$value['nama_prodi']."</td>
                          <td>".$value['alamat']."</td>
                          <td>".$value['no_telp']."</td>
                          <td>".$value['email']."</td>
                          <td>".$value['nama_dept']."</td>
                          <td>".$value['nama_jab']."</td>
                          <td>".$value['keterangan']."</td>
                          </tr>";
                          $no++;
                      }   
                    // mysqli_close($conn);
                      ?>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Anggota</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="">
                  <div class="row g-3 was-validated">
                    <div class="col-12">
                      <label for="validationServer01" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="validationServer01" name="nama" required>
                      <div class="invalid-feedback">
                        Nama tidak boleh kosong
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="validationServer02" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                      <input type="text" class="form-control" id="validationServer02" name="nim" required>
                      <div class="invalid-feedback">
                        NIM tidak boleh kosong
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="form-check" class="form-label">Jenis Kelamin</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="validationFormCheck2" name="jenis_kelamin" value="LAKI-LAKI" required>
                        <label class="form-check-label" for="validationFormCheck2">Laki-laki</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="validationFormCheck3" name="jenis_kelamin" value="PEREMPUAN" required>
                        <label class="form-check-label" for="validationFormCheck3">Perempuan</label>
                        <div class="invalid-feedback">Pilih jenis kelamin</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="validationServer04" class="form-label">Program Studi</label>
                      <select class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" name="prodi" required>
                        <option selected disabled value="">Pilih...</option>
                        <?php
                          $prodi = mysqli_query($conn, "select * from prodi");
                          foreach ($prodi as $value) {
                          echo "
                          <option>".$value['id_prodi']." - ".$value['nama_prodi']."</option>";
                      }   
                        ?>
                      </select>
                      <div id="validationServer04Feedback" class="invalid-feedback">
                        Pilih program studi
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="validationServer05" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" name="alamat" required>
                      <div id="validationServer05Feedback" class="invalid-feedback">
                        Alamat tidak boleh kosong
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="validationServer03" class="form-label">Email</label>
                      <input type="text" class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback" name="email" required>
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        Email tidak boleh kosong
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="validationServer06" class="form-label">Nomor Telepon</label>
                      <input type="text" class="form-control" id="validationServer06" aria-describedby="validationServer03Feedback" name="no_telp" required>
                      <div id="validationServer06Feedback" class="invalid-feedback">
                        Nomor Telepon tidak boleh kosong
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="validationServer08" class="form-label">Departemen</label>
                      <select class="form-select" id="validationServer08" aria-describedby="validationServer08Feedback" name="departemen" required>
                        <option selected disabled value="">Pilih...</option>
                        <?php
                          $dept = mysqli_query($conn, "SELECT * from departemen");
                          foreach ($dept as $value) {
                          echo "
                          <option>".$value['id_dept']." - ".$value['nama_dept']."</option>";
                      }   
                        ?>
                      </select>
                      <div id="validationServer08Feedback" class="invalid-feedback">
                        Pilih departemen
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="validationServer09" class="form-label">Jabatan</label>
                      <select class="form-select" id="validationServer09" aria-describedby="validationServer09Feedback" name="jabatan" required>
                        <option selected disabled value="">Pilih...</option>
                        <?php
                          $jab = mysqli_query($conn, "SELECT * from jabatan");
                          foreach ($jab as $value) {
                          echo "
                          <option>".$value['id_jabatan']." - ".$value['nama_jab']."</option>";
                      }   
                        ?>
                      </select>
                      <div id="validationServer09Feedback" class="invalid-feedback">
                        Pilih jabatan
                      </div>
                    </div>
                  </div>
                <div class="row mt-3">
                <div class="col-12">
                    <label for="validationServer07" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="validationServer07" name="keterangan">
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
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $selected_prodi = $_POST['prodi'];
                $id_prodi = explode(" - ", $selected_prodi)[0];
                $alamat = $_POST['alamat'];
                $email = $_POST['email'];
                $no_telp = $_POST['no_telp'];
                $selected_dept = $_POST['departemen'];
                $id_dept = explode(" - ", $selected_dept)[0];
                $selected_jab = $_POST['jabatan'];
                $id_jab = explode(" - ", $selected_jab)[0];
                $keterangan = $_POST['keterangan'];
              
                // Perform the database insert
                $check = mysqli_query($conn, "SELECT nim from anggota");
                $existingNims = array();
                
                while ($row = mysqli_fetch_assoc($check)) {
                  $existingNims[] = $row['nim'];
                }
                
                if (in_array($nim, $existingNims)) {
                  $query = "UPDATE anggota SET nama = '$nama', jenis_kel = '$jenis_kelamin', id_prodi = '$id_prodi', alamat = '$alamat', email = '$email', no_telp = '$no_telp', id_dept = '$id_dept', id_jab = '$id_jab', keterangan = '$keterangan' WHERE nim = '$nim'";
                } else {
                  $query = "INSERT INTO anggota (nama, nim, jenis_kel, id_prodi, alamat, email, no_telp, id_dept, id_jab, keterangan) VALUES ('$nama', '$nim', '$jenis_kelamin', '$id_prodi', '$alamat', '$email', '$no_telp', '$id_dept', '$id_jab', '$keterangan')";
                }                          
              
              if (mysqli_query($conn, $query)) {
                // Insert successful
                echo '<script>alert("Data has been saved to the database.");</script>';
                echo 'window.open("anggota.php", "_self");</script>';
            } else {
                // Insert failed
                $error = mysqli_error($conn);
                echo '<script>alert("Error: ' . $error . '");</script>';
            }
        }
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row m-3">
      <form method="GET" action="">
      <div class=" g-3 col-12">
                    <label for="validationServer04" class="form-label">Hapus Anggota</label>
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
          <button type="submit" class="btn hapus tambah btn-primary" name="hapus">Hapus</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hapus'])) {
              // Retrieve the form values
              $selected_nim = $_GET['nim'];
              $nim = explode(" - ", $selected_nim)[0];

              $query = "DELETE from anggota WHERE nim = '$nim'";
            
              if (mysqli_query($conn, $query)) {
                // Insert successful
                echo '<script>alert("Data has been deleted from the database.");';
                echo 'window.open("anggota.php", "_self");</script>';                     
                } else {
                    // Insert failed
                    $error = mysqli_error($conn);
                    echo '<script>alert("Error: ' . $error . '");</script>';
                }
            } 
            ?>
      </div>
      <footer style="text-align: center">
        <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >
        <p>Created by Annisa Urohmah &copy; 2023</p>
      </footer>
      </div>
      </div>
</body>
</html>