<?php
include "../../koneksi.php";

$sumber = @$_FILES['gambar']['tmp_name'];
$target = '../../images/';
$nama_gambar = @$_FILES['gambar']['name'];
$status = @$_POST['status'];

$simpan_banner = @$_POST['simpan_banner'];

if ($simpan_banner) {
    $pindah = move_uploaded_file($sumber, $target . $nama_gambar);
    
    if ($pindah) {
        $insertBannerQuery = $mysqli->query("INSERT INTO banner (nama_gambar, status) VALUES ('$nama_gambar', '$status')");
        
        if ($insertBannerQuery) {
            ?>
            <script type="text/javascript">
                alert("tambah banner baru berhasil");
                window.location.href="../../halaman_admin.php?page=banner";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Insert into banner failed: <?php echo $mysqli->error; ?>");
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("upload gambar gagal");
        </script>
        <?php
    }
}
?>
