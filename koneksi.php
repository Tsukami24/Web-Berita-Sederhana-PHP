
<?php
$koneksi = new mysqli('localhost', 'root', '', 'database_aas_ddg_pd');
if ($koneksi) {
    // echo "Koneksi Berhasil";
}else{
    echo $koneksi->error;
}

?>
