<?php
$koneksi = new mysqli('localhost', 'root', '', 'vaksin')
    or die(mysqli_error($koneksi));


    if (isset($_POST['simpan'])) {
        $idVaksin = $_POST['idVaksin'];
        $Nama = $_POST['Nama'];
        $tgl_datang = $_POST['tgl_datang'];
        $expired = $_POST['expired'];
        $asal = $_POST['asal'];
        $jumlah = $_POST['jumlah'];
        $penggunaan = $_POST['penggunaan'];
        $sisa = $_POST['sisa'];
        $kuota = $_POST['kuota'];
        $keterangan = $_POST['keterangan'];
        $koneksi->query("INSERT INTO datavaksin VALUES ('$idVaksin', '$Nama', '$tgl_datang', '$expired', '$asal', '$jumlah', '$penggunaan', '$sisa', '$kuota', '$keterangan')");

        header("location:admin.php");
    }


    if (isset($_GET['idVaksin'])) {
        $idVaksin = $_GET['idVaksin'];
        $koneksi->query("DELETE FROM datavaksin WHERE idVaksin = '$idVaksin'");
        header("location:admin.php");
    }


    if (isset($_POST['edit'])) {
        $idVaksin = $_POST['idVaksin'];
        $Nama = $_POST['Nama'];
        $tgl_datang = $_POST['tgl_datang'];
        $expired = $_POST['expired'];
        $asal = $_POST['asal'];
        $jumlah = $_POST['jumlah'];
        $penggunaan = $_POST['penggunaan'];
        $sisa = $_POST['sisa'];
        $kuota = $_POST['kuota'];
        $keterangan = $_POST['keterangan'];

        $koneksi->query("UPDATE datavaksin SET Nama = '$Nama', tgl_datang = '$tgl_datang', expired = '$expired', asal = '$asal', jumlah = '$jumlah', penggunaan = '$penggunaan', sisa = '$sisa', kuota = '$kuota', keterangan = '$keterangan' WHERE idVaksin = '$idVaksin'");
        header("location:admin.php");
    }