<?php 
    include "koneksi.php";

    if(isset($_GET['nim'])){
        $nim = $_GET['nim'];

        $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $query = mysqli_query($db,$sql);
        $mahasiswa = mysqli_fetch_assoc($query);

        if($query){

            unlink('foto/'.$mahasiswa['foto']);
            $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
            $query = mysqli_query($db,$sql);
            if ($query){
                header("location:index.php");
            }
        }   
    }
?>