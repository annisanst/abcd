<?php include "koneksi.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container my-5">
        <a href="tambah_mahasiswa.php" class="btn btn-success">Tambah Mahasiswa</a>
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Olahraga</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 

                    $sql = "SELECT * FROM mahasiswa";
                    $query = mysqli_query($db, $sql);

                    $no = 1;
                    while($mahasiswa = mysqli_fetch_assoc($query)){
                        if($mahasiswa['jenis_kelamin'] == 1){
                            $jenis_kelamin = "Laki-laki";
                        } else{
                            $jenis_kelamin = "Perempuan";
                        }
                        echo '<tr>
                            <td>'.$no++.'</td>
                            <td>'.$mahasiswa['nim'].'</td>
                            <td>'.$mahasiswa['nama'].'</td>
                            <td>'.$jenis_kelamin.'</td>
                            <td>'.$mahasiswa['agama'].'</td>
                            <td>'.$mahasiswa['tanggal_lahir'].'</td>
                            <td>'.$mahasiswa['olahraga'].'</td>
                            <td><img src="foto/'.$mahasiswa['foto'].'" width="70"/></td>
                            <td>
                                <a href="edit_mahasiswa.php?nim='.$mahasiswa['nim'].'" class="btn btn-warning">Edit</a> 
                                <a href="hapus_mahasiswa.php?nim='.$mahasiswa['nim'].'" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>