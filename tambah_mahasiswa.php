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
        <h2>Form Tambah Mahasiswa</h2>
        <?php 
            include "koneksi.php";
            if(isset($_POST['submit'])){
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $agama = $_POST['agama'];
                $olahraga = implode(", ", $_POST['olahraga']);
                $ekstensi_diperbolehkan	= array('png','jpg');
                $nama_file = $_FILES['file']['name'];
                $x = explode('.', $nama_file);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];

                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 1044070){			
                        move_uploaded_file($file_tmp, 'foto/'.$nama_file);
                        $sql = "INSERT INTO mahasiswa VALUES('$nim', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$agama','$olahraga', '$nama_file')";
                        $query = mysqli_query($db, $sql);
                        if($query){
                            echo "<script>alert('Successfully Insert'); window.location = './index.php';</script>";
                        }else{
                            echo '<div class="alert alert-danger" role="alert">GAGAL MENGUPLOAD GAMBAR</div>';
                        }
                    }else{
                        echo '<div class="alert alert-danger" role="alert">UKURAN FILE TERLALU BESAR</div>';
                    }
                }else{
                    echo '<div class="alert alert-danger" role="alert">EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</div>';
                }

            }
        ?>
        <form class="row g-3 needs-validation" action="tambah_mahasiswa.php" method="post" enctype= multipart/form-data novalidate>
            <div class="col-md-8">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
                <div class="invalid-feedback">
                NIM tidak boleh kosong
                </div>
            </div>
            <div class="col-md-8">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
                <div class="invalid-feedback">
                Nama tidak boleh kosong
                </div>
            </div>
            <div class="col-md-8">   
                <label for="nama" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="1" required> 
                <label class="form-check-label" for="laki-laki">
                    Laki-laki
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="2" required>
                <label class="form-check-label" for="perempuan">
                    Perempuan
                </label>
                <div class="invalid-feedback">
                Jenis kelamin tidak boleh kosong
                </div>
                </div>
            </div>
            <div class="col-md-8">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                <div class="invalid-feedback">
                Tanggal lahir tidak boleh kosong
                </div>
            </div>
            <div class="col-md-8">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" name="agama" required>
                <option selected disabled value="">Pilih agama...</option>
                <option value="Islam">Islam</option>
                <option value="Katolik">Katolik</option>
                <option value="Protestan">Protestan</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghuchu">Konghuchu</option>
                </select>
                <div class="invalid-feedback">
                Agama tidak boleh kosong
                </div>
            </div>
            <div class="col-md-8">
                <label for="olahraga[]" class="form-label">Olahraga</label>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Renang" id="olahraga[]" name="olahraga[]" checked>
                <label class="form-check-label" for="olahraga[]">
                    Renang
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Sepak Bola" id="olahraga[]" name="olahraga[]">
                <label class="form-check-label" for="olahraga[]">
                    Sepak Bola
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Gibah" id="olahraga[]" name="olahraga[]">
                <label class="form-check-label" for="olahraga[]">
                    Gibah
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Badminton" id="olahraga[]" name="olahraga[]">
                <label class="form-check-label" for="olahraga[]">
                    Badminton
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Futsal" id="olahraga[]" name="olahraga[]">
                <label class="form-check-label" for="olahraga[]">
                    Futsal
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Menari" id="olahraga[]" name="olahraga[]">
                <label class="form-check-label" for="olahraga[]">
                    Menari
                </label>
                </div>
            </div>
            <div class="col-md-8">
                <label for="file" class="form-label">File Foto</label>
                <input class="form-control" type="file" id="file" name="file" required>
                <div class="invalid-feedback">
                Foto tidak boleh kosong
                </div>
            </div>
            <div class="col-12">
                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
  </body>
</html>