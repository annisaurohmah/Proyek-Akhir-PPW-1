<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datadata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="jabatan.css" rel="stylesheet">
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
                        <a href="../jabatan/jabatan.php" class="list-group-item list-group-item-action active" role="tab"><i class="fa fa-group" style="font-size:24px"></i> Jabatan</a>
                        <a href="../arsipSurat/arsipSurat.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-envelope-open-o" style="font-size:24px"></i> Arsip Surat</a>
                        <a href="../keuangan/keuangan.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-money" style="font-size:24px"></i> Keuangan</a>
                        <a href="../kas/kas.php" class="list-group-item list-group-item-action" role="tab"><i class="fa fa-credit-card" style="font-size:24px"></i> Kas</a>
                  </div>
                </div>
              </div>
            </aside>
      </div>
      <div class="col-md-10">
      <h2><b>DATA DEPARTEMEN ORGANISASI JAVA PERIODE 1444 H</b></h2>
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "java";
        $conn = mysqli_connect($servername, $username, $password, $database);
      ?>
  
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" onclick="delAll(this)" aria-current="page" id="tab-all" href="#all">SEMUA</a>
    </li>
    <?php
  // Fetch unique department names from the database
    $departments = mysqli_query($conn, "SELECT DISTINCT departemen FROM data_departemen");

    // Loop through the departments to create tab links
    while ($dept = mysqli_fetch_assoc($departments)) {
      $deptName = $dept['departemen'];
      $deptId = strtolower(str_replace(' ', '', $deptName));
      $deptId = preg_replace('/[^A-Za-z0-9\-]/', '', $deptId); // Remove non-alphanumeric characters from the ID

      // Create tab link with onclick event to switch the active tab
      echo '
      <li class="nav-item">
        <a class="nav-link" id="tab-' . $deptId . '" onclick="delAll(this)">'.$deptName.'</a>
      </li>
      ';
    }
    ?>
</ul>

<?php
// Fetch unique department names from the database
$departments = mysqli_query($conn, "SELECT DISTINCT departemen FROM data_departemen");

// Fetch all data from the database
$data = mysqli_query($conn, "SELECT * FROM data_departemen ORDER BY jabatan");

echo '
<div id="semua" class="depart container-fluid dua" style="display: flex;">
  <div class="row table-responsive">
    <table class="table table-secondary table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Departemen</th>
        </tr>
      </thead>
      <tbody>';

$no = 1;
foreach ($data as $value) {
  echo "
  <tr>
    <td>$no</td>
    <td>".$value['nama']."</td>
    <td>".$value['jabatan']."</td>
    <td>".$value['departemen']."</td>
  </tr>";
  $no++;
}

echo '
      </tbody>
    </table>
  </div>
</div>';

// Loop through the departments to create tables
while ($dept = mysqli_fetch_assoc($departments)) {
  $deptName = $dept['departemen'];
  $deptId = strtolower(str_replace(' ', '', $deptName)); // Generated ID for the department

  echo '
  <div id="' . $deptId . '" class="depart container-fluid dua" style="display: none;">
    <div class="row table-responsive">
      <table class="table table-secondary table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Departemen</th>
          </tr>
        </thead>
        <tbody>';

  // Fetch data for the current department from the database
  $query = ($deptName === 'Semua') ? "SELECT * FROM data_departemen" : "SELECT * FROM data_departemen WHERE departemen = '$deptName'";
  $mahasiswa = mysqli_query($conn, $query);
  $no = 1;

  // Loop through the data and populate the table rows
  foreach ($mahasiswa as $value) {
    echo "
    <tr>
      <td>$no</td>
      <td>".$value['nama']."</td>
      <td>".$value['jabatan']."</td>
      <td>".$value['departemen']."</td>
    </tr>";
    $no++;
  }

  echo '
        </tbody>
      </table>
    </div>
  </div>';
}
?>


<script>
    function delAll(tab) {
        var tabs = document.getElementsByClassName("depart");
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].style.display = "none";
        }

        var links = document.getElementsByClassName("nav-link");
        for (var j = 0; j < links.length; j++) {
            links[j].classList.remove("active");
        }

        var tabId = tab.getAttribute("id");
        var deptId = tabId.split("-")[1];

        if (deptId === "all") {
            document.getElementById("semua").style.display = "flex";
            tab.classList.add("active");
        } else {
            document.getElementById(deptId).style.display = "flex";
            tab.classList.add("active");
        }
    }
    </script>
        <footer style="text-align: center">
          <hr style="height:2px;border-width:0;color:#3E1F47;background-color:#3E1F47" >
          <p>Created by Annisa Urohmah &copy; 2023</p>
        </footer>

      </div>
  </div>
  
  </div>
</body>
</html>