<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Vaksin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Edit Data Vaksin</h3>
                <?php
                include 'koneksi.php';
                $panggil = $koneksi->query("SELECT * FROM datavaksin where idVaksin='$_GET[edit]'");
                ?>
                <?php
                while ($row = $panggil->fetch_assoc()) {
                ?>
                    <form action="koneksi.php" method="POST">
                        <div class="form-group">
                            <label for="Nama">ID Vaksin</label>
                            <input type="text" class="form-control" id="idVaksin" aria-describedby="idVaksin" name="idVaksin" value="<?= $row['idVaksin'] ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama Vaksin</label>
                            <input type="text" class="form-control" id="Nama" aria-describedby="Nama" name="Nama" value="<?= $row['Nama'] ?>" >
                        </div>
                        <div class="form-group">
                            <label for="tgl_barang">Tanggal Datang</label>
                            <input type="date" class="form-control" id="tgl_datang" aria-describedby="tgl_datang" name="tgl_datang" value="<?= $row['tgl_datang'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="expired">Expired</label>
                            <input type="date" class="form-control" id="expired" name="expired" value="<?= $row['expired'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Asal</label>
                            <input type="text" class="form-control" id="asal" name="asal" value="<?= $row['asal'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $row['jumlah'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="penggunaan">Penggunaan</label>
                            <input type="text" class="form-control" id="penggunaan" name="penggunaan" value="<?= $row['penggunaan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="sisa">Sisa</label>
                            <input type="text" class="form-control" id="sisa" name="sisa" value="<?= $row['sisa'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kuota">Kuota</label>
                            <input type="text" class="form-control" id="kuota" name="kuota" value="<?= $row['kuota'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $row['keterangan'] ?>">
                        </div>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" value="Edit" name="edit">
                </form>
            <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>