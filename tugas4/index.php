<?php
//variabel
$kode_barang = "";
$nama_barang = "";
$harga_barang = "";
$jumlah_barang = "";
$metode_bayar = "Cash";
$total_harga = "";
$diskon = "";
$total_bayar = "";

// Mengecek apakah ada pengiriman form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // menghandle apabila user langsung melakukan proses
    $kode_barang = isset($_POST['kode_barang']) ? $_POST['kode_barang'] : "";
    $jumlah_barang = isset($_POST['jumlah_barang']) ? $_POST['jumlah_barang'] : "";
    $metode_bayar = isset($_POST['metode_bayar']) ? $_POST['metode_bayar'] : "Cash";

    if ($kode_barang == "A001") {
        $nama_barang = "Mouse";
        $harga_barang = 5000000;
    } elseif ($kode_barang == "A002") {
        $nama_barang = "Headphone";
        $harga_barang = 750000;
    } elseif ($kode_barang == "A003") {
        $nama_barang = "CPU";
        $harga_barang = 2300000;
    } else {
        if (!empty($kode_barang)) {
            $nama_barang = "Tidak Terdaftar";
            $harga_barang = 0;
        }
    }

    if (isset($_POST['proses'])) {
        if (is_numeric($harga_barang) && is_numeric($jumlah_barang)) {
            
            $total_harga = $harga_barang * $jumlah_barang;
            
            if ($metode_bayar == "Cash" || $jumlah_barang > 5) {
                $diskon = 0.12 * $harga_barang;
            } elseif ($metode_bayar == "Kredit" && $jumlah_barang > 20) {
                $diskon = 0.05 * $total_harga;
            } else {
                $diskon = 0;
            }
            $total_bayar = $total_harga - $diskon;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Penjualan Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">
        <div class="form-header">
            <h2>FORM PENJUALAN BARANG</h2>
        </div>

        <div class="form-body">
            <form action="" method="POST">
                
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="input-kode" value="<?php echo $kode_barang; ?>" required>
                    <button type="submit" name="cari" class="btn-side">Cari</button>
                </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="input-nama" value="<?php echo $nama_barang; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" name="harga_barang" class="input-harga" value="<?php echo $harga_barang; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" class="input-jumlah" value="<?php echo $jumlah_barang; ?>">
                </div>

                <div class="form-group">
                    <label>Metode Bayar</label>
                    <select name="metode_bayar" class="select-metode">
                        <option value="Cash" <?php if($metode_bayar == "Cash") echo "selected"; ?>>Cash</option>
                        <option value="Kredit" <?php if($metode_bayar == "Kredit") echo "selected"; ?>>Kredit</option>
                    </select>
                    <button type="submit" name="proses" class="btn-side">Proses</button>
                </div>

                <div class="form-group">
                    <label>Total Harga</label>
                    <input type="text" class="input-total" value="<?php echo $total_harga; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Diskon</label>
                    <input type="text" class="input-total" value="<?php echo $diskon; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Total Bayar</label>
                    <input type="text" class="input-total" value="<?php echo $total_bayar; ?>" readonly>
                </div>

                <div class="form-action">
                    <div class="spacer"></div>
                    <button type="button" onclick="window.print()">Cetak</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>