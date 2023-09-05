<?php
// include 'dbcontroller.php';
require_once('dbcontroller.php');
$db = new dbcontroller();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light background-color: #e3f2fd; mb-3">
  <div class="container ">
    <a class="navbar-brand" href="#">SMKN 40 Jakarta</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Jurusan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Guru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Siswas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->

<!-- kelas -->
<section id="Kelas">
  <div class="container"> 
  <div class="row text-center mb-3">
          <div class="col"><h2>Kelas</h2></div>
     </div>
     <div class="row justify-content-center">
     <?php
    $sql = "select * from t_kelas";
    $row = $db->getALL($sql);
    foreach ($row as $Kelas) :
?>      
        <div class="card md-3 m-3" style="width: 18rem;">
  <img src="img/<?php echo $Kelas['f_nama']?>.jpg" class="card-img-top" alt="<?php echo $Kelas['f_nama']?>">
  <div class="card-body">
    <p class="card-text text-center"><?php echo $Kelas['f_nama']?></p>
  </div>
</div>
<?php endforeach?>
</div>
</section>
<!-- akhir kelas -->

<!-- Cards -->
<section id="Jurusan">
  <div class="container"> 
 <div class="row text-center justify-content-center">
 <div class="row text-center mb-3">
          <div class="col"><h2>Jurusan</h2></div>
        </div>
 <div class="row justify-content-center">

 <?php
    $sql = "SELECT * FROM t_jurusan";
    $row = $db->getALL($sql);
    foreach ($row as $value) :
?> 

<div class="col-md-4 mb-5">
<div class="card " style="width: 18rem;">
  <img src="img/<?php echo $value['f_nama'];?>.jpg" class="card-img-top" alt="jurusan">
  <div class="card-body">
    <h5 class="card-title">
    <?php echo $value['f_nama']; ?>
                            </h5>
                            <p class="card-text" style="font-size: 14px;">
                                <?php echo $value['f_deskripsi']; ?>  
    </p>
    <a href="#" class="btn btn-primary">Selengkapnya</a>
  </div>
  </div>
  </div>

  <?php
    endforeach
?>
</div>

</div>
<!-- Akhir Cards -->  

<!-- guru -->
        <section id="guru">
  <div class="container"> 
  <div class="row text-center mb-3">
          <div class="col"><h2>Guru</h2></div>
     </div>
     <div class="row justify-content-center">
     <?php
    $sql = "select * from t_guru";
    $row = $db->getALL($sql);
    foreach ($row as $guru) :
?>      
        <div class="card md-3 m-3" style="width: 18rem;">
  <img src="img/<?php echo $guru['f_nama']?>.jpg" class="card-img-top" alt="<?php echo $guru['f_nama']?>">
  <div class="card-body">
    <p class="card-text text-center"><?php echo $guru['f_nama']?></p>
  </div>
</div>
<?php endforeach?>
</div>
</section>
<!-- akhir guru -->

<!-- table siswa -->
<section id="siswa">
<div class="row text-center mb-3">
          <div class="col"><h2>Siswa</h2></div>
     </div>
<div class="row justify-content-center mb-5">
  <div class="col-8">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jurusan</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
    $i=1;
    $sql = "select t_siswa.f_nama, t_kelas.f_nama as f_kelas, t_jurusan.f_nama as f_jurusan from t_siswa
            inner join t_kelas
            on t_siswa.f_idkelas=t_kelas.f_idkelas
            inner join t_jurusan
            on t_siswa.f_idjurusan=t_jurusan.f_idjurusan
            order by t_siswa.f_idjurusan, t_siswa.f_idkelas, t_siswa.f_nama";
    $row = $db->getALL($sql);
    foreach ($row as $siswa) :
    
?>  

    <tr>
      <th scope="row">
      <?php echo $i++; ?>
      </th>
      <td><?php echo $siswa['f_nama']?></td>
      <td><?php echo $siswa['f_kelas']?></td>
      <td><?php echo $siswa['f_jurusan']?></td>
    </tr>

      <?php endforeach ?>

  </tbody>
</table>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#9f9f9f9f" fill-opacity="1" d="M0,160L17.1,160C34.3,160,69,160,103,144C137.1,128,171,96,206,96C240,96,274,128,309,165.3C342.9,203,377,245,411,234.7C445.7,224,480,160,514,160C548.6,160,583,224,617,240C651.4,256,686,224,720,208C754.3,192,789,192,823,202.7C857.1,213,891,235,926,224C960,213,994,171,1029,144C1062.9,117,1097,107,1131,101.3C1165.7,96,1200,96,1234,80C1268.6,64,1303,32,1337,21.3C1371.4,11,1406,21,1423,26.7L1440,32L1440,320L1422.9,320C1405.7,320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,320C274.3,320,240,320,206,320C171.4,320,137,320,103,320C68.6,320,34,320,17,320L0,320Z"></path></svg>
</section>
<!-- akhir table siswa -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</body>
</html>