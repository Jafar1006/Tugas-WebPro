function hitungTotal() {
    let jumlah = parseInt(document.getElementById("jumlahBarang").value) || 0;
    let hargaBarang = parseInt(document.getElementById("hargaBarang").value) || 0;
    let totalHarga = jumlah * hargaBarang;
    let diskon = 0;
    let totalBayar = 0;
    if (jumlah > 10) {
        diskon = 0.12 * hargaBarang;
    }

    totalBayar = totalHarga - diskon;
    document.getElementById("totalHarga").value = totalHarga;
    document.getElementById("diskonHarga").value = diskon;
    document.getElementById("totalBayar").value = totalBayar;
}
function tebakBarang() {
    let kode = document.getElementById("kodeBarang").value.toUpperCase();
    let nama = "";
    let harga = 0;
    if (kode === "A001") {
        nama = "Televisi Samsung 50\"";
        harga = 5000000;
    } else if (kode === "A002") {
        nama = "VCD Player Sony";
        harga = 750000;
    } else if (kode === "A003") {
        nama = "Mini Compo";
        harga = 2300000;
    } else {
        nama = "Kode tidak valid";
        harga = 0;
    }
    document.getElementById("namaBarang").value = nama;
    document.getElementById("hargaBarang").value = harga;
}
